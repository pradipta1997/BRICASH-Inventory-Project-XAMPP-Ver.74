<?php

class Barbal extends MY_Controller
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
        // $data = array(
        //     'pemenuhan' => $this->General->fetch_records('v_pemenuhan'),
        // );

        $this->header('List Barang Balikan');
        $this->load->view('Barbal/list_barbal');
        $this->footer();
    }

    public function listBarbal()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangbalikteknisi',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Filter
            ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Search
            ['id_pertek_det' => 'asc'], //Sort
            // ['flag_barang' => '1'] ,
            ['flag_pertukaran' => '1'],
            'data'
        );

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $results) {
    
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tipe_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->no_sn_new;
            if($results->no_sn_lama == null){
                $row[] = labelWarna("danger", "Belum diterima");  
                $row[] = $results->username;
                $row[] = $results->tid;
                $row[] = labelWarna("danger", "Belum diterima"); 
                $row[] = $results->keterangan;
                $row[] =    "<button type='button' class='btn btn-info btn-sm'". getEditperm() . " onclick='showModalPenerimaan($results->id_pertek_det)' >
                                        Terima
                                </button>";   
            }else{
                // $namaekpedisi = array(
                //     'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_stock` WHERE id_stock = $results->no_sn_lama")
                // );
                // $finaleEkpedisi = $namaekpedisi['ekpedisi'][0]->no_sn;
        
                $row[] = $results->no_sn_lama;
                $row[] = $results->username;
                $row[] = $results->tid;
                $row[] = $results->kondisi_barang = 1 ? labelWarna("success", "Bagus") : labelWarna("danger", "Rusak");
                $row[] = $results->keterangan;
            }
            
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_barangbalikteknisi'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_barangbalikteknisi',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Filter
                ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Search
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }
}
