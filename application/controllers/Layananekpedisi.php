<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layananekpedisi extends MY_Controller
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
        $data = array('ekpedisi' => $this->General->fetch_records("tbl_ekpedisi"));
        $this->header('List Layanan Ekpedisi');
        $this->load->view('Layananekpedisi/list_layananekpedisi', $data);
        $this->footer();
    }

    public function listLayananekpedisi()
    {
        $list = $this->Serverside->_serverSide(
            'v_ekspedisi',
            ['no',  'nama_ekpedisi', 'layanan_ekspedisi', 'keterangan'],
            ['nama_ekpedisi', 'layanan_ekspedisi', 'keterangan'],
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
            $row[] = $results->layanan_ekspedisi;
            $row[] = $results->keterangan;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VLayananekpedisi($results->id_layanan_ekspedisi)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteLayananekpedisi($results->id_layanan_ekspedisi)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_ekspedisi'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_ekspedisi',
                ['no',  'nama_ekpedisi', 'layanan_ekspedisi', 'keterangan'],
                ['nama_ekpedisi', 'layanan_ekspedisi', 'keterangan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formLayananekpedisi()
    {
        if (input('id_layanan_ekspedisi')) {
            $this->_editLayananekpedisi();
        } else {
            $this->_saveLayananekpedisi();
        }
    }

    private function _saveLayananekpedisi()
    {
        $data = array(
            'id_ekspedisi' => input('id_ekspedisi'),
            'layanan_ekspedisi' => input('layanan_ekspedisi'),
            'layanan_ekspedisi_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_layanan_ekspedisi', $data);

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

    public function viewLayananekpedisi($id_layanan_ekspedisi)
    {
        $data = $this->General->fetch_records('tbl_layanan_ekspedisi', ['id_layanan_ekspedisi' => $id_layanan_ekspedisi]);
        echo json_encode($data);
    }

    private function _editLayananekpedisi()
    {
        $data = array(
            'id_ekspedisi' => input('id_ekspedisi'),
            'layanan_ekspedisi' => input('layanan_ekspedisi'),
            'layanan_ekspedisi_updated_date' => date('Y-m-d H:i:s'),
            'layanan_ekspedisi_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_layanan_ekspedisi' => input('id_layanan_ekspedisi')], 'tbl_layanan_ekspedisi');

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

    public function deleteLayananekpedisi()
    {
        $deleteLayananekpedisi = $this->General->deleteData('tbl_layanan_ekspedisi', ['id_layanan_ekspedisi' => input('id_layanan_ekspedisi')]);

        if ($deleteLayananekpedisi) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }
}
