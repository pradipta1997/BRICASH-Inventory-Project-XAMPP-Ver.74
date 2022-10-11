<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonanpembarek extends MY_Controller
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
        //TOTAL HARGA UNTUK FOOTER BELUM DIBUATKAN VIEW NYA!!!
        $data = array(
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(total_harga) as grandTotalHarga FROM v_permohonan_pembayaran_eks")
        );

        $this->header('List Permohonan Pembayaran Ekspedisi');
        $this->load->view('Permohonanpembarek/list_permohonanpembarek', $data);
        $this->footer();
    }

    //--------------------------------------------------------------------------------

    public function listPermohonanPembayaranEks()
    {
        $list = $this->Serverside->_serverSide(
            'v_permohonan_pembayaran_eks',
            ['no', 'no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga', 'status_cek'],
            ['no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga', 'status_cek'],
            ['no_pengiriman' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            //Cek Status
            if ($results->status_cek == 1) {
                $Status = labelWarna('success', 'Yes');
            } else {
                $Status = labelWarna('danger', 'No');
            }

            $Approvel = "<p>$Status</p>";

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_pengiriman;
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->nama_uker;
            $row[] = $results->no_resi;
            $row[] = $results->jumlah_koli;
            $row[] = $results->berat_barang;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->layanan_ekspedisi;
            $row[] = $results->nama_pengirim;
            $row[] = rupiah($results->total_harga);
            $row[] = $Approvel;
            $row[] = "<a href='" . base_url("Permohonanpembarek/detailPermohonanpembarek/" . $results->id_pengiriman) . "' class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                        </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permohonan_pembayaran_eks'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permohonan_pembayaran_eks',
                ['no', 'no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga', 'status_cek'],
                ['no_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'no_resi', 'jumlah_koli', 'berat_barang', 'nama_ekpedisi', 'layanan_ekspedisi', 'nama_pengirim', 'total_harga', 'status_cek']
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    //--------------------------------------------------------------------------------


    public function detailPermohonanpembarek($id_pengiriman)
    {
        $data = array(
            'detailPerPemEks' => $this->General->fetch_records("v_permohonan_pembayaran_eks", ['id_pengiriman' => $id_pengiriman]),
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(total_harga) as grandTotalHarga FROM v_permohonan_pembayaran_eks")
        );

        $this->header('Detail Permohonan Pembayaran Barang Ekpedisi');
        $this->load->view('Permohonanpembarek/detail_permohonanpembarek', $data);
        $this->footer();
    }


    public function updatePermohonanPembayaranEks($id_pengiriman)
    {
        $permohonanHead = array(
            'status_cek' => 1
        );

        $updatePermohonanHead = $this->General->update_record($permohonanHead, ['id_pengiriman' => $id_pengiriman], 'tbl_pengiriman_barang');

        if ($updatePermohonanHead) {

            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Permohonanpembarek');
        } else {

            $this->session->set_flashdata('danger', 'Record added Failed..!');
            redirect('Permohonanpembarek');
        }
    }

    //--------------------------------------------------------------------------------
}
