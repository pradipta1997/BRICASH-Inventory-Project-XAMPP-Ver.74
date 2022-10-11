<?php

class Penbarcab extends MY_Controller
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
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(total_harga) as GrandTotalHarga FROM v_pengiriman_barang")
        );

        $this->header('List Penerimaan Barang KP/KC');
        $this->load->view('Pbarangkpkc/list_pbarangkpkc',$data);
        $this->footer();
    }

    public function listPenerimaanBarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_pengiriman_barang',
            ['no', 'id_pengiriman', 'no_resi', 'pengiriman_created_by', 'nama_uker', 'tanggal_pengiriman', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ['id_pengiriman', 'no_resi', 'pengiriman_created_by', 'nama_uker', 'tanggal_pengiriman', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ['id_pengiriman' => 'asc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_resi;
            // $row[] = $results->pengiriman_created_by;
            // $pengirim = array(
            //     'totalHarga' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_unit_kerja` WHERE id_uker = $results->pengiriman_created_by")
            // );
            
            // $pengirimFinale = $pengirim['totalHarga'][0]->nama_uker;
            $row[] = "Logistik Pusat";
            $row[] = $results->nama_uker;
            $row[] = $results->tanggal_pengiriman;
            if($results->tanggal_penerimaan == "0000-00-00"){
                $row[] = $results->status_pengiriman == 0 ? labelWarna("danger", "Belum Diterima") : labelWarna("success", "Sudah Diterima");
            }else{
                $row[] = $results->tanggal_penerimaan;
            }
            $row[] = $results->nama_pengirim;
            // $row[] = $results->keterangan;
            $row[] = rupiah($results->total_harga);
            if(strpos($results->berat_barang, "Kg") !== false){
                $bbarang = $results->berat_barang;
            } else{
                $bbarang = $results->berat_barang."Kg";
            }
            $row[] = $bbarang;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->status_pengiriman == 0 ? labelWarna("danger", "Belum Diterima") : labelWarna("success", "Sudah Diterima");
            if($results->no_resi == ''){
                $row[] = labelWarna("danger", "Barang Belum Diberi Resi");
            }else{
                $row[] = "<a href='".base_url('Penbarcab/detailPbarangkpkc/'.$results->id_pengiriman)."' class='btn btn-warning btn-sm'><i class='fa fa-pencil-square-o'></i></a>
                    ";
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pengiriman_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pengiriman_barang',
            ['no', 'no_resi', 'pengiriman_created_by', 'nama_uker', 'tanggal_pengiriman', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ['no_resi', 'pengiriman_created_by', 'nama_uker', 'tanggal_pengiriman', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailPbarangkpkc($id_pengiriman)
    {
        $data = array(
            'detailPbarang' => $this->General->fetch_records("v_pengiriman_barang", ['id_pengiriman' => $id_pengiriman])
        );

        // cetak_die($data['detailPbarang']);

        $this->header('Detail Penerimaan Barang KP/KC');
        $this->load->view('Pbarangkpkc/detail_pbarangkpkc', $data);
        $this->footer();
    }

    public function updatePenerimaan($id_pengiriman){
        $penerimaanBarangHead = array(
            'tanggal_penerimaan' => input('tanggal_penerimaan'),
            'status_pengiriman' => 1
        );

        // cetak($pembartekHead);

        $updatePembartekHead = $this->General->update_record($penerimaanBarangHead, ['id_pengiriman' => $id_pengiriman], 'tbl_pengiriman_barang');
        // cetak($savePemlocHead);
        // lastq();

        if ($updatePembartekHead) {
            $result = array();
            $trans = array();
            $transOld = array();
            foreach ($_POST['id_pengiriman_det'] as $key => $val) {
                if($_POST['status_pemenuhan'][$key]==1){
                    $no_sn = $_POST['no_sn'][$key];
                    $result[] = array(
                        'status_pemenuhan' => 1
                    );
                    $updateDetail = $this->General->update_record($result[0], ['no_sn' => $no_sn], 'tbl_pengiriman_barang_det');
                    if($updateDetail){
                        $getTransaksi = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_transaksi WHERE no_sn = '".$no_sn."' ORDER BY tran_created_date DESC LIMIT 1");
                        var_dump($getTransaksi[0]);
                        if($getTransaksi[0]->id_tranOld!=null){
                            continue;
                        }else{
                            $trans = array(
                                'id_tranOld'                => $getTransaksi[0]->id_tran,
                                'id_jtran'                  => 2,
                                'id_uker'                   => $getTransaksi[0]->id_uker,
                                'dari_uker'                 => $getTransaksi[0]->dari_uker,
                                'no_urut'                   => $getTransaksi[0]->no_urut,
                                'tgl_terima_barang'         => input('tanggal_penerimaan'),
                                'nama_ekpedisi'             => $getTransaksi[0]->nama_ekpedisi,
                                'tgl_kirim_barang'          => $getTransaksi[0]->tgl_kirim_barang,
                                'no_sn'                     => $getTransaksi[0]->no_sn,
                                'qty'                       => 1,
                                'kon_barang'                => $getTransaksi[0]->kon_barang,
                                'harga_barang'              => $getTransaksi[0]->harga_barang,
                                'is_active'                 => $getTransaksi[0]->is_active,
                                'is_have'                   => 1,
                                'is_out'                    => 0
                            );
                            $transOld = array(
                                'is_active'                 => 0
                            );
                            $transArray[] = $trans;
                            $transOldArray[] = $transOld;
                            $this->General->update_record($transOld, ['id_tran' => $getTransaksi[0]->id_tran], 'tbl_transaksi');
                            // var_dump($trans);
                            // }
                            // var_dump($transOld[0]);
                        }
                    }else{
                        var_dump($updateDetail);
                    }
                }else{
                    continue;
                }
            }
            $this->General->insertBatch('tbl_transaksi', $transArray);
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Penbarcab');
        } else {
            // $this->session->set_flashdata('error', 'Record added Failed..!');
            // redirect('Penbarcab');
        }
    }
}
