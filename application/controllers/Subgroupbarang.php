<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subgroupbarang extends MY_Controller
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

        $data['groupbarang'] = $this->General->fetch_records("tbl_gbarang");
        $this->header('List Subgroup Barang');
        $this->load->view('Subgroupbarang/list_subgroupbarang', $data);
        $this->footer();
    }

    public function listSubgroupbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_sgbarang',
            ['no', 'nama_gbarang', 'nama_sgbarang'],
            ['nama_gbarang', 'nama_sgbarang'],
            ['id_sgbarang' => 'desc'],
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
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VSubgroupbarang($results->id_sgbarang)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteSubgroupbarang($results->id_sgbarang)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_sgbarang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_sgbarang',
                ['no', 'nama_gbarang', 'nama_sgbarang'],
                ['nama_gbarang', 'nama_sgbarang']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formSubgroupbarang()
    {
        if (input('id_sgbarang')) {
            $this->_editSubgroupbarang();
        } else {
            $this->_saveSubgroupbarang();
        }
    }

    private function _saveSubgroupbarang()
    {
        $data = array(
            'id_gbarang' => input('id_gbarang'),
            'nama_sgbarang' => input('nama'),
            'sgbarang_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_sgbarang', $data);

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

    public function viewSubgroupbarang($id_sgbarang)
    {
        $data = $this->General->fetch_records('v_sgbarang', ['id_sgbarang' => $id_sgbarang]);
        echo json_encode($data);
    }

    private function _editSubgroupbarang()
    {
        $data = array(
            'id_gbarang' => input('id_gbarang'),
            'nama_sgbarang' => input('nama'),
            'sgbarang_updated_date' => date('Y-m-d H:i:s'),
            'sgbarang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_sgbarang' => input('id_sgbarang')], 'tbl_sgbarang');

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

    public function deleteSubgroupbarang()
    {
        $deleteSubgroupbarang = $this->General->deleteData('tbl_sgbarang', ['id_sgbarang' => input('id_sgbarang')]);

        if ($deleteSubgroupbarang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }
}
