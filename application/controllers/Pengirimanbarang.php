<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengirimanbarang extends MY_Controller
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

        
        // cetak_die($tos);

        $this->header('List Pengiriman Barang');
        $this->load->view('Pengirimanbarang/list_pengirimanbarang', $data);
        $this->footer();
    }

    public function listPengirimanBarang()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_pengirimankekp',
            ['no', 'no_resi', 'pengiriman_created_by', 'id_uker', 'tanggal_pengiriman', 'estimasi', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ['no_resi', 'pengiriman_created_by', 'id_uker', 'tanggal_pengiriman', 'estimasi', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ['id_pengirimankekp' => 'asc'],
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
            $pengirim = array(
                'totalHarga' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_unit_kerja` WHERE id_uker = $results->pengiriman_created_by"),
                'target' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_unit_kerja` WHERE id_uker = $results->id_uker"),
                'delivery' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_delivery_type` WHERE id_delivery_type = $results->id_delivery_type"),
                'total_harga' => $this->General->fetch_CoustomQuery("SELECT SUM(harga_barang) as hargaTotal FROM `tbl_pengirimankekp_det` WHERE id_pengirimankekp = $results->id_pengirimankekp"),
                
            );
    
            $pengirimFinale = $pengirim['totalHarga'][0]->nama_uker;
            $row[] = $pengirimFinale;
            $row[] = $pengirim['target'][0]->nama_uker;
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->estimasi." Hari";
            $row[] = $results->nama_pengirim;
            $row[] = rupiah($pengirim['total_harga'][0]->hargaTotal);
            $row[] = $results->berat_barang." KG";
            $row[] = $pengirim['delivery'][0]->nama_delivery_type;
            $row[] = $results->status_pengiriman == 0 ? labelWarna("danger", "Belum Diterima") : labelWarna("success", "Sudah Diterima");
            $row[] = "<a href='" . base_url("Pengirimanbarang/editPengirimanbarang/".$results->id_pengirimankekp) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                      </a>
                      
                      <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePengiriman($results->id_pengirimankekp)'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_pengirimankekp'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_pengirimankekp',
                ['no', 'no_resi', 'pengiriman_created_by', 'id_uker', 'tanggal_pengiriman', 'estimasi', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
                ['no_resi', 'pengiriman_created_by', 'id_uker', 'tanggal_pengiriman', 'estimasi', 'nama_pengirim', 'total_harga', 'berat_barang', 'nama_delivery_type', 'status_pengiriman'],
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function tambahPengirimanbarang()
    {
        $data = array(
            'autoNoPertek' => $this->General->autoNoPengirimankeKP(),
            'namaBarang' => $this->General->fetch_records('tbl_barang'),
            'deliveryType' => $this->General->fetch_records('tbl_delivery_type'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
        );

        $this->header('List Pengiriman Barang');
        $this->load->view('Pengirimanbarang/tambah_pengirimanbarang', $data);
        $this->footer();
    }

    public function editPengirimanbarang($id)
    {
        $data = array(
            'pengiriman'   => $this->General->getRow('v_pengirimankekp',  ['id_pengirimankekp' => $id]),
            'namaBarang' => $this->General->fetch_records('tbl_barang'),
            'deliveryType' => $this->General->fetch_records('tbl_delivery_type'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'pengbarang' => $this->General->getRow('tbl_pengbarang',  ['id_pengiriman' => $id])
        );
        
        $this->header('List Pengiriman Barang');
        $this->load->view('Pengirimanbarang/edit_pengirimanbarangvalue', $data);
        $this->footer();
        // $check_value = $this->General->fetch_records("tbl_pengbarang", ['id_pengiriman' => $id]);
        // if($check_value!=null){
        //     $data = array(
        //         'pengiriman'   => $this->General->getRow('v_pengirimankpkc',  ['id_pengiriman' => $id]),
        //         'jumlahPermintaan' => $this->General->fetch_CoustomQuery("SELECT COUNT(*) AS jumlah_permintaan FROM `tbl_pengbarang` WHERE id_pengiriman = $id"),
        //         'jumlahPemenuhan' => $this->General->fetch_CoustomQuery("SELECT COUNT(*) AS jumlah_pemenuhan FROM `tbl_pengbarang` WHERE id_pengiriman = $id AND status_pemenuhan = 1"),
        //         'namaBarang' => $this->General->fetch_records('tbl_barang'),
        //         'deliveryType' => $this->General->fetch_records('tbl_delivery_type'),
        //         'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
        //         'uker' => $this->General->fetch_records('tbl_unit_kerja'),
        //         'pengbarang' => $this->General->getRow('tbl_pengbarang',  ['id_pengiriman' => $id])
        //     );

        //     // cetak_die($check_value);
        //     $this->header('List Pengiriman Barang');
        //     $this->load->view('Pengirimanbarang/edit_pengirimanbarangvalue', $data);
        //     $this->footer();
        // }else{
        //     $data = array(
        //         'pengiriman'   => $this->General->getRow('v_pengirimankpkc',  ['id_pengiriman' => $id]),
        //         'jumlahPermintaan' => $this->General->fetch_CoustomQuery("SELECT COUNT(*) AS jumlah_permintaan FROM `v_pengirimankpkc` WHERE id_pengiriman = $id"),
        //         'jumlahPemenuhan' => $this->General->fetch_CoustomQuery("SELECT COUNT(*) AS jumlah_pemenuhan FROM `v_pengirimankpkc` WHERE id_pengiriman = $id AND status_pemenuhan > 0"),
        //         'namaBarang' => $this->General->fetch_records('tbl_barang'),
        //         'deliveryType' => $this->General->fetch_records('tbl_delivery_type'),
        //         'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
        //         'uker' => $this->General->fetch_records('tbl_unit_kerja')
        //     );

        //     // var_dump($check_value);
        //     $this->header('List Pengiriman Barang');
        //     $this->load->view('Pengirimanbarang/edit_pengirimanbarang', $data);
        //     $this->footer();
        // }
        // var_dump($check_value);
        // $this->header('List Pengiriman Barang');
        // $this->load->view('Pengirimanbarang/edit_pengirimanbarang', $data);
        // $this->footer();
    }

    public function addPengiriman($id_pengiriman){

        $offset = input('id_pengiriman');
        $noPermintaan = input('noPermintaan');
        $tanggal_pengiriman = input('tanggal_pengiriman');
        $id_delivery_type = input('d_type');
        $id_ekpedisi = input('id_ekpedisi');
        $id_uker = input('id_uker');
        $j_koli = input('j_koli');
        $id_pengBarang  = $this->db->insert_id();

        

        foreach ($_POST['no_urut'] as $key => $val) {
            $result[] = array(
                'id_pengBarang' => $id_pengBarang,
                'id_pengiriman' => $offset,
                'no_permintaan' => $noPermintaan,
                'tanggal_pengiriman' => $tanggal_pengiriman,
                'no_urut' => $val,
                // 'id_det_currency' => $val,
                // 'id_det_currency' => 1,
                'no_sn' => $_POST['no_sn'][$key],
                'harga_barang' => $_POST['harga_barang'][$key],
                'kondisi_barang' => $_POST['kondisi_barang'][$key],
                'keterangan' => $_POST['keterangan'][$key],
                'status_pemenuhan' => isset($_POST['status_pemenuhan'][$key]) ? 1 : 0,
                'id_delivery_type' => $id_delivery_type,
                'id_ekspedisi' => $id_ekpedisi,
                'id_uker' => $id_uker,
                'jumlah_koli' => $j_koli
            );
        }

        $savePengiriman = $this->General->insertBatch('tbl_pengbarang', $result);
        if ($savePengiriman) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Pengirimanbarang');
        } else {
            cetak_die($result);
        }
    }

    public function newPengiriman(){

        $pengirimanHead = array(
            'no_permintaan' => input('noPermintaan'),
            'tanggal_pengiriman' => input('tanggal_pengiriman'),
            'jumlah_permintaan' => input('jumlah_permintaan'),
            'jumlah_pemenuhan' => input('jumlah_pemenuhan'),
            'sisa' => input('sisa'),
            'estimasi' => input('estimasi'),
            'id_delivery_type' => input('d_type'),
            'id_ekpedisi' => input('id_ekpedisi'),
            'id_uker' => input('id_uker'),
            'j_koli' => input('j_koli'),
            'no_resi' => input('no_resi'),
            'nama_pengirim' => input('nama_pengirim'),
            'berat_barang' => input('berat_barang'),
            'pengiriman_created_by' => $this->session->userdata('user_login')['id_uker']
            
        );

        $offsetEkpedisi = $pengirimanHead['id_ekpedisi'];
        $namaekpedisi = array(
            'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_ekpedisi` WHERE id_ekpedisi = $offsetEkpedisi")
        );
        $finaleEkpedisi = $namaekpedisi['ekpedisi'][0]->nama_ekpedisi;
        

        $savePertek = $this->General->insertRecord('tbl_pengirimankekp', $pengirimanHead);
        $id_pengirimankekp11 = array(
            'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_pengirimankekp_det` ORDER BY id_pengkekp_det DESC LIMIT 1")
        );
        if($id_pengirimankekp11['ekpedisi']==null){
            $id_pengkekp_det = 1;
        }else{
            $finale_id = $id_pengirimankekp11['ekpedisi'][0]->id_pengkekp_det;
            $id_pengkekp_det = $finale_id+1;
        }
        // $finale_id = $id_pengirimankekp11['ekpedisi'][0]->id_pengkekp_det;
        // $id_pengkekp_det = $finale_id+1;

        // var_dump($id_pengirimankekp11);

        if ($savePertek) {
            $id_pengirimankekp11 = array(
                'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_pengirimankekp` ORDER BY id_pengirimankekp DESC LIMIT 1")
            );
            if($id_pengirimankekp11['ekpedisi']==null){
                $id_pertek = 1;
            }else{
                $finale_id = $id_pengirimankekp11['ekpedisi'][0]->id_pengirimankekp;
                $id_pertek = $finale_id;
            }
            
            $result = array();
            $transaksi = array();
            $cekQC = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $no_sn = $_POST['no_sn'][$key];
                $result[] = array(
                    'id_pengirimankekp' => $id_pertek,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'kondisi_barang' => $_POST['kondisi_barang'][$key]
                );
                $transaksi[] = array(
                    'id_jtran' => 1,
                    'dari_uker' => $this->session->userdata('user_login')['id_uker'],
                    'id_uker' => input('id_uker'),
                    'tgl_kirim_barang' => input('tanggal_pengiriman'),
                    'nama_ekpedisi' => $finaleEkpedisi,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'kon_barang' => $_POST['kondisi_barang'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'is_have' => 0,
                    'is_active' => 1,
                    'is_balikan' => 1,
                    'is_out' => 1
                );
                $cekQC[] = array(
                    'id_pengkekp_det' => $id_pengkekp_det,
                    'catatan_perbaikan' => "-",
                    'status_perbaikan' => 0
                );
                $id_pengkekp_det += 1;
                // $this->General->insertRecord('tbl_perbaikankcsp', $cekQC[0]);
                $this->General->deleteData('tbl_transaksi', ['no_sn' => $no_sn]);
            }
            // cetak_die($result);
            $savePertekDet = $this->General->insertBatch('tbl_pengirimankekp_det', $result);

            if ($savePertekDet) {
                LogActivity($this->db->last_query());
                $saveTransaksi = $this->General->insertBatch('tbl_transaksi', $transaksi);
                if($saveTransaksi){
                    LogActivity($this->db->last_query());
                    // $this->session->set_flashdata('success', 'Record added Successfully..!');
                    // redirect('Pengirimanbarang');
                    $saveQC = $this->General->insertBatch('tbl_perbaikankcsp', $cekQC);
                    if($saveQC){
                        LogActivity($this->db->last_query());
                        $this->session->set_flashdata('success', 'Record added Successfully..!');
                        redirect('Pengirimanbarang');
                    }else {
                        cetak_die($this->db->error());
                    }
                }else {
                    var_dump($transaksi);
                }
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                var_dump($result);
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            var_dump($pengirimanHead);
        }
    }

    public function updatePengiriman($id_pengiriman){

        $pengirimanHead = array(
            'no_permintaan' => input('noPermintaan'),
            'tanggal_pengiriman' => input('tanggal_pengiriman'),
            'jumlah_permintaan' => input('jumlah_permintaan'),
            'jumlah_pemenuhan' => input('jumlah_pemenuhan'),
            'sisa' => input('sisa'),
            'estimasi' => input('estimasi'),
            'id_delivery_type' => input('d_type'),
            'id_ekpedisi' => input('id_ekpedisi'),
            'id_uker' => input('id_uker'),
            'j_koli' => input('j_koli'),
            'no_resi' => input('no_resi'),
            'nama_pengirim' => input('nama_pengirim'),
            'berat_barang' => input('berat_barang'),
            'pengiriman_created_by' => $this->session->userdata('user_login')['id_uker']
            
        );
        
        $savePertek = $this->General->update_record($pengirimanHead, ['id_pengirimankekp' => $id_pengiriman], 'tbl_pengirimankekp');

        if ($savePertek) {
            $delPengiriman = $this->General->deleteData('tbl_pengirimankekp_det', ['id_pengirimankekp' => $id_pengiriman]);
            $result = array();
            $getPerbaikan = $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_perbaikankcsp` ORDER BY id_pengkekp_det DESC");
            $id_pengkekp_det = $getPerbaikan[0]->id_pengkekp_det;
            $idFinale = $id_pengkekp_det+1;

            foreach ($_POST['no_urut'] as $key => $val) {
                
                $result[] = array(
                    'id_pengirimankekp' => $id_pengiriman,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'kondisi_barang' => $_POST['kondisi_barang'][$key]
                );
                $cekQC[] = array(
                    'id_pengirimankekp' => $id_pengiriman,
                    'id_pengkekp_det' => $idFinale,
                    'catatan_perbaikan' => "-"
                );
                $idFinale += 1;
            }
            if($delPengiriman){
                LogActivity($this->db->last_query());
                $savePertekDet = $this->General->insertBatch('tbl_pengirimankekp_det', $result);
                if ($savePertekDet) {
                    $delQC = $this->General->deleteData('tbl_perbaikankcsp', ['id_pengirimankekp' => $id_pengiriman]);
                    if($delQC){
                        LogActivity($this->db->last_query());
                        $insertQC = $this->General->insertBatch('tbl_perbaikankcsp', $cekQC);
                        if($insertQC){
                            $this->session->set_flashdata('success', 'Record added Successfully..!');
                            redirect('Pengirimanbarang');
                        }else{
                            var_dump($cekQC);
                        }
                    }else {
                        cetak_die($cekQC);
                    }
                } else {
                    cetak_die($result);
                }
            }else{
                cetak_die($result);
            }
        }else{
            cetak_die($pengirimanHead);
        }
    }

    public function delPengiriman(){
        $deletePengiriman = $this->General->deleteData('tbl_pengiriman_barang', ['id_pengiriman' => input('id_pengiriman')]);

        if ($deletePengiriman) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
        // redirect('Pengirimanbarang');
    }
}
