<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegInvoiceEkspedisi extends MY_Controller
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
        // $data['Reginekspedisi'] = $this->General->fetch_records("tbl_regin_ekspedisi");
        $data['vendor'] = $this->General->fetch_records("tbl_vendor");
        $this->header('List Registrasi Invoice Ekspedisi');
        $this->load->view('RegInvoiceEkspedisi/list_regInvoiceEkspedisi', $data);
        $this->footer();
    }

    public function listReginekspedisi()
    {
        $list = $this->Serverside->_serverSide(
            'v_regin_ekspedisi',
            ['no', 'no_invoice', 'tgl_invoice', 'periode', 'nama_vendor', 'nilai_invoice', 'status_verif'],
            ['no_invoice', 'tgl_invoice', 'periode', 'nama_vendor', 'nilai_invoice', 'status_verif'],
            ['no_invoice' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_invoice;
            $row[] = $results->tgl_invoice;
            $row[] = $results->periode;
            $row[] = $results->nama_vendor;
            $row[] = $results->nilai_invoice;
            $row[] = $results->status_verif == 0 ? labelWarna("danger", "Not Verify") : labelWarna("success", "Verify");
            $row[] = "
                    <button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VReginekspedisi($results->id_invoice)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteRegin($results->id_invoice)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>
                    ";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_regin_ekspedisi'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_regin_ekspedisi',
                ['no', 'no_invoice', 'tgl_invoice', 'periode', 'nama_vendor', 'nilai_invoice', 'status_verif'],
                ['no_invoice', 'tgl_invoice', 'periode', 'nama_vendor', 'nilai_invoice', 'status_verif']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formReginekspedisi()
    {
        if (input('id_invoice')) {
            $this->_editReginekspedisi();
        } else {
            $this->_saveReginekspedisi();
        }
    }

    public function _saveReginekspedisi()
    {
        $data = array(
            'id_vendor' => input('id_vendor'),
            'no_invoice' => input('no_invoice'),
            'tgl_invoice' => input('tgl_invoice'),
            'periode' => input('periode'),
            // 'nama_vendor' => input('nama_vendor'),
            // 'alamat_vendor' => input('alamat_vendor'),
            'nilai_invoice' => input('nilai_invoice'),
            'regineks_created_date' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_regin_ekspedisi', $data);

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

    public function viewReginekspedisi($id_invoice)
    {
        $data = $this->General->fetch_records('v_regin_ekspedisi', ['id_invoice' => $id_invoice]);
        echo json_encode($data);
    }

    private function _editReginekspedisi()
    {

        $data = array(
            'id_vendor' => input('id_vendor'),
            'no_invoice' => input('no_invoice'),
            'tgl_invoice' => input('tgl_invoice'),
            'periode' => input('periode'),
            // 'nama_vendor' => input('nama_vendor'),
            // 'alamat_vendor' => input('alamat_vendor'),
            'nilai_invoice' => input('nilai_invoice'),
            'regineks_updated_date' => Date("Y-m-d H:i:s"),
            'regineks_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_invoice' => input('id_invoice')], 'tbl_regin_ekspedisi');

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

    public function deleteRegin()
    {
        $deleteRegin = $this->General->deleteData('tbl_regin_ekspedisi', ['id_invoice' => input('id_invoice')]);

        if ($deleteRegin) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
