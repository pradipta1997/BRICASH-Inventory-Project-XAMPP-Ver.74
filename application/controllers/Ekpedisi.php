<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ekpedisi extends MY_Controller
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
        $this->header('List Ekpedisi');
        $this->load->view('Ekpedisi/list_ekpedisi');
        $this->footer();
    }

    public function listEkpedisi()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_ekpedisi',
            ['no',  'nama_ekpedisi', 'keterangan'],
            ['nama_ekpedisi', 'keterangan'],
            ['nama_ekpedisi' => 'asc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->keterangan;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VEkpedisi($results->id_ekpedisi)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteEkpedisi($results->id_ekpedisi)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_ekpedisi'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_ekpedisi',
                ['no',  'nama_ekpedisi', 'keterangan'],
                ['nama_ekpedisi', 'keterangan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formEkpedisi()
    {
        if (input('id_ekpedisi')) {
            $this->_editEkpedisi();
        } else {
            $this->_saveEkpedisi();
        }
    }

    private function _saveEkpedisi()
    {
        $data = array(
            'id_delivery_type' => 3,
            'nama_ekpedisi' => input('nama'),
            'keterangan' => input('keterangan'),
            'ekpedisi_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_ekpedisi', $data);

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

    public function viewEkpedisi($id_ekpedisi)
    {
        $data = $this->General->fetch_records('tbl_ekpedisi', ['id_ekpedisi' => $id_ekpedisi]);
        echo json_encode($data);
    }

    private function _editEkpedisi()
    {
        $data = array(
            'id_delivery_type' => 3,
            'nama_ekpedisi' => input('nama'),
            'keterangan' => input('keterangan'),
            'ekpedisi_updated_date' => date('Y-m-d H:i:s'),
            'ekpedisi_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_ekpedisi' => input('id_ekpedisi')], 'tbl_ekpedisi');

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

    public function deleteEkpedisi()
    {
        $deleteEkpedisi = $this->General->deleteData('tbl_ekpedisi', ['id_ekpedisi' => input('id_ekpedisi')]);

        if ($deleteEkpedisi) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }
}
