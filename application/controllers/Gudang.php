<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends MY_Controller
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

        $data['unitkerja'] = $this->General->fetch_records("tbl_unit_kerja");
        $this->header('List Gudang');
        $this->load->view('Gudang/list_gudang', $data);
        $this->footer();
    }

    public function listGudang()
    {
        $list = $this->Serverside->_serverSide(
            'v_gudang',
            ['no', 'nama_uker', 'nama_gudang', 'letak_gudang', 'ket_gudang'],
            ['nama_uker', 'nama_gudang', 'letak_gudang', 'ket_gudang'],
            ['id_gudang' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker . " | " . $results->nama_uker;
            $row[] = $results->nama_gudang;
            $row[] = $results->letak_gudang;
            $row[] = $results->ket_gudang;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VGudang($results->id_gudang)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteGudang($results->id_gudang)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_gudang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_gudang',
                ['no', 'nama_uker', 'nama_gudang', 'letak_gudang', 'ket_gudang'],
                ['nama_uker', 'nama_gudang', 'letak_gudang', 'ket_gudang']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formGudang()
    {
        if (input('id_gudang')) {
            $this->_editGudang();
        } else {
            $this->_saveGudang();
        }
    }

    private function _saveGudang()
    {
        $data = array(
            'id_uker' => input('id_uker'),
            'nama_gudang' => input('nama'),
            'letak_gudang' => input('letak'),
            'ket_gudang' => input('keterangan'),
            'gudang_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_gudang', $data);

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

    public function viewGudang($id_gudang)
    {
        $data = $this->General->fetch_records('v_gudang', ['id_gudang' => $id_gudang]);
        echo json_encode($data);
    }

    private function _editGudang()
    {

        $data = array(
            'id_uker' => input('id_uker'),
            'nama_gudang' => input('nama'),
            'letak_gudang' => input('letak'),
            'ket_gudang' => input('keterangan'),
            'gudang_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_gudang' => input('id_gudang')], 'tbl_gudang');

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

    public function deleteGudang()
    {
        $deleteGudang = $this->General->deleteData('tbl_gudang', ['id_gudang' => input('id_gudang')]);

        if ($deleteGudang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
