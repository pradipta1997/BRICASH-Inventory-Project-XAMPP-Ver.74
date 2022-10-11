<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balikanqcven extends MY_Controller
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
            // 'vendor' => $this->General->fetch_records('tbl_vendor'),
            // 'tipebarang' => $this->General->fetch_records('tbl_tipe_barang'),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );
        $this->header('List Barang Balikan QC Vendor');
        $this->load->view('Balikanqcven/list_balikanqcven', $data);
        $this->footer();
    }

    public function list_balikanqcven()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangqcvendor',
            ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
            ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
            ['no_po' => 'desc'],
            ['flag_retur' => '1'],
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
            $row[] = $results->flag_status_vendor  == 0 ? labelWarna("danger", "Belum diterima") : labelWarna("success", "Diterima");
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VBalikanqcven($results->id_tmp)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangqcvendor'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangqcvendor',
                ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
                ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
                ['flag_retur' => '1'],
                // '`flag_qc` != 2 AND ( `flag_retur` != 0 OR `flag_retur` IS NULL) AND (`flag_dikemas` != 1 OR `flag_dikemas` IS NULL) AND (`flag_cacat` != 0 OR `flag_cacat` IS NULL) AND (`flag_fisik` != 1 OR `flag_fisik` IS NULL) AND (`flag_brg_sesuai` != 1 OR `flag_brg_sesuai` IS NULL)'
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filter()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $no_urut = input('no_urut');
        $status_terima = input('status_terima');

        if ($startdate && $enddate && $no_urut != 'All' && $status_terima != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND no_urut = '" . $no_urut . "' AND flag_status_vendor = '" . $status_terima . "' AND flag_retur = '1' ");
        } else if ($startdate && $enddate && $status_terima == 'All' && $no_urut == 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND flag_retur = '1'");
        } else if ($startdate && $enddate && $status_terima != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND flag_status_vendor = '" . $status_terima . "' AND flag_retur = '1'");
        } else if ($startdate && $enddate && $no_urut != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND no_urut = '" .  $no_urut . "' AND flag_retur = '1'");
        } else if ($no_urut != 'All' && $status_terima != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE no_urut = '" . $no_urut . "' AND flag_status_vendor = '" . $status_terima . "'  AND flag_retur = '1' ");
        } else if ($status_terima != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE flag_status_vendor = '" . $status_terima . "'  AND flag_retur = '1' ");
        } else if ($no_urut != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE no_urut = '" . $no_urut . "'  AND flag_retur = '1' ");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE flag_retur = '1' ");
        }
        // lastq();
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
            $row[] = $results->flag_status_vendor  == 0 ? labelWarna("danger", "Belum diterima") : labelWarna("success", "Diterima");
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VBalikanqcven($results->id_tmp)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangqcvendor'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangqcvendor',
                ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
                ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart', 'flag_status_vendor'],
                ['flag_retur' => '1'],
                // '`flag_qc` != 2 AND ( `flag_retur` != 0 OR `flag_retur` IS NULL) AND (`flag_dikemas` != 1 OR `flag_dikemas` IS NULL) AND (`flag_cacat` != 0 OR `flag_cacat` IS NULL) AND (`flag_fisik` != 1 OR `flag_fisik` IS NULL) AND (`flag_brg_sesuai` != 1 OR `flag_brg_sesuai` IS NULL)'
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function VBalikanqcven($id_tmp)
    {
        $data = $this->General->fetch_records('v_barangqcvendor', ['id_tmp' => $id_tmp]);
        echo json_encode($data);
    }

    public function updateBalikanqcven()
    {
        $data = array(
            'flag_status_vendor' => input('status_vendor'),
            'barang_updated_date' => date('Y-m-d'),
            'barang_updated_by' => $this->session->userdata('user_login')['username']
        );
        // cetak_die($data);
        $response = $this->General->update_record($data, ['id_tmp' => input('id_tmp')], 'tbl_barang_temp');
        // lastq();

        $statusven = $_REQUEST['status_vendor'];
        if ($response) {
            LogActivity($this->db->last_query());
            if ($statusven == 1) {

                $pesan = array(
                    'pesan' => 'Barang Diterima Vendor!',
                    'tipe' => 'success'
                );

                echo json_encode($pesan);
            } else if ($statusven == 0) {
                $pesan = array(
                    'pesan' => 'Barang Belum Diterima Vendor!',
                    'tipe' => 'error'
                );

                echo json_encode($pesan);
            }
        } else {
            $pesan = array(
                'pesan' => 'Barang Tidak Diterima Vendor!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }
}
