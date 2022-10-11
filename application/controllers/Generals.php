<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Generals extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user_login')) {
            redirect('Auth');
        }
    }

    public function getpage($page)
    {
        $this->session->set_userdata("id_menu", $page);
        $Page = $this->General->fetch_bysinglecol("id_menu", "tbl_user_menu", $page);
        $this->create_breadcrums();

        foreach ($Page as $pagerow) {
            $getPage = $pagerow->url_menu;
            $this->session->set_userdata("id_menu", $pagerow->id_menu);
        }

        redirect(base_url($getPage));
    }

    public function create_breadcrums()
    {
        $row = $this->General->fetch_bysinglecol("id_menu", "tbl_user_menu", $this->session->userdata("id_menu"));

        foreach ($row as $row_r) {
            if ($row_r->parent_id != 0) {
                $this->session->set_userdata("child_name", $row_r->nama_menu);
                $this->session->set_userdata("child_url", base_url() . "" . $row_r->url_menu);
                $row2 = $this->General->fetch_bysinglecol("id_menu", "tbl_user_menu", $row_r->parent_id);
                foreach ($row2 as $row_r2) {
                    $this->session->set_userdata("parent_name", $row_r2->nama_menu);
                }
            } else {
                $this->session->set_userdata("parent_name", $row_r->nama_menu);
            }
        }
    }
}
