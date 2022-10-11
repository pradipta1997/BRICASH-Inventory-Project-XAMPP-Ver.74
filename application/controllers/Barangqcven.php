<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangqcven extends MY_Controller
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

        $this->header('List Barang QC Vendor');
        $this->load->view('Barangqcven/list_Barangqcven');
        $this->footer();
    }

    public function listBarangqcven()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangqcvendor',
            ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po' => 'desc'],
            '`flag_qc` != 2 AND  ( `flag_retur` != 1 OR `flag_retur` IS NULL) AND (`flag_dikemas` != 1 OR `flag_dikemas` IS NULL) AND (`flag_cacat` != 0 OR `flag_cacat` IS NULL) AND (`flag_fisik` != 1 OR `flag_fisik` IS NULL) AND (`flag_brg_sesuai` != 1 OR `flag_brg_sesuai` IS NULL)',
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
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VBarangqcven($results->id_tmp)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangqcvendor'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangqcvendor',
                ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
                ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
                '`flag_qc` != 2 AND ( `flag_retur` != 0 OR `flag_retur` IS NULL) AND (`flag_dikemas` != 1 OR `flag_dikemas` IS NULL) AND (`flag_cacat` != 0 OR `flag_cacat` IS NULL) AND (`flag_fisik` != 1 OR `flag_fisik` IS NULL) AND (`flag_brg_sesuai` != 1 OR `flag_brg_sesuai` IS NULL)'
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
            'have_sn' => input('flag_greenpart') ? 0 : 1,
            'flag_qc' => input('flag_qc') ? 2 : 1,
            'flag_greenpart' => input('flag_greenpart') ? 1 : 0,
            'flag_retur' => input('flag_retur') ? 1 : 0,
            'flag_dikemas' => input('flag_dikemas') ? 1 : 0,
            'flag_cacat' => input('flag_cacat') ? 1 : 0,
            'flag_fisik' => input('flag_fisik') ? 1 : 0,
            'flag_brg_sesuai' => input('flag_brg_sesuai') ? 1 : 0,
            'ket' => input('ket'),
            'barang_updated_date' => date('Y-m-d H:i:s'),
            'barang_updated_by' => $this->session->userdata('user_login')['username']
        );

        // cetak_die($data);

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

    public function filterBarangqcven()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $status = input('qc');
        // cetak_die($startdate);
        if ($startdate && $enddate  && $status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_barangqcvendor WHERE id_tmp = '" . $status . "' AND tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE id_tmp = '" . $status . "'");
        } else {
            $list = $this->General->fetch_records('v_barangqcvendor');
        }
        // lastq();

        $data = array();
        $no = 0;

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
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VBarangqcven($results->id_tmp)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangqcvendor'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
