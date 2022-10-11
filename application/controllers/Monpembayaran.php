<?php
class Monpembayaran extends MY_Controller
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

        $this->header('Monitoring Permohonan Pembayaran');
        $this->load->view('Monpembayaran/list_monpembayaran');
        $this->footer();
    }

    public function detailMonpembayaran($id)
    {
        $data = array(
            'pembayaran' => $this->General->fetch_records('v_monitoringpembayaran', ['id_permohonan_pem' => $id])
        );

        $this->header('Detail Monitoring Permohonan Pembayaran');
        $this->load->view('Monpembayaran/detail_monpembayaran',$data);
        $this->footer();
    }

    public function listPermohonanpem()
    {
        $list = $this->Serverside->_serverSide(
            'v_permohonan_pem',
            ['no', 'no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'status_invoice', 'flag_pembukuan'],
            ['no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'status_invoice', 'flag_pembukuan'],
            ['no_permohonan_pem' => 'desc'],
            null,
            'data'
        );
        // echo $list;
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->no_invoice;
                $row[] = $results->no_permohonan_pem;
                $row[] = $results->no_po;
                $row[] = $results->tanggal_po;
                $row[] = date('Y-m-d', strtotime($results->tanggal_po. ' + '.$results->jtempo_pembayaran.' days'));
                $row[] = $results->nama_vendor;
                $row[] = $results->jenis_pembayaran;
                $row[] = $results->jtempo_pembayaran." Hari";
                $row[] = rupiah($results->subtotal);
                $row[] = rupiah($results->subtotal_ppn);
                $row[] = rupiah($results->grand_total);
                if($results->status_po==0){
                    $row[] = labelWarna("success", "Open");
                }else{
                    $row[] = labelWarna("danger", "Close");
                }
                if($results->flag_pembukuan==0){
                    $row[] = labelWarna("danger", "Belum Bayar");
                }else{
                    $row[] = labelWarna("success", "Sudah Bayar");
                }
                $row[] = "<a href='".base_url("Monpembayaran/detailMonpembayaran/".$results->id_permohonan_pem)."' class='btn btn-primary btn-sm'>
                            <i class='fa fa-eye'></i>
                            </a>";
                $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permohonan_pem'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permohonan_pem',
                ['no', 'no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'status_invoice', 'flag_pembukuan'],
                ['no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'status_invoice', 'flag_pembukuan'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function updateBuku(){
        $config['upload_path']          = './assets/file_pembayaran/';
        $config['allowed_types']        = 'jpg|png|pdf|docx|xlsx';

        $this->load->library('upload', $config);

        $file_voucher = array();

        foreach ($_FILES['file_voucher']['name'] as $key => $value) {
            $_FILES['images[]']['name'] = $_FILES['file_voucher']['name'][$key];
            $_FILES['images[]']['type'] = $_FILES['file_voucher']['type'][$key];
            $_FILES['images[]']['tmp_name'] = $_FILES['file_voucher']['tmp_name'][$key];
            $_FILES['images[]']['error'] = $_FILES['file_voucher']['error'][$key];
            $_FILES['images[]']['size'] = $_FILES['file_voucher']['size'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $file_voucher[$key] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'File tidak sesuai!');
                redirect('Monpembayaran');
            }
        }

        $hasilFile = implode('|', $file_voucher);

        $permohonanPemData = array(
            'no_voucher' => input('no_pembayaran'),
            'tanggal_transaksi' => input('tgl_transaksi'),
            'file_voucher' => $hasilFile
        );

        $bre = $this->General->fetch_CoustomQuery("SELECT SUM(nilai_invoice) AS total_bayar FROM tbl_invoicebarang WHERE id_po = '".input('id_po')."'");
        $hargaPO = $this->General->fetch_CoustomQuery("SELECT grand_total FROM tbl_po WHERE id_po='".input('id_po')."'");
        $sisabayar = $hargaPO[0]->grand_total - $bre[0]->total_bayar;
        if($sisabayar == 0){
            $po = array(
                'flag_pembukuan' => 1,
                'status_po' => 1,
                'sisa_bayar' => $sisabayar
            );
            $this->General->update_record($po, ['id_po' => input('id_po')], 'tbl_po');
        }else{
            $po = array(
                'flag_pembukuan' => 1,
                'sisa_bayar' => $sisabayar
            );
            $this->General->update_record($po, ['id_po' => input('id_po')], 'tbl_po');
        }
        $updatePermohonan = $this->General->update_record($permohonanPemData, ['id_permohonan_pem' => input('id_permohonan_pem')], 'tbl_permohonan_pem');

        if ($updatePermohonan) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record updated Successfully..!');
            redirect('Monpembayaran');
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Monpembayaran');
        }
    }
}
