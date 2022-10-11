<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokcabang extends MY_Controller
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
            'barang' => $this->General->fetch_records('tbl_barang')
        );


        $this->header('List Stock Cabang');
        $this->load->view('Stockcabang/list_stockcab', $data);
        $this->footer();
    }

    public function filterCabang()
    {
        $no_urut = input('no_urut');
        if ($no_urut != "All") {
            $list = $this->General->fetch_CoustomQuery("SELECT kode_uker, nama_uker, tipe_barang, kode_barang, nama_barang, min_stock, max_stock, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM `v_stockcbg` WHERE dari_uker = '1' AND id_jtran = '2' AND is_have = '1' AND no_urut = '$no_urut' GROUP BY id_uker HAVING COUNT(nama_barang) >0;");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT kode_uker, nama_uker, tipe_barang, kode_barang, nama_barang, min_stock, max_stock, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM `v_stockcbg` WHERE dari_uker = '1' AND id_jtran = '2' AND is_have = '1' GROUP BY id_uker HAVING COUNT(nama_barang) >0;");
        }
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker;
            $row[] = $results->nama_uker;
            $row[] = $results->tipe_barang;
            $row[] = $results->kode_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->min_stock;
            $row[] = $results->max_stock;
            $row[] = $results->qty;
            $row[] = $results->total_harga;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockcbg'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function listStokCabang()
    {
        $idi_uker = $this->session->userdata('user_login')['id_uker'];
        $list = $this->General->fetch_CoustomQuery("SELECT no_urut, kode_uker, nama_uker, tipe_barang, kode_barang, nama_barang, min_stock, max_stock, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND id_uker = $idi_uker AND status_pakai = '0' GROUP BY no_urut HAVING COUNT(*) >0;");
        // cetak_die($list);

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker;
            $row[] = $results->nama_uker;
            $row[] = $results->tipe_barang;
            $row[] = $results->kode_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->min_stock;
            $row[] = $results->max_stock;
            $row[] = $results->qty;
            $row[] = rupiah($results->total_harga);
            $row[] = '<a href="' . base_url('Stokcabang/detailBarang/'.$results->no_urut) . '" class="btn btn-primary btn-sm" title="Detail Barang">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockcbg'),
            "recordsFiltered" => $this->General->fetch_CoustomQuery("SELECT kode_uker, nama_uker, tipe_barang, kode_barang, nama_barang, min_stock, max_stock, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND id_uker = $idi_uker GROUP BY no_urut HAVING COUNT(*) >0;"),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailBarang($no_urut)
    {
        $idi_uker = $this->session->userdata('user_login')['id_uker'];
        $data = array(
            'no_urut' => $no_urut,
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as Total FROM v_stockcbg WHERE no_urut = $no_urut AND id_uker = $idi_uker AND is_out = '0' AND status_pakai = '0'")
        );


        $this->header('List Detail Stock Barang');
        $this->load->view('Stockcabang/detail_stock', $data);
        $this->footer();
    }

    public function listStokdetail()
    {
        $idi_uker = $this->session->userdata('user_login')['id_uker'];
        $list = $this->General->fetch_CoustomQuery("SELECT nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, no_sn, harga_barang FROM v_stockcbg WHERE no_urut = '" . input('no_urut') . "' AND is_out = '0' AND id_uker = $idi_uker AND status_pakai = '0';");

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->no_sn;
            $row[] = rupiah($results->harga_barang);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockcbg'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
