<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menus extends CI_Model
{
    //fetch parent menu
    public function fetch_parent_menu()
    {
        $where = array(
            "parent_id" => 0,
        );

        $this->db->select()->from('tbl_user_menu')->where($where)->order_by('id_menu', 'asc');
        $query = $this->db->get();

        return $query->result();
    }

    //FETCH CHILD MENU
    public function fetch_child_menu($id_menu)
    {
        $where = array(
            "parent_id" => $id_menu,
        );

        $this->db->select()->from('tbl_user_menu')->where($where)->order_by('id_menu', 'asc');
        $query = $this->db->get();
        return $query->result();
    }


    //fetch permissions for navigations (menus)
    public function fetch_permission_navi()
    {
        $this->db->select()->from('tbl_user_menu');
        $query = $this->db->get();

        return $query->result();
    }

    //fetch parent menus
    public function fetch_parent_navi()
    {
        if ($this->session->userdata('id_group') == 1) {
            $query = $this->db->query("SELECT * FROM tbl_user_menu WHERE parent_id = 0 AND show_in_menu = 1 ORDER BY sort_order ASC");
        }

        if ($this->session->userdata('id_group') != 1) {
            $sgroup = $this->session->userdata('user_login')['id_sgroup'];
            $query = $this->db->query("SELECT * FROM tbl_user_menu AS UM , tbl_user_permission AS UP WHERE UM.id_menu = UP.id_menu AND UP.per_select = 1 AND UP.id_sgroup = $sgroup AND UM.parent_id =0 AND UM.show_in_menu = 1 ORDER BY UM.sort_order ASC");
        }

        return $query->result();
    }

    //fetch child menus
    public function fetch_child_navi()
    {
        if ($this->session->userdata('id_group') == 0) {
            $query = $this->db->query("SELECT * FROM tbl_user_menu WHERE parent_id !=0 AND show_in_menu = 1 ORDER BY sort_order ASC");
        }

        if ($this->session->userdata('id_group') != 0) {
            $sgroup = $this->session->userdata('id_sgroup');
            $query = $this->db->query("SELECT * FROM tbl_user_menu AS UM , tbl_user_permission UP WHERE UM.id_menu = UP.id_menu AND UP.per_select = 1 AND UP.id_sgroup = $sgroup AND UM.parent_id !=0 AND UM.show_in_menu = 1 ORDER BY sort_order ASC");
        }

        return $query->result();
    }
}
