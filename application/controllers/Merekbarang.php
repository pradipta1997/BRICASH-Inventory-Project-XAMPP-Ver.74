<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merekbarang extends MY_Controller
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

        $data['sgbarang'] = $this->General->fetch_records("v_sgbarang");
        $this->header('List Merek Barang');
        $this->load->view('Merekbarang/list_merekbarang', $data);
        $this->footer();
    }

    public function listMerekbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_merek',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek'],
            ['nama_gbarang', 'nama_sgbarang', 'nama_merek'],
            ['id_merek' => 'desc'],
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
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_merek;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VMerekbarang($results->id_merek)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteMerekbarang($results->id_merek)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_merek'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_merek',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek'],
                ['nama_gbarang', 'nama_sgbarang', 'nama_merek']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formMerekbarang()
    {
        if (input('id_merek')) {
            $this->_editMerekbarang();
        } else {
            $this->_saveMerekbarang();
        }
    }

    private function _saveMerekbarang()
    {
        $data = array(
            'id_sgbarang' => input('id_sgbarang'),
            'nama_merek' => input('nama'),
            'merek_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_merek', $data);

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

    public function viewMerekbarang($id_merek)
    {
        $data = $this->General->fetch_records('v_merek', ['id_merek' => $id_merek]);
        echo json_encode($data);
    }

    private function _editMerekbarang()
    {
        $data = array(
            'id_sgbarang' => input('id_sgbarang'),
            'nama_merek' => input('nama'),
            'merek_updated_date' => date('Y-m-d H:i:s'),
            'merek_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_merek' => input('id_merek')], 'tbl_merek');

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

    public function deleteMerekbarang()
    {
        $deleteMerekbarang = $this->General->deleteData('tbl_merek', ['id_merek' => input('id_merek')]);

        if ($deleteMerekbarang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
