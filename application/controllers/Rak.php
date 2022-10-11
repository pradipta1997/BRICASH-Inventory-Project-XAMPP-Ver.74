<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rak extends MY_Controller
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

        $data['gudang'] = $this->General->fetch_records("v_gudang");
        $this->header('List Rak');
        $this->load->view('Rak/list_rak', $data);
        $this->footer();
    }

    public function listRak()
    {
        $list = $this->Serverside->_serverSide(
            'v_rak',
            ['no', 'nama_uker', 'nama_gudang', 'nama_rak', 'ket_rak', 'flag_rakqc', 'flag_rakjunk'],
            ['nama_uker', 'nama_gudang', 'nama_rak', 'ket_rak'],
            ['id_rak' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $rakQc = $results->flag_rakqc == 1 ? labelWarna("success", 'Ini Rak QC') : labelWarna("danger", "Bukan Rak QC");
            $rakJunk = $results->flag_rakjunk == 1 ? labelWarna("success", 'Ini Rak Junk') : labelWarna("danger", "Bukan Rak Junk");

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker . " | " . $results->nama_uker;
            $row[] = $results->nama_gudang . " | " . $results->letak_gudang;
            $row[] = $results->nama_rak;
            $row[] = $results->ket_rak;
            $row[] = $rakQc;
            $row[] = $rakJunk;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VRak($results->id_rak)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteRak($results->id_rak)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_rak'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_rak',
                ['no', 'nama_uker', 'nama_gudang', 'nama_rak', 'ket_rak', 'flag_rakqc', 'flag_rakjunk'],
                ['nama_uker', 'nama_gudang', 'nama_rak', 'ket_rak']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formRak()
    {
        if (input('id_rak')) {
            $this->_editRak();
        } else {
            $this->_saveRak();
        }
    }

    private function _saveRak()
    {
        $data = array(
            'id_gudang' => input('id_gudang'),
            'nama_rak' => input('nama'),
            'ket_rak' => input('keterangan'),
            'flag_rakqc' => input('rak_qc') ? 1 : 0,
            'flag_rakjunk' => input('rak_junk') ? 1 : 0,
            'rak_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_rak', $data);

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

    public function viewRak($id_rak)
    {
        $data = $this->General->fetch_records('v_rak', ['id_rak' => $id_rak]);
        echo json_encode($data);
    }

    private function _editRak()
    {
        $data = array(
            'id_gudang' => input('id_gudang'),
            'nama_rak' => input('nama'),
            'ket_rak' => input('keterangan'),
            'flag_rakqc' => input('rak_qc') ? 1 : 0,
            'flag_rakjunk' => input('rak_junk') ? 1 : 0,
            'rak_created_date' => date('Y-m-d H:i:s'),
            'rak_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_rak' => input('id_rak')], 'tbl_rak');

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

    public function deleteRak()
    {
        $deleteRak = $this->General->deleteData('tbl_rak', ['id_rak' => input('id_rak')]);

        if ($deleteRak) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
