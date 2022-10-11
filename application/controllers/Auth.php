<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
    public function index()
    {
        if ($this->session->userdata('user_login')) {
            redirect('Dashboard');
        } else {
            $this->load->view('Auth/login');
        }
    }

    public function loginAuthen()
    {
        $login = $this->Auth_model->AuthLogin(input('username'),  input('password'));

        if ($login) {
            $pegawai = $this->General->fetch_bysinglecol('id_user', 'tbl_user_pegawai', $login['id_user']);
            $subgroup = $this->General->fetch_bysinglecol('id_subgroup', 'tbl_user_subgroup', $login['id_sgroup']);

            $session = array(
                'id_uker' => $login['id_uker'],
                'id_user' => $login['id_user'],
                'id_group' => $subgroup[0]->id_group,
                'id_sgroup' => $login['id_sgroup'],
                'username' => $login['username'],
                'nama_subgroup' => $subgroup[0]->nama_subgroup,
                'nama_pegawai' => $pegawai[0]->nama_pegawai,
                'photo' => $pegawai[0]->photo,
            );

            $this->session->set_userdata('user_login', $session);
            HistoryLoginAndLogout("Login");

            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('msg', 'Username Or Password is Invalid');
            redirect('Auth');
        }
    }

    public function Logout()
    {
        HistoryLoginAndLogout("Logout");
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
