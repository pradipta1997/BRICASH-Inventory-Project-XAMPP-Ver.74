<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Groupbarang extends MY_Controller
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

        $this->header('List Group Barang');
        $this->load->view('Groupbarang/list_groupbarang');
        $this->footer();
    }

    public function listGroupbarang()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_gbarang',
            ['no', 'nama_gbarang'],
            ['nama_gbarang'],
            ['id_gbarang' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_gbarang;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VGroupbarang($results->id_gbarang)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteGroupbarang($results->id_gbarang)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_gbarang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_gbarang',
                ['no', 'nama_gbarang'],
                ['nama_gbarang']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formGroupbarang()
    {
        if (input('id_gbarang')) {
            $this->_editGroupbarang();
        } else {
            $this->_saveGroupbarang();
        }
    }

    private function _saveGroupbarang()
    {
        $data = array(
            'nama_gbarang' => input('nama'),
            'gbarang_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_gbarang', $data);

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

    public function viewGroupbarang($id_gbarang)
    {
        $data = $this->General->fetch_records('tbl_gbarang', ['id_gbarang' => $id_gbarang]);
        echo json_encode($data);
    }

    private function _editGroupbarang()
    {
        $data = array(
            'nama_gbarang' => input('nama'),
            'gbarang_updated_date' => date('Y-m-d H:i:s'),
            'gbarang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_gbarang' => input('id_gbarang')], 'tbl_gbarang');

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

    public function deleteGroupbarang()
    {
        $deleteGroupbarang = $this->General->deleteData('tbl_gbarang', ['id_gbarang' => input('id_gbarang')]);

        if ($deleteGroupbarang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
