<?php

class MonInformasipempart extends MY_Controller
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
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as GrandTotalHarga FROM v_monitoring_sparepart")
        );

        $this->header('List Monitoring Pemakaian Sparepart');
        $this->load->view('MonInformasipempart/list_moninformasipempart', $data);
        $this->footer();
    }

    public function listPenerimaanbartek()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangbalikteknisi',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'harga_satuan'], //Filter
            ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'harga_satuan'], //Search
            ['id_pertek_det' => 'asc'], //Sort
            // ['flag_barang' => '1'] ,
            ['status_pertek' => '1'],
            'data'
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->no_sn_new;
            $row[] = rupiah($results->harga_satuan);

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangbalikteknisi'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangbalikteknisi',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'harga_satuan'], //Filter
                ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'harga_satuan'], //Search
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }
}
