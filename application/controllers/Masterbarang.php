<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterbarang extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    // ------------------------------------------------------

    public function index()
    {

        $this->header('List Master Barang');
        $data['tipeBarang'] = $this->General->fetch_records("v_tipe_barang");
        $data['satuan'] = $this->General->fetch_records("tbl_satuan");
        $this->load->view('Masterbarang/list_masterbarang', $data);
        $this->footer();
    }

    // ------------------------------------------------------

    public function listMasterbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_barang',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'nama_satuan', 'min_stock', 'max_stock'],
            ['nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'nama_satuan', 'min_stock', 'max_stock'],
            ['nama_barang' => 'asc'],
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
            $row[] = $results->kode_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_satuan;
            $row[] = $results->min_stock;
            $row[] = $results->max_stock;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VBarang($results->no_urut)'>
                            <i class='fa fa-pencil-square-o'></i>
                      </button>

                      <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='activeBarang($results->no_urut)'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                      </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barang',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'nama_satuan', 'min_stock', 'max_stock'],
                ['nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'nama_satuan', 'min_stock', 'max_stock']
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }


    // ------------------------------------------------------

    public function formBarang()
    {
        if (input('no_urut')) {
            $this->editMbarang();
        } else {
            $this->saveMbarang();
        }
    }


    // ------------------------------------------------------

    public function saveMbarang()
    {
        $data = array(
            'id_tipe_barang' => input('id_tipe_barang'),
            'id_satuan' => input('id_satuan'),
            'kode_barang' => input('kode_barang'),
            'nama_barang' => input('nama_barang'),
            'min_stock' => input('min_stock'),
            'max_stock' => input('max_stock'),
            'barang_created_by' => $this->session->userdata("user_login")['username']
        );

        $response = $this->General->insertRecord('tbl_barang', $data);

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

    // ------------------------------------------------------

    public function viewBarang($no_urut)
    {
        $data = $this->General->fetch_records('v_barang', ['no_urut' => $no_urut]);
        echo json_encode($data);
    }

    // ------------------------------------------------------


    public function editMbarang()
    {
        $data = array(
            'id_tipe_barang' => input('id_tipe_barang'),
            'id_satuan' => input('id_satuan'),
            'kode_barang' => input('kode_barang'),
            'nama_barang' => input('nama_barang'),
            'min_stock' => input('min_stock'),
            'max_stock' => input('max_stock'),
            'barang_updated_date' => date("Y-m-d H:i:s"),
            'barang_updated_by' => $this->session->userdata("user_login")['username']
        );

        $response = $this->General->update_record($data, ['no_urut' => input('no_urut')], 'tbl_barang');

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


    // ------------------------------------------------------


    public function deleteMbarang()
    {
        $deleteBarang = $this->General->deleteData('tbl_barang', ['no_urut' => input('no_urut')]);

        if ($deleteBarang) {
            LogActivity($this->db->last_query());
            $message = 'Data berhasil di hapus!';
        } else {
            $message = 'Data gagal di edit!';
        }
        echo json_encode($message);
    }
}
