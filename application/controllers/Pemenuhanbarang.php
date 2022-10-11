<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemenuhanbarang extends MY_Controller
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
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
        );
        $this->header('List Pemenuhan Barang');
        $this->load->view('PemenuhanBarang/listpembar', $data);
        $this->footer();
    }


    public function listPemenuhanbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_permintaan_barang',
            ['no', 'no_permintaan', 'tanggal_pemenuhan',  'nama_uker', 'status_permintaan'],
            ['no_permintaan', 'tanggal_pemenuhan',  'nama_uker', 'status_permintaan'],
            ['id_permintaan' => 'asc'],
            ['pinca_approv' => '1', 'pgd_approv' => '1'],
            'data'
        );

        $b = '';
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            //tgl pemenuhan
            // if ($results->pinca_approv == 1) {

            //     if ($results->pinca_approv == 1) {
            //         $pincaApprov = labelWarna('success', 'Pinca Approv');
            //     } else {
            //         $pincaApprov = labelWarna('danger', 'Pinca Non Approv');
            //     }

            //     $Approv = "<p>$pincaApprov</p>";

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            if ($results->status_permintaan == 0) {
                $row[] = labelWarna("danger", "Belum dipenuhi");
            } else {
                $row[] = $results->tanggal_pemenuhan;
            }
            // if ($results->tanggal_pemenuhan == 0000 - 00 - 0) {
            //     $row[] = labelWarna("danger", "Belum dipenuhi");
            // } else if ($results->status_pemenuhan == 0) {
            //     $row[] = labelWarna("danger", "Belum dipenuhi");
            // } else {
            //     $row[] = $results->tanggal_pemenuhan;
            // }
            $row[] = $results->nama_uker;
            $row[] = $results->status_permintaan == 0 ? labelWarna("danger", "Belum Dipenuhi") : labelWarna("success", "Sudah Dipenuhi");
            $row[] = "<a href='" . base_url("Pemenuhanbarang/detailPermenuhanbarang/" . $results->id_permintaan) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                            <i class='fa fa-pencil-square-o'></i>
                     </a>";
            $data[] = $row;
            // }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permintaan_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permintaan_barang',
                ['no', 'no_permintaan', 'tanggal_pemenuhan',  'nama_uker', 'status_permintaan'],
                ['no_permintaan', 'tanggal_pemenuhan',  'nama_uker', 'status_permintaan'],
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filter()
    {
        $status_pem = input('status_permintaan');
        $tujuan = input('id_uker');

        if ($tujuan != 'All' && $status_pem != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE id_uker = '" . $tujuan . "' AND status_permintaan = '" . $status_pem . "' AND pinca_approv = '1'");
        } else if ($tujuan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE id_uker = '" . $tujuan . "' AND pinca_approv = '1'");
        } else if ($status_pem != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE status_permintaan = '" . $status_pem . "' AND pinca_approv = '1'");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE pinca_approv = '1'");
        }

        $data = array();
        $no =  $_POST['start'];

        foreach ($list as $results) {
            //tgl pemenuhan
            // if ($results->pinca_approv == 1) {

            //     if ($results->pinca_approv == 1) {
            //         $pincaApprov = labelWarna('success', 'Pinca Approv');
            //     } else {
            //         $pincaApprov = labelWarna('danger', 'Pinca Non Approv');
            //     }

            //     $Approv = "<p>$pincaApprov</p>";

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            if ($results->status_permintaan == 0) {
                $row[] = labelWarna("danger", "Belum dipenuhi");
            } else {
                $row[] = $results->tanggal_pemenuhan;
            }
            // if ($results->tanggal_pemenuhan == 0000 - 00 - 0) {
            //     $row[] = labelWarna("danger", "Belum dipenuhi");
            // } else if ($results->status_pemenuhan == 0) {
            //     $row[] = labelWarna("danger", "Belum dipenuhi");
            // } else {
            //     $row[] = $results->tanggal_pemenuhan;
            // }
            $row[] = $results->nama_uker;
            $row[] = $results->status_permintaan == 0 ? labelWarna("danger", "Belum Dipenuhi") : labelWarna("success", "Sudah Dipenuhi");
            $row[] = "<a href='" . base_url("Pemenuhanbarang/detailPermenuhanbarang/" . $results->id_permintaan) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                            <i class='fa fa-pencil-square-o'></i>
                     </a>";
            $data[] = $row;
            // }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pemenuhan_barcab'),
            "recordsFiltered" => $list,
            "data" => $data,
            // ),

        );

        echo json_encode($output);
    }

    public function detailPermenuhanbarang($id_permintaan)
    {
        $data = array(
            'delivery' => $this->General->fetch_records('tbl_delivery_type'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'layanan' => $this->General->fetch_records('tbl_layanan_ekspedisi'),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPengiriman' => $this->General->autoNoPengiriman(),
            // 'namaUker' => $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]),
            'permintaan' => $this->General->getRow('v_permintaan_barang', ['id_permintaan' => $id_permintaan]),
            'jmlhpemenuhan' => $this->General->fetch_CoustomQuery("SELECT SUM(qty) AS jumlah FROM `v_pemenuhan_barang_det` WHERE id_permintaan = $id_permintaan "),
            'pemenuhan' => $this->General->fetch_CoustomQuery("SELECT COUNT(*) AS jumlah FROM `v_pemenuhan_barang_det` WHERE status_pemenuhan = 1 AND id_permintaan = $id_permintaan "),
        );
        // cetak_die($data['jmlhpemenuhan']);
        $this->header('List Pemenuhan Barang');
        $this->load->view('PemenuhanBarang/detail_pembar', $data);
        $this->footer();
    }

    public function updatePemenuhanbarang($id_permintaan)
    {
        if(input('sisa')==0){
            $status_pem = 1;
            $jumlah = $_POST['harga_barang'];
            $jumlah_harga = array_sum($jumlah);
            // $autoNoPengiriman = $this->General->autoNoPengiriman();

            $updatepemenuhan = array(
                'id_delivery_type' => input('d_type'),
                'id_ekpedisi' => input('ekspedisi'),
                'id_layanan_ekspedisi' => input('service'),
                'id_uker' => input('tujuan'),
                'harga_total' => $jumlah_harga,
                // 'kondisi_barang' => input('kondisibrg'),
                'tanggal_pemenuhan' => date('Y-m-d'),
                'status_permintaan' => $status_pem,
                'catatan_permintaan' => input('keterangan'),
                'no_pemenuhan'      => input('nopemenuhan')
            );

            $insertPengiriman = array(
                'id_permintaan' => $id_permintaan,
                'id_ekpedisi' => input('ekspedisi'),
                'id_layanan_ekspedisi' => input('service'),
                'no_pengiriman' => input('no_pengiriman'),
                'id_uker' => input('tujuan'),
                'total_harga' => $jumlah_harga,
                'tanggal_pengiriman' => date('Y-m-d'),
                'keterangan' => input('keterangan'),
            );
            
            // cetak_die($updatepemenuhan);
            $updatepemenuhandet = $this->General->update_record($updatepemenuhan, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');
            $this->General->insertRecord('tbl_pengiriman_barang', $insertPengiriman);
            // lastq();
            if ($updatepemenuhandet) {

                $id_pengiriman = $this->db->insert_id();
                $result = array();
                foreach ($_POST['status_pemenuhan'] as $key => $val) {
                    if($val == "Terpenuhi"){
                        $status_pemenuhan = 1;
                        $pengirimanBarang[] = array(
                            'id_pengiriman' =>  $id_pengiriman,
                            'no_urut' => $_POST['no_urut'][$key],
                            'no_sn' => $_POST['sn'][$key],
                            'harga_barang' => $_POST['harga_barang'][$key],
                            'kondisi_barang' =>  $_POST['kondisibrg'][$key],
                            'status_pemenuhan' => $status_pemenuhan
                        );
                    }else{
                        $status_pemenuhan = 0;
                    }
                    $result[] = array(
                        
                        'id_permintaan' => $id_permintaan,
                        'no_urut' => $_POST['no_urut'][$key],
                        'no_sn' => $_POST['sn'][$key],
                        'harga_barang' => $_POST['harga_barang'][$key],
                        'kondisi_barang' =>  $_POST['kondisibrg'][$key],
                        'qty' => 1,
                        'status_pemenuhan' => $status_pemenuhan
                    );
                    
                }
                $this->General->deleteData('tbl_permintaan_barang_det', ['id_permintaan' => $id_permintaan]);
                $this->General->insertBatch('tbl_pengiriman_barang_det', $pengirimanBarang);
                // cetak_die($result);
                $updatepemdet = $this->General->insertBatch('tbl_permintaan_barang_det', $result);
                

                if ($updatepemdet) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Record updated Successfully..!');
                    redirect('Pemenuhanbarang');
                } else {
                    $this->session->set_flashdata('error', 'Record updated Failed..!');
                    redirect('Pemenuhanbarang');
                }
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Pemenuhanbarang');
                // print_r($insertPengiriman);
                
            }
        }else{
            $status_pem = 0;
            // jumlah total harga barang
            $jumlah = $_POST['harga_barang'];
            $jumlah_harga = array_sum($jumlah);
            // $autoNoPengiriman = $this->General->autoNoPengiriman();

            $updatepemenuhan = array(
                'id_delivery_type' => input('d_type'),
                'id_ekpedisi' => input('ekspedisi'),
                'id_layanan_ekspedisi' => input('service'),
                'id_uker' => input('tujuan'),
                'harga_total' => $jumlah_harga,
                // 'kondisi_barang' => input('kondisibrg'),
                'tanggal_pemenuhan' => date('Y-m-d'),
                'status_permintaan' => $status_pem,
                'catatan_permintaan' => input('keterangan'),
                'no_pemenuhan'      => input('nopemenuhan')
            );

            $insertPengiriman = array(
                'id_permintaan' => $id_permintaan,
                'id_ekpedisi' => input('ekspedisi'),
                'id_layanan_ekspedisi' => input('service'),
                'no_pengiriman' => input('no_pengiriman'),
                'id_uker' => input('tujuan'),
                'total_harga' => $jumlah_harga,
                'tanggal_pengiriman' => date('Y-m-d'),
                'keterangan' => input('keterangan'),
            );
            
            // cetak_die($updatepemenuhan);
            $updatepemenuhandet = $this->General->update_record($updatepemenuhan, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');
            $this->General->insertRecord('tbl_pengiriman_barang', $insertPengiriman);
            // lastq();
            if ($updatepemenuhandet) {

                $id_pengiriman = $this->db->insert_id();
                $result = array();
                foreach ($_POST['status_pemenuhan'] as $key => $val) {
                    if($val == "Terpenuhi"){
                        $status_pemenuhan = 1;
                        $pengirimanBarang[] = array(
                            'id_pengiriman' =>  $id_pengiriman,
                            'no_urut' => $_POST['no_urut'][$key],
                            'no_sn' => $_POST['sn'][$key],
                            'harga_barang' => $_POST['harga_barang'][$key],
                            'kondisi_barang' =>  $_POST['kondisibrg'][$key],
                            'status_pemenuhan' => $status_pemenuhan
                        );
                    }else{
                        $status_pemenuhan = 0;
                    }
                    $result[] = array(
                        'id_permintaan' => $id_permintaan,
                        'no_urut' => $_POST['no_urut'][$key],
                        'no_sn' => $_POST['sn'][$key],
                        'harga_barang' => $_POST['harga_barang'][$key],
                        'kondisi_barang' =>  $_POST['kondisibrg'][$key],
                        'qty' => 1,
                        'status_pemenuhan' => $status_pemenuhan
                    );
                }
                $this->General->deleteData('tbl_permintaan_barang_det', ['id_permintaan' => $id_permintaan]);
                $this->General->insertBatch('tbl_pengiriman_barang_det', $pengirimanBarang);
                // cetak_die($result);
                $updatepemdet = $this->General->insertBatch('tbl_permintaan_barang_det', $result);
                

                if ($updatepemdet) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Record updated Successfully..!');
                    redirect('Pemenuhanbarang');
                } else {
                    $this->session->set_flashdata('error', 'Record updated Failed..!');
                    redirect('Pemenuhanbarang');
                }
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Pemenuhanbarang');
                // print_r($insertPengiriman);
                
            }
        }
        
    }

    public function check_sn(){
        $no_sn = input('no_sn');

        $check = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_stock WHERE no_sn='".$no_sn."'");
        
        if($check){
            if($check[0]->flag_barang == 0){
                $flag_barang = "Rusak";
            }else{
                $flag_barang = "Bagus";
            }
            $msg = [
                'harga_barang'  =>  $check[0]->harga_barang,
                'flag_barang'   =>  $flag_barang,
                'pesan'  => true
            ];
        }else{
            $msg = [
                'pesan'  => false
            ];
        }

        echo json_encode($msg);
    }
}
