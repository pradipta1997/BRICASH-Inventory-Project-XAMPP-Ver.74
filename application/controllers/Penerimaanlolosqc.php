<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaanlolosqc extends MY_Controller
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
            'nmbarang' => $this->General->fetch_records('tbl_barang'),
        );

        // cetak_die($data);
        $this->header('List Barang Lolos QC dari Vendor');
        $this->load->view('Penerimaanlolosqc/list_penerimaanlolosqc', $data);
        $this->footer();
    }

    public function listPenerimaanlolosqc()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangqcvendor',
            ['no', 'no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po', 'no_do', 'tgl_qc', 'kode_barang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'nama_vendor', 'flag_qc', 'flag_greenpart'],
            ['no_po' => 'desc'],
            '`flag_qc` = 2 AND `flag_retur` = 0 AND `flag_dikemas` = 1 AND `flag_cacat` = 0 AND `flag_fisik` = 1 AND `flag_brg_sesuai` = 1 AND `flag_pindah` = 0',
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
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VPenerimaanlolosqc($results->id_tmp)'>
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
                '`flag_qc` = 2 AND `flag_retur` = 0 AND `flag_dikemas` = 1 AND `flag_cacat` = 0 AND `flag_fisik` = 1 AND `flag_brg_sesuai` = 1 AND `flag_pindah` = 0'
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

        if ($startdate && $enddate && $no_urut != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND no_urut = '" . $no_urut . "' AND flag_qc = '2' AND flag_pindah = '0' ");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE tgl_qc BETWEEN '" . $startdate . "' AND '" . $enddate . "'  AND flag_qc = '2' AND flag_pindah = '0'");
        } else if ($no_urut != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE no_urut = '" . $no_urut . "' AND flag_qc = '2' AND flag_pindah = '0' ");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_barangqcvendor WHERE flag_qc = '2' AND flag_pindah = '0' ");
        }

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
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VPenerimaanlolosqc($results->id_tmp)'>
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

    public function VPenerimaanlolosqc($id_tmp)
    {
        $data = $this->General->fetch_records('v_barangqcvendor', ['id_tmp' => $id_tmp]);
        echo json_encode($data);
        // cetak_die($data);
    }

    public function updatePenerimaanlolosqc()
    {

        $data = array(
            // 'id_rak' => input('id_rak'),
            'flag_pindah' => 1,
            'barang_updated_date' => date('Y-m-d H:i:s'),
            'barang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_tmp' => input('id_tmp')], 'tbl_barang_temp');
        // lastq();
        if ($response) {
            LogActivity($this->db->last_query());

            $value = array(
                'no_sn' => input('no_sn'),
                'no_urut' => input('no_urut'),
                'id_jtran' => 2,
                'id_vendor' => input('id_vendor'),
                'qty' => input('qty'),
                'kon_barang' => input('flag_fisik') ? 1 : 0,
                'tran_created_by' => date('Y-m-d H:i:s'),
                'tran_created_by' => $this->session->userdata('user_login')['username'],
                'tran_updated_date' =>  date('Y-m-d H:i:s'),
                'tran_updated_by' => $this->session->userdata('user_login')['username'],
                // 'tgl_qc' => input('tgl_qc'),
                // 'have_sn' => input('flag_greenpart') ? 0 : 1,
                // 'flag_qc' => input('flag_qc') ? 2 : 1,
                // 'flag_greenpart' => input('flag_greenpart') ? 1 : 0,
                // 'flag_retur' => input('flag_retur') ? 1 : 0,
                // 'flag_dikemas' => input('flag_dikemas') ? 1 : 0,
                // 'flag_cacat' => input('flag_cacat') ? 1 : 0,
                // 'flag_brg_sesuai' => input('flag_brg_sesuai') ? 1 : 0,
                // 'ket' => input('ket'),
            );

            // cetak_die($value);
            $this->General->insertRecord('tbl_transaksi', $value);
            // lastq();
            if ($response) {
                LogActivity($this->db->last_query());

                $brgTmp = $this->General->getRow('v_barangqcvendor', ['id_tmp' => input('id_tmp')]);
                $currency = $this->General->getRow("v_currency", ["id_det_currency" => $brgTmp->id_det_currency]);

                if ($currency->id_currency != 1) {
                    $hargaBarang = $brgTmp->harga_barang * $currency->rupiah;
                } else {
                    $hargaBarang = $brgTmp->harga_barang;
                }
            }
            $stock = array(
                // 'id_rak' => input('id_rak'),
                // 'id_jtran' => 2,
                'id_rak' => 10,
                'id_po' => $brgTmp->id_po,
                'id_det_currency' => $brgTmp->id_det_currency,
                'no_urut' => $brgTmp->no_urut,
                'no_sn' => $brgTmp->no_sn,
                'harga_barang' => $hargaBarang,
                'flag_qc' => input('flag_qc') ?  1 : 0,
                'flag_pakai' => 0,
                'flag_barang' => 1,
                'flag_pembukuan' => 0,
                'flag_greenpart' => input('flag_greenpart') ?  1 : 0,
                'flag_balikan' => 0,
                'stock_created_by' => $this->session->userdata('user_login')['username']
            );
            // cetak_die($stock);
            $pindahStock = $this->General->insertRecord('tbl_stock', $stock);
            // lastq();
            if ($pindahStock) {
                LogActivity($this->db->last_query());

                $pesan = array(
                    'pesan' => 'Barang berhasil dipindahkan!',
                    'tipe' => 'success'
                );

                echo json_encode($pesan);
            } else {
                $pesan = array(
                    'pesan' => 'Barang gagal dipindahkan!',
                    'tipe' => 'error'
                );

                echo json_encode($pesan);
            }
        } else {
            $pesan = array(
                'pesan' => 'Barang gagal dipindahkan!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }
    //masih error
    public function cariNosn()
    {
        $id_tmp = input('no_sn');
        $nm_brg = $this->General->fetch_records('v_barangqcvendor', $id_tmp);

        // cetak_die($nm_brg);

        if ($nm_brg) {
            $brg = array(
                'nama_gbarang' => $nm_brg[0]->nama_gbarang,
                'nama_sgbarang' => $nm_brg[0]->nama_sgbarang,
                'nama_merek' => $nm_brg[0]->nama_merek,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }
}
