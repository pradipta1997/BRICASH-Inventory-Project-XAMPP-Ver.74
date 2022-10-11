<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function index()
    {

        $data['uker'] = $this->General->fetch_records("tbl_unit_kerja");
        $data['usersgroup'] = $this->General->fetch_records("v_subgroupuser");
        $this->header('List User');
        $this->load->view('User/list_user', $data);
        $this->footer();
    }

    public function listUser()
    {
        $list = $this->Serverside->_serverSide(
            'v_user',
            ['no', 'nama_uker', 'nama_group', 'nama_subgroup', 'username'],
            ['nama_uker', 'nama_group', 'nama_subgroup', 'username'],
            ['id_user' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $linkPermession = base_url('Pegawai/Data/' . $results->id_user);

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker . " | " . $results->nama_uker;
            $row[] = $results->nama_group;
            $row[] = $results->nama_subgroup;
            $row[] = $results->username;
            $row[] = "<a href='$linkPermession'  " . getEditperm() . " data-toggle='modal' class='btn btn-primary btn-sm'>
                        <i class='fa fa-pencil-square-o'></i> Biodata
                    </a>
                    <button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VUser($results->id_user)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . "  onclick='deleteUser($results->id_user)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_user'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_user',
                ['no', 'nama_group', 'nama_subgroup', 'username'],
                ['nama_group', 'nama_subgroup', 'username']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formUser()
    {
        if (input('id_user')) {
            $this->_editUser();
        } else {
            $this->_saveUser();
        }
    }

    private function _saveUser()
    {
        $data = array(
            'id_uker' => input('id_uker'),
            'id_sgroup' => input('id_sgroup'),
            'username' => input('username'),
            'password' => sha1(md5(input('password'))),
            'user_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_user', $data);

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Data berhasil di simpan!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di simpan!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function viewUser($id_user)
    {
        $data = $this->General->fetch_records('v_user', ['id_user' => $id_user]);
        echo json_encode($data);
    }

    private function _editUser()
    {
        $data = array(
            'id_uker' => input('id_uker'),
            'id_sgroup' => input('id_sgroup'),
            'username' => input('username'),
            'user_updated_date' => date('Y-m-d H:i:s'),
            'user_updated_by' => $this->session->userdata('user_login')['username']
        );

        if (input('password')) {
            $data['password'] = sha1(md5(input('password')));
        }

        $response = $this->General->update_record($data, ['id_user' => input('id_user')], 'tbl_user');

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Data berhasil di edit!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di edit!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function deleteUser()
    {
        $deleteUser = $this->General->deleteData('tbl_user', ['id_user' => input('id_user')]);

        if ($deleteUser) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }

    public function Updateprofile()
    {
        $data['uker'] = $this->General->fetch_records("tbl_unit_kerja");
        $data['user'] = $this->General->getRow("v_pegawai", ['id_user' => $this->session->userdata('user_login')['id_user']]);
        $this->header('Update Profile');
        $this->load->view('Settings/update_profile', $data);
        $this->footer();
    }

    public function saveProfile($id_user)
    {
        $user = array(
            'id_uker' => input('id_uker'),
            'username' => input('username')
        );

        if (input('password')) {
            $user['password'] = sha1(md5(input('password')));
        }

        $response = $this->General->update_record($user, ['id_user' => $id_user], 'tbl_user');
        LogActivity($this->db->last_query());

        $pegawai = array(
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

        if ($id_user) {
            $pegawai['pegawai_updated_date'] = date('Y-m-d H:i:s');
            $pegawai['pegawai_updated_by'] = $this->session->userdata('user_login')['username'];

            if ($this->upload->do_upload('file')) {
                $qpOld = $this->General->select_where("tbl_user_pegawai", ['id_user' => $id_user], 's');
                if ($qpOld->photo != 'default.png') {
                    HapusFileOld('assets/img/pegawai/' . $qpOld->photo);
                }

                $pegawai['photo'] = $this->upload->data('file_name');
            }

            $response = $this->General->update_record($pegawai, ['id_user' => $id_user], 'tbl_user_pegawai');
        } else {
            $pegawai['pegawai_created_date'] = date('Y-m-d H:i:s');
            $pegawai['pegawai_created_by'] = $this->session->userdata('user_login')['username'];

            if (!$this->upload->do_upload('file')) {
                $pegawai['photo'] = 'default.png';
            } else {
                $pegawai['photo'] = $this->upload->data('file_name');
            }

            $response = $this->General->insertRecord('tbl_user_pegawai', $pegawai);
        }

        if ($response) {
            LogActivity($this->db->last_query());

            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Auth/Logout');
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('User/Updateprofile');
        }
    }
}
