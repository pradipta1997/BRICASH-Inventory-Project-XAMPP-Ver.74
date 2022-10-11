<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipebarang extends MY_Controller
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

        $data['mbarang'] = $this->General->fetch_records("v_merek");
        $this->header('List Tipe Barang');
        $this->load->view('Tipebarang/list_tipebarang', $data);
        $this->footer();
    }

    public function listTipebarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_tipe_barang',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang'],
            ['nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang'],
            ['id_tipe_barang' => 'desc'],
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
            $row[] = $results->tipe_barang;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VTipebarang($results->id_tipe_barang)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' onclick='deleteTipebarang($results->id_tipe_barang)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_tipe_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_tipe_barang',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang'],
                ['nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formTipebarang()
    {
        if (input('id_tipe_barang')) {
            $this->_editTipebarang();
        } else {
            $this->_saveTipebarang();
        }
    }

    private function _saveTipebarang()
    {
        $data = array(
            'id_merek' => input('id_merek'),
            'tipe_barang' => input('nama'),
            'tbarang_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_tipe_barang', $data);

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

    public function viewTipebarang($id_tipe_barang)
    {
        $data = $this->General->fetch_records('v_tipe_barang', ['id_tipe_barang' => $id_tipe_barang]);
        echo json_encode($data);
    }

    private function _editTipebarang()
    {
        $data = array(
            'id_merek' => input('id_merek'),
            'tipe_barang' => input('nama'),
            'tbarang_updated_date' => date('Y-m-d H:i:s'),
            'tbarang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_tipe_barang' => input('id_tipe_barang')], 'tbl_tipe_barang');

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

    public function deleteTipebarang()
    {
        $deleteTipebarang = $this->General->deleteData('tbl_tipe_barang', ['id_tipe_barang' => input('id_tipe_barang')]);

        if ($deleteTipebarang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
