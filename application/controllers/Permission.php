<?php
class Permission extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function listPermission($id_subgroup)
    {

        $data['permission'] = $this->General->fetch_bysinglecol("id_sgroup", "tbl_user_permission", $id_subgroup);
        $data['parentnav'] = $this->Menus->fetch_parent_menu();
        $data['Generals'] = $this;
        $this->header('List Permission');
        $this->load->view('Permission/list_permission', $data);
        $this->footer();
    }

    public function checkpermission($id, $id_sgroup)
    {
        $whr = array(
            "id_sgroup" => $id_sgroup,
            "id_menu" => $id
        );

        $this->db->where($whr);
        $this->db->from('tbl_user_permission');

        return $this->db->count_all_results();
    }

    public function fetchRecordpermission($id, $id_sgroup)
    {
        $sql = $this->db->query("SELECT * FROM tbl_user_permission WHERE id_sgroup ='$id_sgroup' AND id_menu='$id'");
        $r_sql = $sql->result();

        return $r_sql;
    }

    public function checkchildMenuCount($pmenuid)
    {
        $whr = array(
            "parent_id" => $pmenuid
        );

        $this->db->where($whr);
        $this->db->from('tbl_user_menu');

        return $this->db->count_all_results();
    }

    public function fetchchildMenu($pmenuid)
    {
        return $this->General->fetch_bysinglecol("parent_id", "tbl_user_menu", $pmenuid);
    }

    public function createPermission($id_sgroup)
    {
        extract($_POST);
        $menus = $this->Menus->fetch_permission_navi();

        foreach ($menus as $menus) {
            $menuid = $menus->id_menu;

            if (isset($permission['view'][$menuid])) {
                $view = 1;
            } else {
                $view = 0;
            }

            if (isset($permission['insert'][$menuid])) {
                $insert = 1;
            } else {
                $insert = 0;
            }

            if (isset($permission['update'][$menuid])) {
                $update = 1;
            } else {
                $update = 0;
            }

            if (isset($permission['delete'][$menuid])) {
                $delete = 1;
            } else {
                $delete = 0;
            }

            $per_groupmenu = $this->General->fetch_per_groupmenu($id_sgroup, $menus->id_menu);
            $permission_row = $this->General->fetch_groupid_menu($id_sgroup, $menus->id_menu);

            foreach ($permission_row as $permission_row) {
                $permission_id = $permission_row->id_per;
            }

            if ($per_groupmenu > 0) {
                $data = array(
                    "per_select" => $view,
                    "per_insert" => $insert,
                    "per_update" => $update,
                    "per_delete" => $delete,
                );

                $this->General->update_permissionrecord($data, "tbl_user_permission", $permission_id);
                $this->session->set_flashdata('success', 'Updated Successfully');
            } else {
                $data = array(
                    "id_sgroup" => $id_sgroup,
                    "id_menu" => $menus->id_menu,
                    "per_select" => $view,
                    "per_insert" => $insert,
                    "per_update" => $update,
                    "per_delete" => $delete,
                );

                $this->General->insertRecord('tbl_user_permission', $data);
                $this->session->set_flashdata('success', 'Add Successfully');
            }
        }

        redirect('Permission/listPermission/' . $id_sgroup);
    }
}
