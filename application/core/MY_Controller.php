<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class dashboard
 *
 * @property CI_Session session
 * @property General General
 * @property Menus menus
 * @property Auth_model Auth_model
 * @property Serverside Serverside
 */
class MY_Controller extends CI_Controller
{
    var $savePermission;
    var $editPermission;
    var $activePermission;
    var $action;

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->model('Menus');
        $this->load->model('General');
        $this->load->model('Auth_model');
        $this->load->model('Serverside');
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->library('ciqrcode');
    }

    public function header($title)
    {
        $data['parent_nav'] = $this->Menus->fetch_parent_navi();
        $data['My_Controller'] = $this;
        $data['title'] = $title;
        $this->load->view('_template/header', $data);
    }

    public function main_content($data = null)
    {
        $this->load->view('_template/main', $data);
    }

    public function footer()
    {
        $this->load->view('_template/footer');
    }

    public function fetchsidebar_childMenuById($child_id)
    {
        if ($this->session->userdata('user_login')['id_group'] == 1) {
            $query = $this->db->query("SELECT * FROM tbl_user_menu WHERE parent_id = $child_id AND show_in_menu = 1 ORDER BY sort_order ASC");
        } else {
            $sgroup = $this->session->userdata('user_login')['id_sgroup'];
            $query = $this->db->query("SELECT * FROM tbl_user_menu AS UM , tbl_user_permission UP WHERE UM.id_menu = UP.id_menu AND UP.per_select = 1 AND UP.id_sgroup = $sgroup AND UM.parent_id = $child_id AND UM.show_in_menu = 1 ORDER BY sort_order ASC");
        }

        return $query->result();
    }

    public function Getsave_up_delPermissions()
    {
        $id_menu = $this->session->userdata("id_menu");

        if (!empty($id_menu) && $this->session->userdata("user_login")['id_group']  != 1) {
            $id_sgroup = $this->session->userdata("user_login")['id_sgroup'];
            $permissionResult = $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_user_permission` WHERE id_sgroup = $id_sgroup AND id_menu = $id_menu");

            foreach ($permissionResult as $permissionResults) {
                if ($permissionResults->per_insert == 1) {
                    $this->savePermission = "";
                } elseif ($permissionResults->per_insert == 0) {
                    $this->savePermission = "style='display:none;'";
                }

                if ($permissionResults->per_update == 1) {
                    $this->editPermission = "";
                } elseif ($permissionResults->per_update == 0) {
                    $this->editPermission = "style='display:none;'";
                }

                if ($permissionResults->per_delete == 1) {
                    $this->activePermission = "";
                } elseif ($permissionResults->per_delete == 0) {
                    $this->activePermission = "style='display:none;'";
                }
            }
        } else {
            $this->savePermission = "";
            $this->editPermission = "";
            $this->activePermission = "";
        }
    }
}
