<?php

class Penerimaanbartek extends MY_Controller
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
            'Viper' => $this->General->fetch_records('tbl_stock'),
            'pemenuhan' => $this->General->fetch_records('v_pemenuhan'),
        );

        $this->header('List Penerimaan Barang yang belum dikembalikan Teknisi');
        $this->load->view('Penerimaanbartek/list_penerimaanbartek',$data);
        $this->footer();
    }

    public function listPenerimaanbartek()
    {
        $list = $this->Serverside->_serverSide(
            'v_barangbalikteknisi',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Filter
            ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn_new', 'no_sn_lama', 'username', 'tid', 'kondisi_barang', 'keterangan'], //Search
            ['id_pertek_det' => 'asc'], 
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
                //     'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_stock` WHERE no_sn = $results->no_sn_lama")
                // );
                // $finaleEkpedisi = $namaekpedisi['ekpedisi'][0];
                // cetak_die($namaekpedisi);
        
                $row[] = $results->no_sn_lama;
                $row[] = $results->username;
                $row[] = $results->tid;
                $row[] = $results->kondisi_barang = 1 ? labelWarna("success", "Bagus") : labelWarna("danger", "Rusak");
                $row[] = $results->keterangan;
                $row[] =    "<button type='button' class='btn btn-success btn-sm'". getEditperm() . " onclick='showModalPenerimaan($results->id_pertek_det)' >
                                    Sudah diterima
                            </button>";
            }
            // if($results->status_balik == 0){
            //     $row[] =    "<button type='button' class='btn btn-info btn-sm'". getEditperm() . " onclick='showModalPenerimaan($results->id_pemenuhan)' >
            //                         Terima
            //                 </button>";
            // }else{
            //     $row[] =    "<button type='button' class='btn btn-success btn-sm'>
            //                         Barang sudah diterima
            //                 </button>";
            // }
            
            

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

    public function showModalPenerimaan($id_pemenuhan)
    {
        $data = $this->General->fetch_records('v_barangbalikteknisi', ['id_pertek_det' => $id_pemenuhan]);
        echo json_encode($data);
    }

    public function caribarang()
    {
        $id_stock = input('no_sn');
        $where = ['id_stock' => $id_stock];


        $nm_brg = $this->General->fetch_records('v_caristock', $where);

        if ($nm_brg) {
            $brg = array(

                'nama_gbarang' => $nm_brg[0]->nama_gbarang,
                'nama_sgbarang' => $nm_brg[0]->nama_sgbarang,
                // 'tipe_barang' => $nm_brg[0]->tipe_barang,
                // 'kode_barang' => $nm_brg[0]->kode_barang,
                // 'nama_barang' => $nm_brg[0]->nama_barang,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }

    public function updatePenerimaan()
    {
        $id_stock = input('no_sn');
        $where = ['id_stock' => $id_stock];
        $bray = $this->General->fetch_records('v_caristock', $where);
        $data = array(
            'tanggal_balik' => input('tgl_terima_barang'),
            'no_sn_lama'    => $bray[0]->no_sn,
            'flag_pertukaran' => 1
        );
        $getTransaksi = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_transaksi WHERE no_sn = '" . $bray[0]->no_sn . "' ORDER BY tran_created_date DESC LIMIT 1");
        $trans[] = array(
            'is_balikan' => 1,
            'status_pakai' => 0
        );
        // cetak_die($getTransaksi);
        $this->General->update_record($trans[0], ['id_tran' => $getTransaksi[0]->id_tran], 'tbl_transaksi');

        $response = $this->General->update_record($data, ['id_pertek_det' => input('id_pertek_det')], 'tbl_pertek_det');
        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Update sukses!',
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
       
        // $data1 = array(
        //     'flag_barang'   => input('flag_barang'),
        //     'flag_qc' => 0,
        //     'flag_balikan' => 1,
            
        //     'keterangan' => input('keterangan')
        // );

        // $responseStock = $this->General->update_record($data1, ['id_stock' => input('no_sn')], 'tbl_stock');

        // if ($responseStock) {
        //     LogActivity($this->db->last_query());
            

            
        // } else {

        //     $pesan = array(
        //         'pesan' => 'Stock gagal diupdate!',
        //         'tipe' => 'error'
        //     );

        //     echo json_encode($pesan);
        // }
    }
}
