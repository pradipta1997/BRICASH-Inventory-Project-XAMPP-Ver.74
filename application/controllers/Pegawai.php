<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function Data($id_user)
    {

        $data['userpegawai'] = $this->General->select_where("tbl_user_pegawai", ['id_user' => $id_user]);
        $this->header('Biodata User');
        $this->load->view('Pegawai/data_pegawai', $data);
        $this->footer();
    }

    public function savePegawai($id_user, $id_pegawai = null)
    {
        $data = array(
            'id_user' => $id_user,
            'nama_pegawai' => input('nama'),
            'alamat_pegawai' => input('alamat'),
            'jk' => input('jk'),
            'telp' => input('telp'),
            'email' => input('email')
        );

        $config['upload_path']          = './assets/img/pegawai/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($id_pegawai) {
            $data['pegawai_updated_date'] = date('Y-m-d H:i:s');
            $data['pegawai_updated_by'] = $this->session->userdata('user_login')['username'];

            if ($this->upload->do_upload('file')) {
                $qpOld = $this->General->select_where("tbl_user_pegawai", ['id_pegawai' => $id_pegawai], 's');
                if ($qpOld->photo != 'default.png') {
                    HapusFileOld('assets/img/pegawai/' . $qpOld->photo);
                }

                $data['photo'] = $this->upload->data('file_name');
            }

            $response = $this->General->update_record($data, ['id_pegawai' => $id_pegawai], 'tbl_user_pegawai');
        } else {
            $data['pegawai_created_date'] = date('Y-m-d H:i:s');
            $data['pegawai_created_by'] = $this->session->userdata('user_login')['username'];

            if (!$this->upload->do_upload('file')) {
                $data['photo'] = 'default.png';
            } else {
                $data['photo'] = $this->upload->data('file_name');
            }

            $response = $this->General->insertRecord('tbl_user_pegawai', $data);
        }
        LogActivity($this->db->last_query());

        if ($response) {
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('User');
        }
    }
}
