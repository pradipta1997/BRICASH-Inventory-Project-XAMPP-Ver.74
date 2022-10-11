<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends MY_Controller
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

        $this->header('List Satuan User');
        $this->load->view('Satuan/list_satuan');
        $this->footer();
    }

    public function listSatuan()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_satuan',
            ['no', 'nama_satuan'],
            ['nama_satuan'],
            ['id_satuan' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_satuan;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VSatuan($results->id_satuan)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteSatuan($results->id_satuan)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_satuan'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_satuan',
                ['no', 'nama_satuan'],
                ['nama_satuan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formSatuan()
    {
        if (input('id_satuan')) {
            $this->_editSatuan();
        } else {
            $this->_saveSatuan();
        }
    }

    private function _saveSatuan()
    {
        $data = array(
            'nama_satuan' => input('nama'),
            'satuan_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_satuan', $data);

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

    public function viewSatuan($id_satuan)
    {
        $data = $this->General->fetch_records('tbl_satuan', ['id_satuan' => $id_satuan]);
        echo json_encode($data);
    }

    private function _editSatuan()
    {
        $data = array(
            'nama_satuan' => input('nama'),
            'satuan_updated_date' => date('Y-m-d H:i:s'),
            'satuan_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_satuan' => input('id_satuan')], 'tbl_satuan');

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

    public function deleteSatuan()
    {
        $deleteSatuan = $this->General->deleteData('tbl_satuan', ['id_satuan' => input('id_satuan')]);

        if ($deleteSatuan) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
