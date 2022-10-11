<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penbarlolosqc extends MY_Controller
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
            'rak' => $this->General->fetch_records("v_rak")
        );

        cekPergroup();
        $this->header('List Penerimaan Barang Lolos QC');
        $this->load->view('Penbarlolosqc/list_penbarlolosqc', $data);
        $this->footer();
    }

    public function listBarangqcven()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangqcvendor',
            ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if ($results->flag_qc == 2) {
                $flag_qc = labelWarna("success", "Bagus");
            } else if ($results->flag_qc == 1) {
                $flag_qc =  labelWarna("danger", "Rusak");
            } else {
                $flag_qc = labelWarna("warning", "Not QC");
            }


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_po;
            $row[] = $results->no_do;
            $row[] = $results->tgl_qc;
            $row[] = $results->kode_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->no_sn;
            $row[] = $results->nama_vendor;
            $row[] = $flag_qc;
            $row[] = $results->flag_greenpart == 1 ? labelWarna("info", "Greenpart") : labelWarna("info", "Not Greenpart");
            $row[] = $results->flag_retur == 1 ? labelWarna("danger", "Barang Retur") : labelWarna("success", "Not Retur");
            $row[] = $results->flag_fisik == 1 ? labelWarna("success", "Bagus") : labelWarna("danger", "Rusak");
            $row[] = "<button type='button' class='btn btn-warning' " . getEditperm() . " onclick='VBarangqcven($results->id_tmp)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>";
            // <button type='button' class='btn btn-danger' " . getDeleteperm() . " onclick='deleteBarangqcven($results->id_tmp)'>
            //     <i class='fa fa-trash' aria-hidden='true'></i>
            // </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangqcvendor'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangqcvendor',
                ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
                ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function VBarangqcven($id_tmp)
    {
        $data = $this->General->fetch_records('v_barangqcvendor', ['id_tmp' => $id_tmp]);
        echo json_encode($data);
    }

    public function updateBarangqcven()
    {
        $data = array(
            'no_sn' => input('no_sn'),
            'tgl_qc' => input('tgl_qc'),
            'id_rak' => input('id_rak'),
            'flag_qc' => input('flag_qc') ? 2 : 1,
            'flag_greenpart' => input('flag_greenpart') ? 1 : 0,
            'flag_retur' => input('flag_retur') ? 1 : 0,
            'flag_dikemas' => input('flag_dikemas') ? 1 : 0,
            'flag_cacat' => input('flag_cacat') ? 1 : 0,
            'flag_fisik' => input('flag_fisik') ? 1 : 0,
            'ket' => input('ket'),
            'barang_updated_date' => date('Y-m-d H:i:s'),
            'barang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_tmp' => input('id_tmp')], 'tbl_barang_temp');

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Barang berhasil di QC!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Barang gagal di QC!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }
}
