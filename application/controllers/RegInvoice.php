<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegInvoice extends MY_Controller
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
        // $get_session =[];
        // $get_session = $this->session->userdata("user_login");
        // var_dump($get_session['id_uker']);
        $data = array(
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT sum(nilai_invoice) as GrandTotalHarga FROM tbl_invoicebarang"),
            'po'         => $this->General->fetch_CoustomQuery("SELECT * FROM tbl_po WHERE kadiv_approv = 1 AND wakadiv_approv = 1")
        );
        $this->header('List Registrasi Invoice');
        $this->load->view('RegInvoice/list_reginvoice', $data);
        $this->footer();
    }

    public function listInvoicebarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_invoicebarang',
            ['no', 'tanggal_invoice', 'no_po', 'no_invoice', 'nilai_invoice', 'status_verifikasi'],
            ['tanggal_invoice', 'no_po', 'no_invoice', 'nilai_invoice', 'status_verifikasi'],
            ['tanggal_invoice' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];
        // $get_session =[];
        // $get_session = $this->session->userdata("user_login");

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tanggal_invoice;
            $row[] = $results->no_po;
            $row[] = $results->no_invoice;
            $row[] = rupiah($results->nilai_invoice);
            if($results->status_verifikasi == 0){
                $row[] = labelWarna("danger", "Belum Diapprove.");
                $row[] = "
                      <button type='button' class='btn btn-warning btn-sm' onclick='ModaleditReginv($results->id_invoice)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>

                      <button type='button' class='btn btn-danger btn-sm' onclick='deleteRegin($results->id_invoice)'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>";
            }else if($results->status_verifikasi ==1 ){
                $row[] = labelWarna("success", "Sudah Diapprove");
                $row[] = labelWarna("success", "Sudah Diapprove");
            }else if($results->status_verifikasi ==2){
                $row[] = labelWarna("warning", "Approval Ditolak!");
                $row[] = "
                        <button type='button' class='btn btn-warning btn-sm' onclick='ModaleditReginv($results->id_invoice)'>
                            <i class='fa fa-pencil-square-o'></i>
                        </button>

                        <button type='button' class='btn btn-danger btn-sm' onclick='deleteRegin($results->id_invoice)'>
                                <i class='fa fa-trash' aria-hidden='true'></i>
                            </button>";
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_invoicebarang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_invoicebarang',
                ['no', 'id_invoice', 'tanggal_invoice', 'no_po', 'no_invoice', 'nilai_invoice', 'status_verifikasi'],
                ['id_invoice', 'tanggal_invoice', 'no_po', 'no_invoice', 'nilai_invoice', 'status_verifikasi'],
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function showModalInvoice($id_invoice)
    {
        $data = $this->General->fetch_records('tbl_invoicebarang', ['id_invoice' => $id_invoice]);
        echo json_encode($data);
    }

    public function carivendor()
    {
        $id_po = input('id_po2');
        $where = ['id_po' => $id_po];


        $nm_brg = $this->General->fetch_records('v_pembayaranpo', $where);

        if ($nm_brg) {
            $brg = array(

                'nama_vendor2' => $nm_brg[0]->nama_vendor,
                'no_rekening2' => $nm_brg[0]->no_rekening,
                'nama_bank2' => $nm_brg[0]->nama_bank,
                'nama_rekening2' => $nm_brg[0]->nama_rekening,
                // 'nama_barang' => $nm_brg[0]->nama_barang,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }

    public function updateRegInvoice()
    {
        $get_session =[];
        $get_session = $this->session->userdata("user_login");
        if($get_session['id_sgroup']=='2' ||$get_session['id_sgroup']=='8'){
            $invoiceBarang = array(
                'id_po' => input('id_po2'),
                'tanggal_invoice' => input('tgl_invoice2'),
                'tanggal_terima' => input('tgl_terima_invoice2'),
                'no_invoice' => input('no_invoice2'),
                'jenis_pembayaran' => input('jenis_bayar2'),
                'beban' => input('beban2'),
                'tahap_tagihan' => input('tahap_tagihan2'),
                'nilai_invoice' => input('nilai_invoice2'),
                'asli_invoice' => isset($_POST['inv2']) ? 1 : 0,
                'asli_pajak' => isset($_POST['fakpaj2']) ? 1 : 0,
                'asli_tandaterima' => isset($_POST['ttsjdo2']) ? 1 : 0,
                'copy_po' => isset($_POST['cpo2']) ? 1 : 0,
                'copy_ip' => isset($_POST['cip2']) ? 1 : 0,
                'asli_ba' => isset($_POST['berac2']) ? 1 : 0,
                'dokumen' => isset($_POST['dokpen2']) ? 1 : 0,
                'lain_lain' => isset($_POST['ll2']) ? 1 : 0,
                'status_verifikasi' => 1
            );
    
            // var_dump($data);
    
            $response = $this->General->update_record($invoiceBarang, ['id_invoice' => input('id_invoice2')], 'tbl_invoicebarang');
    
            if ($response) {
                LogActivity($this->db->last_query());
    
                $pesan = array(
                    'pesan' => 'Data berhasil di edit!',
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
        }else{
            $data = array(
                'id_po' => input('id_po2'),
                'tanggal_invoice' => input('tgl_invoice2'),
                'tanggal_terima' => input('tgl_terima_invoice2'),
                'no_invoice' => input('no_invoice2'),
                'jenis_pembayaran' => input('jenis_bayar2'),
                'beban' => input('beban2'),
                'tahap_tagihan' => input('tahap_tagihan2'),
                'nilai_invoice' => input('nilai_invoice2'),
                'asli_invoice' => isset($_POST['inv2']) ? 1 : 0,
                'asli_pajak' => isset($_POST['fakpaj2']) ? 1 : 0,
                'asli_tandaterima' => isset($_POST['ttsjdo2']) ? 1 : 0,
                'copy_po' => isset($_POST['cpo2']) ? 1 : 0,
                'copy_ip' => isset($_POST['cip2']) ? 1 : 0,
                'asli_ba' => isset($_POST['berac2']) ? 1 : 0,
                'dokumen' => isset($_POST['dokpen2']) ? 1 : 0,
                'lain_lain' => isset($_POST['ll2']) ? 1 : 0,
                'status_verifikasi' => 0
            );
    
            // var_dump($data);
    
            $response = $this->General->update_record($data, ['id_invoice' => input('id_invoice2')], 'tbl_invoicebarang');
    
            if ($response) {
                LogActivity($this->db->last_query());
    
                $pesan = array(
                    'pesan' => 'Data berhasil di edit!',
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
        }
    }

    public function tolakApproval()
    {
        $get_session =[];
        $get_session = $this->session->userdata("user_login");
        // $id_invoice = input("id_invoice2");
        $invoiceBarang = array(
            'status_verifikasi' => 2
        );

        // var_dump($id_invoice);

        $response = $this->General->update_record($invoiceBarang, ['id_invoice' => input('id_invoice2')], 'tbl_invoicebarang');

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Data berhasil di edit!',
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
    }

    public function addReginv()
    {

        $data = array(
            'id_po' => input('id_po'),
            'tanggal_invoice' => input('tgl_invoice'),
            'tanggal_terima' => input('tgl_terima_invoice'),
            'no_invoice' => input('no_invoice'),
            'nilai_invoice' => input('nilai_invoice'),
            'jenis_pembayaran' => input('jenis_bayar'),
            'tahap_tagihan' => input('tahap_tagihan'),
            'beban' => input('beban'),
            'asli_invoice' => isset($_POST['inv']) ? 1 : 0,
            'asli_pajak' => isset($_POST['fakpaj']) ? 1 : 0,
            'asli_tandaterima' => isset($_POST['ttsjdo']) ? 1 : 0,
            'copy_po' => isset($_POST['cpo']) ? 1 : 0,
            'copy_ip' => isset($_POST['cip']) ? 1 : 0,
            'asli_ba' => isset($_POST['berac']) ? 1 : 0,
            'dokumen' => isset($_POST['dokpen']) ? 1 : 0,
            'lain_lain' => isset($_POST['lain_lain']) ? 1 : 0
        );

        $jenis_bayar = input('jenis_bayar');
        if($jenis_bayar == "full"){
            $po = array(
                'status_invoice' => 2
            );
            $this->General->update_record($po, ['id_po' => input('id_po')], 'tbl_po');
        }else{
            $po = array(
                'status_invoice' => 1
            );
            $this->General->update_record($po, ['id_po' => input('id_po')], 'tbl_po');
        }


        // var_dump($status_invoice);

        $response = $this->General->insertRecord('tbl_invoicebarang', $data);

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Data berhasil di input!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di input!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function deleteRegin()
    {
        $deleteRegin = $this->General->deleteData('tbl_invoicebarang', ['id_invoice' => input('id_invoice')]);

        if ($deleteRegin) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }

    public function editProject($id_project)
    {
        $data = array(
            'tgl_spk' => input('tgl'),
            'no_spk' => input('no'),
            'tid' => input('tid'),
            'nama_project' => input('nama'),
            'project_updated_date' => date('Y-m-d H:i:s'),
            'project_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_project' => $id_project], 'tbl_project');

        if ($response) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record updated Successfully..!');
            redirect('Project');
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Project');
        }
    }
}
