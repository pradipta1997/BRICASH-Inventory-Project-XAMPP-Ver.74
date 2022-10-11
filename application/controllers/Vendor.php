<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vendor extends MY_Controller
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

        $this->header('List Vendor');
        $this->load->view('Vendor/list_vendor');
        $this->footer();
    }

    public function listVendor()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_vendor',
            ['no', 'kode_vendor', 'nama_vendor', 'nama_bank', 'no_rekening', 'no_npwp', 'nama_rekening', 'telp_vendor', 'email_vendor', 'alamat_vendor', 'nama_pic', 'email_pic', 'telp_pic', 'posisi_pic', 'ket'],
            ['kode_vendor', 'nama_vendor', 'nama_bank', 'no_rekening', 'no_npwp', 'nama_rekening', 'telp_vendor', 'email_vendor', 'alamat_vendor', 'nama_pic', 'email_pic', 'telp_pic', 'posisi_pic', 'ket'],
            ['id_vendor' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_vendor;
            $row[] = $results->nama_vendor;
            $row[] = $results->nama_bank;
            $row[] = $results->no_rekening;
            $row[] = $results->no_npwp;
            $row[] = $results->nama_rekening;
            $row[] = $results->telp_vendor;
            $row[] = $results->email_vendor;
            $row[] = $results->alamat_vendor;
            $row[] = $results->ket;
            $row[] = " <button type='button' class='btn btn-sm btn-primary btn-sm' " . getEditperm() . " onclick='Vpic($results->id_vendor)'>
                        <i class='fa fa-user-o'></i> PIC
                    </button>
                    <button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VVendor($results->id_vendor)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteVendor($results->id_vendor)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_vendor'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_vendor',
                ['no', 'kode_vendor', 'nama_vendor', 'nama_bank', 'no_rekening', 'no_npwp', 'nama_rekening', 'telp_vendor', 'email_vendor', 'alamat_vendor', 'nama_pic', 'email_pic', 'telp_pic', 'posisi_pic', 'ket'],
                ['kode_vendor', 'nama_vendor', 'nama_bank', 'no_rekening', 'no_npwp', 'nama_rekening', 'telp_vendor', 'email_vendor', 'alamat_vendor', 'nama_pic', 'email_pic', 'telp_pic', 'posisi_pic', 'ket']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formVendor()
    {
        if (input('id_vendor')) {
            $this->_editVendor();
        } else {
            $this->_saveVendor();
        }
    }

    private function _saveVendor()
    {
        $data = array(
            'kode_vendor' => input('kd_vendor'),
            'nama_vendor' => input('nama'),
            'nama_bank' => input('nama_bank'),
            'no_rekening' => input('no_rekening'),
            'no_npwp' => input('no_npwp'),
            'nama_rekening' => input('nama_rekening'),
            'email_vendor' => input('email'),
            'telp_vendor' => input('telp'),
            'alamat_vendor' => input('alamat'),
            'nama_pic' => input('namapic'),
            'email_pic' => input('emailpic'),
            'telp_pic' => input('telppic'),
            'posisi_pic' => input('posisipic'),
            'ket' => input('ket'),
            'vendor_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_vendor', $data);

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

    public function viewVendor($id_vendor)
    {
        $data = $this->General->fetch_records('tbl_vendor', ['id_vendor' => $id_vendor]);
        echo json_encode($data);
    }

    private function _editVendor()
    {
        $data = array(
            'kode_vendor' => input('kd_vendor'),
            'nama_vendor' => input('nama'),
            'nama_bank' => input('nama_bank'),
            'no_rekening' => input('no_rekening'),
            'no_npwp' => input('no_npwp'),
            'nama_rekening' => input('nama_rekening'),
            'email_vendor' => input('email'),
            'telp_vendor' => input('telp'),
            'alamat_vendor' => input('alamat'),
            'nama_pic' => input('namapic'),
            'email_pic' => input('emailpic'),
            'telp_pic' => input('telppic'),
            'posisi_pic' => input('posisipic'),
            'ket' => input('ket'),
            'vendor_updated_date' => date('Y-m-d H:i:s'),
            'vendor_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_vendor' => input('id_vendor')], 'tbl_vendor');

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

    public function deleteVendor()
    {
        $deleteVendor = $this->General->deleteData('tbl_vendor', ['id_vendor' => input('id_vendor')]);

        if ($deleteVendor) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
