<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Currency extends MY_Controller
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

        $this->header('List Currency');
        $this->load->view('Currency/list_currency');
        $this->footer();
    }

    public function listCurrency()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_currency',
            ['no', 'kode_currency', 'nama_currency'],
            ['kode_currency', 'nama_currency'],
            ['id_currency' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_currency;
            $row[] = $results->nama_currency;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VCurrency($results->id_currency)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteCurrency($results->id_currency)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_currency'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_currency',
                ['no', 'kode_currency', 'nama_currency'],
                ['kode_currency', 'nama_currency']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formCurrency()
    {
        if (input('id_currency')) {
            $this->_editCurrency();
        } else {
            $this->_saveCurrency();
        }
    }

    private function _saveCurrency()
    {
        $data = array(
            'kode_currency' => input('kode'),
            'nama_currency' => input('nama'),
            'currency_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_currency', $data);

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

    public function viewCurrency($id_currency)
    {
        $data = $this->General->fetch_records('tbl_currency', ['id_currency' => $id_currency]);
        echo json_encode($data);
    }

    private function _editCurrency()
    {

        $data = array(
            'kode_currency' => input('kode'),
            'nama_currency' => input('nama'),
            'currency_updated_date' => date('Y-m-d H:i:s'),
            'currency_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_currency' => input('id_currency')], 'tbl_currency');

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

    public function deleteCurrency()
    {
        $deleteCurrency = $this->General->deleteData('tbl_currency', ['id_currency' => input('id_currency')]);

        if ($deleteCurrency) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
