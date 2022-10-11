<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaanbarcab extends MY_Controller
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

        $this->header('List Penerimaan Barang Cabang');
        $this->load->view('Penerimaanbarcab/list_Penerimaanbarcab');
        $this->footer();
    }

    public function listPenerimaanbarcab()
    {
        $list = $this->Serverside->_serverSide(
            'v_penerimaanbarangkp',
            ['no', 'no_permintaan', 'tanggal_penerimaan', 'tanggal_pengiriman', 'pengiriman_created_by', 'status_pengiriman', 'id_ekpedisi'],
            ['no_permintaan', 'tanggal_penerimaan', 'tanggal_pengiriman', 'pengiriman_created_by', 'status_pengiriman', 'id_ekpedisi'],
            ['no_permintaan' => 'asc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $results) {

            $pengirim = array(
                'target' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_unit_kerja` WHERE id_uker = $results->pengiriman_created_by"),
                'nama_ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_ekpedisi` WHERE id_ekpedisi = $results->id_ekpedisi")
            );
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            if ($results->tanggal_penerimaan == null) {
                $row[] = labelWarna("danger", "Belum diterima");
            } else {
                $row[] = $results->tanggal_penerimaan;
            }
            $row[] = $results->tanggal_pengiriman;
            $row[] = $pengirim['target'][0]->nama_uker;
            $row[] = $results->status_pengiriman == 1 ? labelWarna("success", "Sudah diterima") : labelWarna("danger", "Belum diterima");
            $row[] = $pengirim['nama_ekpedisi'][0]->nama_ekpedisi;
            $row[] = "<a href='" . base_url('Penerimaanbarcab/detailPenerimaanbarcab/' . $results->id_pengirimankekp) . "' class='btn btn-primary btn-sm'>
                        <i class='fa fa-eye'></i>
                      </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_penerimaanbarangkp'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_penerimaanbarangkp',
                ['no', 'no_permintaan', 'tanggal_penerimaan', 'tanggal_pengiriman', 'pengiriman_created_by', 'status_pengiriman', 'id_ekpedisi'],
                ['no_permintaan', 'tanggal_penerimaan', 'tanggal_pengiriman', 'pengiriman_created_by', 'status_pengiriman', 'id_ekpedisi'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailPenerimaanbarcab($id)
    {
        $data = array(
            'penerimaan'   => $this->General->getRow('v_penerimaanbarangkp',  ['id_pengirimankekp' => $id]),
            'nama_uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'nama_ekpedisi' => $this->General->fetch_records('tbl_ekpedisi')
        );

        $this->header('List Penerimaan Barang Cabang');
        $this->load->view('Penerimaanbarcab/detail_penerimaanbarcab', $data);
        $this->footer();
    }

    public function updatePenerimaan($id_pengiriman)
    {
        $pengirimanHead = array(
            'tanggal_penerimaan' => input('tgl_penerimaan'),
            'status_pengiriman' => 1
        );

        $result = array();
        $transaksi = array();

        foreach ($_POST['no_urut'] as $key => $val) {
            $tes = isset($_POST['status_perbaikan'][$key]);
            $no_sn = $_POST['no_sn'][$key];
            if ($tes == NULL) {
                continue;
            } else {
                $result = array(
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'flag_barang' => $_POST['kondisi_barang'][$key],
                    'flag_balikan' => 1,
                    'tanggal_balik' => input('tgl_penerimaan'),
                    'flag_qc' => 2,
                    'flag_pakai' => 0,
                    'flag_pembukuan' => 1,
                    'flag_greenpart' => 0
                );
                $target = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_transaksi WHERE no_sn = '$no_sn'");
                $check_stock = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_stock WHERE no_sn = '$no_sn'");
                if ($check_stock == null) {
                    // $bre = "Null";
                    $save = $this->General->insertRecord('tbl_stock', $result);
                } else {
                    // $bre = "not null";
                    $save = $this->General->update_record($result, ['no_sn' => $no_sn], 'tbl_stock');
                }
                $transaksi[] = array(
                    'id_tranOld' => $target[0]->id_tran,
                    'id_jtran' => 2,
                    'id_uker' => $target[0]->id_uker,
                    'dari_uker' => $target[0]->dari_uker,
                    'no_urut' => $target[0]->no_urut,
                    'tgl_terima_barang' => input('tgl_penerimaan'),
                    'nama_ekpedisi' => $target[0]->nama_ekpedisi,
                    'tgl_kirim_barang' => $target[0]->tgl_kirim_barang,
                    'no_sn' => $target[0]->no_sn,
                    'kon_barang' => $target[0]->kon_barang,
                    'qty' => 1,
                    'harga_barang' => $target[0]->harga_barang,
                    'is_have' => 1
                );
                $this->General->insertBatch('tbl_transaksi', $transaksi);
            }
        }

        // var_dump($bre);
        // var_dump($target[0]->id_tran);
        $savePertek = $this->General->update_record($pengirimanHead, ['id_pengirimankekp' => $id_pengiriman], 'tbl_pengirimankekp');
        if ($savePertek) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Penerimaanbarcab');
        } else {
            $this->session->set_flashdata('danger', 'Record added Failed..!');
        }
    }
}
