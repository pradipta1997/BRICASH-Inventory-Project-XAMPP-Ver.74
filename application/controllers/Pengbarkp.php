<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengbarkp extends MY_Controller
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

        $this->header('List Pengiriman Barang');
        $this->load->view('Pengbarkp/list_Pengbarkp', $data);
        $this->footer();
    }

    public function listPengirimanBarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_pengiriman_barang',
            ['no', 'no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga'],
            ['no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga'],
            ['no_pengiriman' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_pengiriman;
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->nama_uker;
            $row[] = $results->no_resi;
            // $row[] = $results->nama_uker;
            $row[] = $results->jumlah_koli;
            $row[] = $results->berat_barang;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->layanan_ekspedisi;
            $row[] = $results->nama_pengirim;
            $row[] = rupiah($results->total_harga);
            $row[] = "<a href='" . base_url("Pengbarkp/editPengbar/" . $results->id_pengiriman) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm  ' " . getDeleteperm() . " onclick='deletePengbarkp($results->id_pengiriman)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pengiriman_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pengiriman_barang',
                ['no', 'no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga'],
                ['no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga']
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function tambahPengbar()
    {
        $data = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'service' => $this->General->fetch_records('tbl_layanan_ekspedisi'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPengiriman' => $this->General->autoNoPengiriman()
        );

        $this->header('Tambah Pengiriman Barang');
        $this->load->view('Pengbarkp/tambahPengbarkp', $data);
        $this->footer();
    }

    public function savePengbarkp()
    {
        $pengbarkpHead = array(
            'id_uker' => input('id_uker'),
            'id_ekpedisi' => input('id_ekpedisi'),
            'id_layanan_ekspedisi' => input('id_layanan_ekspedisi'),
            'no_pengiriman' => input('no_pengiriman'),
            'tanggal_pengiriman' => input('tanggal_pengiriman'),
            'no_resi' => input('no_resi'),
            'estimasi' => input('estimasi'),
            'keterangan' => input('keteranganHead'),
            'jumlah_koli' => input('jumlah_koli'),
            'berat_barang' => input('berat_barang'),
            'nama_pengirim' => input('nama_pengirim'),
            'total_harga' => input('total_harga'),
            'pengiriman_created_by' => $this->session->userdata('user_login')['id_uker']
        );

        $offsetEkpedisi = $pengbarkpHead['id_ekpedisi'];
        $namaekpedisi = array(
            'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_ekpedisi` WHERE id_ekpedisi = $offsetEkpedisi")
        );
        $finaleEkpedisi = $namaekpedisi['ekpedisi'][0]->nama_ekpedisi;

        $savePengirimanBarang = $this->General->insertRecord('tbl_pengiriman_barang', $pengbarkpHead);

        if ($savePengirimanBarang) {
            $id_pengiriman = $this->db->insert_id();

            foreach ($_POST['no_urut'] as $key => $val) {
                $no_sn = $_POST['no_sn'][$key];
                $result[] = array(
                    'id_pengiriman' => $id_pengiriman,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'koli_ke' => $_POST['koli'][$key],
                    'berat_koli' => $_POST['berat_koli'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'pengiriman_det_created_by' => $this->session->userdata('user_login')['id_uker']
                );
                $transaksi[] = array(
                    'id_jtran' => 1,
                    'dari_uker' => $this->session->userdata('user_login')['id_uker'],
                    'id_uker' => input('id_uker'),
                    'tgl_kirim_barang' => input('tanggal_pengiriman'),
                    'nama_ekpedisi' => $finaleEkpedisi,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'kon_barang' => 1,
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'is_have' => 0,
                    'is_active' => 1,
                    'is_balikan' => 0,
                    'is_out' => 1
                );
                $stock[] = array(
                    'flag_pakai' => 1,
                    'flag_qc' => 0
                );
                $this->General->update_record($stock[0], ['no_sn' => $no_sn], 'tbl_stock');
            }
            $savePengirimanBarangDet = $this->General->insertBatch('tbl_pengiriman_barang_det', $result);

            if ($savePengirimanBarangDet) {
                LogActivity($this->db->last_query());
                $saveTransaksi = $this->General->insertBatch('tbl_transaksi', $transaksi);
                if ($saveTransaksi) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Record added Successfully..!');
                    redirect('Pengbarkp');
                } else {
                    var_dump($transaksi);
                }
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                var_dump($result);
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            var_dump($pengbarkpHead);
        }
    }


    public function editPengbar($id_pengiriman)
    {
        $data = array(
            'pengiriman' => $this->General->getRow('tbl_pengiriman_barang', ['id_pengiriman' => $id_pengiriman]),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'service' => $this->General->fetch_records('tbl_layanan_ekspedisi'),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        $this->header('Edit Pengiriman Barang');
        $this->load->view('Pengbarkp/editPengbarkp', $data);
        $this->footer();
    }

    public function updatePengbar($id_pengiriman)
    {
        // $pengbarHead = array(
        //     'id_uker' => input('id_uker'),
        //     'id_ekpedisi' => input('id_ekpedisi'),
        //     'id_layanan_ekspedisi' => input('id_layanan_ekspedisi'),
        //     'tanggal_pengiriman' => input('tanggal_pengiriman'),
        //     'nama_pengirim' => input('nama_pengirim'),
        //     'jumlah_koli' => input('jumlah_koli'),
        //     'berat_barang' => input('berat_barang'),
        //     'no_resi' => input('no_resi'),
        //     'total_harga' => input('total_harga'),
        //     'pengiriman_update_date' => date('Y-m-d H:i:s'),
        //     'pengiriman_update_by' => $this->session->userdata('user_login')['id_uker']
        // );

        // $updatePengbar = $this->General->update_record($pengbarHead, ['id_pengiriman' => $id_pengiriman], 'tbl_pengiriman_barang');

        // if ($updatePengbar) {
        //     $this->General->deleteData('tbl_pengiriman_barang_det', ['id_pengiriman' => $id_pengiriman]);

        //     $result = array();

        //     foreach ($_POST['no_urut'] as $key => $val) {
        //         $result[] = array(
        //             'id_pengiriman' => $id_pengiriman,
        //             'no_urut' => $val,
        //             'koli_ke' => $_POST['koli'][$key],
        //             'berat_koli' => $_POST['berat_koli'][$key],
        //             'keterangan' => $_POST['keterangan'][$key],
        //             'pengiriman_det_created_by' => $this->session->userdata('user_login')['id_uker']
        //         );
        //     }

        //     $updatePengbarDet = $this->General->insertBatch('tbl_pengiriman_barang_det', $result);

        //     if ($updatePengbarDet) {
        //         LogActivity($this->db->last_query());
        //         $this->session->set_flashdata('success', 'Record updated Successfully..!');
        //         redirect('Pengbarkp');
        //     } else {
        //         $this->session->set_flashdata('error', 'Record updated Failed..!');
        //         redirect('Pengbarkp');
        //     }
        // } else {
        //     $this->session->set_flashdata('error', 'Record updated Failed..!');
        //     redirect('Pengbarkp');
        // }

        $pengbarkpHead = array(
            'id_uker' => input('id_uker'),
            'id_ekpedisi' => input('id_ekpedisi'),
            'id_layanan_ekspedisi' => input('id_layanan_ekspedisi'),
            'no_pengiriman' => input('no_pengiriman'),
            'tanggal_pengiriman' => input('tanggal_pengiriman'),
            'no_resi' => input('no_resi'),
            'estimasi' => input('estimasi'),
            'keterangan' => input('keteranganHead'),
            'jumlah_koli' => input('jumlah_koli'),
            'berat_barang' => input('berat_barang'),
            'nama_pengirim' => input('nama_pengirim'),
            'total_harga' => input('total_harga')
        );

        $offsetEkpedisi = $pengbarkpHead['id_ekpedisi'];
        $namaekpedisi = array(
            'ekpedisi' => $this->General->fetch_CoustomQuery("SELECT * FROM `tbl_ekpedisi` WHERE id_ekpedisi = $offsetEkpedisi")
        );
        $finaleEkpedisi = $namaekpedisi['ekpedisi'][0]->nama_ekpedisi;
        
        $savePengirimanBarang = $this->General->update_record($pengbarkpHead, ['id_pengiriman' => $id_pengiriman], 'tbl_pengiriman_barang');

        if ($savePengirimanBarang) {
            $this->General->deleteData('tbl_pengiriman_barang_det', ['id_pengiriman' => $id_pengiriman]);

            foreach ($_POST['no_urut'] as $key => $val) {
                $no_sn = $_POST['no_sn'][$key];
                $result[] = array(
                    'id_pengiriman' => $id_pengiriman,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'koli_ke' => $_POST['koli'][$key],
                    'berat_koli' => $_POST['berat_koli'][$key],
                    'keterangan' => $_POST['keterangan'][$key]
                );
                $transaksi[] = array(
                    'id_jtran' => 1,
                    'dari_uker' => $this->session->userdata('user_login')['id_uker'],
                    'id_uker' => input('id_uker'),
                    'tgl_kirim_barang' => input('tanggal_pengiriman'),
                    'nama_ekpedisi' => $finaleEkpedisi,
                    'no_urut' => $val,
                    'no_sn' => $_POST['no_sn'][$key],
                    'kon_barang' => 1,
                    'harga_barang' => $_POST['harga_barang'][$key],
                    'is_have' => 0,
                    'is_active' => 1,
                    'is_balikan' => 0,
                    'is_out' => 1
                );
                $stock[] = array(
                    'flag_pakai' => 1,
                    'flag_qc' => 0
                );
                $this->General->update_record($stock[0], ['no_sn' => $no_sn], 'tbl_stock');
            }
            $savePengirimanBarangDet = $this->General->insertBatch('tbl_pengiriman_barang_det', $result);

            if ($savePengirimanBarangDet) {
                LogActivity($this->db->last_query());
                $saveTransaksi = $this->General->insertBatch('tbl_transaksi', $transaksi);
                if ($saveTransaksi) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Record added Successfully..!');
                    redirect('Pengbarkp');
                } else {
                    var_dump($transaksi);
                }
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                var_dump($result);
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            var_dump($pengbarkpHead);
        }
    }

    public function deletePengbarkp()
    {
        $deletePengbarkp = $this->General->deleteData('tbl_pengiriman_barang', ['id_pengiriman' => input('id_pengiriman')]);

        if ($deletePengbarkp) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
