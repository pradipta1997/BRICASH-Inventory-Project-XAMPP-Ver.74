<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stokgudang extends MY_Controller
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
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT SUM(harga_barang) as total FROM v_stockgdg;"),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        // var_dump($data);
        $this->header('List Stock Gudang');
        $this->load->view('Stokgudang/list_stock', $data);
        $this->footer();
    }

    public function listStokgudang()
    {
        $list = $this->General->fetch_CoustomQuery("SELECT no_urut, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE flag_pakai = '0' GROUP BY nama_barang HAVING COUNT(nama_barang) >0;");

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = "9999 | Pengadaan";
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->qty;
            $row[] = rupiah($results->total_harga);
            $row[] = '<a href="' . base_url('Stokgudang/detailBarang/' . $results->no_urut) . '" class="btn btn-primary btn-sm" title="Detail Barang">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockgdg'),
            "recordsFiltered" => $this->General->fetch_CoustomQuery("SELECT nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE flag_pakai = '0' GROUP BY nama_barang HAVING COUNT(nama_barang) >0;"),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filter()
    {

        $nama_barang = input('nama_barang');
        if ($nama_barang != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT no_urut, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE no_urut = '" . $nama_barang . "'");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT no_urut, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE flag_pakai = '0' GROUP BY nama_barang HAVING COUNT(nama_barang) >0;");
        }
        // $list = $this->General->fetch_CoustomQuery("SELECT no_urut, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE flag_pakai = '0' GROUP BY nama_barang HAVING COUNT(nama_barang) >0;");
        // lastq();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = "9999 | Pengadaan";
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->qty;
            $row[] = rupiah($results->total_harga);
            $row[] = '<a href="' . base_url('Stokgudang/detailBarang/' . $results->no_urut) . '" class="btn btn-primary btn-sm" title="Detail Barang">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockgdg'),
            "recordsFiltered" => $this->General->fetch_CoustomQuery("SELECT nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, count(nama_barang) AS qty, SUM(harga_barang) AS total_harga FROM v_stockgdg WHERE flag_pakai = '0' GROUP BY nama_barang HAVING COUNT(nama_barang) >0;"),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailBarang($no_urut)
    {
        $data = array(
            'no_urut' => $no_urut,
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as Total FROM v_stockgdg WHERE no_urut = $no_urut")
        );


        $this->header('List Detail Stock Barang');
        $this->load->view('Stokgudang/detail_stock', $data);
        $this->footer();
    }

    public function listStokdetail()
    {
        $list = $this->General->fetch_CoustomQuery("SELECT no_po, nama_gudang, nama_rak, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, no_sn, harga_barang FROM v_stockgdg WHERE no_urut = '" . input('no_urut') . "' AND flag_pakai = '0';");

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            // $a = $this->General->getRow('tbl_stock', ['id_tipe_barang' => $results->id_tipe_barang, 'id_uker' => $results->id_uker]);


            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_po == null ? labelWarna("info", "Bukan barang PO") : $results->no_po;
            $row[] = $results->nama_gudang;
            $row[] = $results->nama_rak;
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
            "recordsTotal" => $this->Serverside->_countAll('v_stockgdg'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    // public function Cabang()
    // {

    //     $this->header('List Stock Cabang');
    //     $this->load->view('Stokgudang/list_stockcab');
    //     $this->footer();
    // }
}
