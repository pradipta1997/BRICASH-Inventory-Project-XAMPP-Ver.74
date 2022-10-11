<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detcurrency extends MY_Controller
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
        $data = array(
            'currency' => $this->General->fetch_records("tbl_currency")
        );


        $this->header('List Detail Currency');
        $this->load->view('Detcurrency/list_detcurrency', $data);
        $this->footer();
    }

    public function listDetcurrency()
    {
        $list = $this->Serverside->_serverSide(
            'v_currency',
            ['no', 'nama_currency', 'tgl_kurs', 'rupiah', 'keterangan'],
            ['nama_currency', 'tgl_kurs', 'rupiah', 'keterangan'],
            ['id_det_currency' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_currency . " | " . $results->nama_currency;
            $row[] = $results->tgl_kurs;
            $row[] = $results->rupiah;
            $row[] = $results->keterangan;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VDetcurrency($results->id_det_currency)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteDetcurrency($results->id_det_currency)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_currency'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_currency',
                ['no', 'nama_currency', 'tgl_kurs', 'rupiah', 'keterangan'],
                ['nama_currency', 'tgl_kurs', 'rupiah', 'keterangan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formDetcurrency()
    {
        if (input('id_det_currency')) {
            $this->_editDetcurrency();
        } else {
            $this->_saveDetcurrency();
        }
    }

    private function _saveDetcurrency()
    {
        $data = array(
            'id_currency' => input('id_currency'),
            'tgl_kurs' => input('tgl_kurs'),
            'tgl_kurs' => input('tgl_kurs'),
            'rupiah' => input('rupiah'),
            'keterangan' => input('keterangan'),
            'detcur_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_det_currency', $data);

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

    public function viewDetcurrency($id_det_currency)
    {
        $data = $this->General->fetch_records('tbl_det_currency', ['id_det_currency' => $id_det_currency]);
        echo json_encode($data);
    }

    private function _editDetcurrency()
    {
        $data = array(
            'id_currency' => input('id_currency'),
            'tgl_kurs' => input('tgl_kurs'),
            'tgl_kurs' => input('tgl_kurs'),
            'rupiah' => input('rupiah'),
            'keterangan' => input('keterangan'),
            'detcur_updated_date' => date('Y-m-d H:i:s'),
            'detcur_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_det_currency' => input('id_det_currency')], 'tbl_det_currency');

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

    public function deleteDetcurrency()
    {
        $deleteDetcurrency = $this->General->deleteData('tbl_det_currency', ['id_det_currency' => input('id_det_currency')]);

        if ($deleteDetcurrency) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
