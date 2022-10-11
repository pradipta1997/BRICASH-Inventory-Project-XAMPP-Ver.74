<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonanpem extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    //------------------------------------------------------------------------------------

    public function index()
    {
        $data = array(
            'autoNo' => $this->General->autoNoPermohonanPem(),
            'noInvoice' => $this->General->fetch_records("tbl_invoicebarang"),
            'uker' => $this->General->fetch_records("tbl_unit_kerja"),
            'vendor' => $this->General->fetch_records("tbl_vendor")
        );
        $this->header('List Permohonan Pembayaran Persediaan');
        $this->load->view('Permohonanpem/list_permohonanpem', $data);
        $this->footer();
    }

    //------------------------------------------------------------------------------------


    public function listPermohonanpem()
    {
        $list = $this->Serverside->_serverSide(
            'v_permohonan_pem',
            ['no', 'no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'tanggal_invoice', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'pinca_approvel'],
            ['no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'tanggal_invoice', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'pinca_approvel'],
            ['no_permohonan_pem' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if ($results->pinca_approvel == 0) {

                //Untuk Flag Approvel
                if ($results->pinca_approvel == 1) {
                    $Approv = labelWarna('success', 'Kadiv Approv');
                } else {
                    $Approv = labelWarna('danger', 'Kadiv Non-Approv');
                }

                $App = "<p>$Approv</p>";

                //Untuk Flag Status
                if ($results->status_po == 1) {
                    $status = labelWarna('danger', 'Close');
                } else {
                    $status = labelWarna('success', 'Open');
                }

                $sp = "<p>$status</p>";


                $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->no_invoice;
                $row[] = $results->no_permohonan_pem;
                $row[] = $results->no_po;
                $row[] = $results->tanggal_po;
                $row[] = $results->tanggal_invoice;
                $row[] = $results->nama_uker;
                $row[] = $results->nama_vendor;
                $row[] = $results->jenis_pembayaran;
                $row[] = $results->jtempo_pembayaran." Hari";
                $row[] = rupiah($results->subtotal);
                $row[] = rupiah($results->subtotal_ppn);
                $row[] = rupiah($results->grand_total);
                $row[] = $sp;
                $row[] = $App;
                $row[] = "<button type='button' class='btn btn-warning' onclick='VPermohonanPem($results->id_permohonan_pem)'>
                                 <i class='fa fa-pencil-square-o'></i>
                             </button>
                             <button type='button' class='btn btn-danger' onclick='deletePermohonanpem($results->id_permohonan_pem)'>
                                <i class='fa fa-trash' aria-hidden='true'></i>
                            </button>";
                $data[] = $row;
            }
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permohonan_pem'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permohonan_pem',
                ['no', 'no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'tanggal_invoice', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'pinca_approvel'],
                ['no_invoice', 'no_permohonan_pem', 'no_po', 'tanggal_po', 'tanggal_invoice', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', 'pinca_approvel']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    //------------------------------------------------------------------------------------

    public function showModalPermohonanpem($id_permohonan_pem)
    {
        $data = $this->General->fetch_records('tbl_permohonan_pem', ['id_permohonan_pem' => $id_permohonan_pem]);
        echo json_encode($data);
    }

    //------------------------------------------------------------------------------------

    public function addPermohonanPem()
    {
        // print("cuy");
        // // var_dump("Cuy");
        $data = array(
            'id_invoice' => input('id_reg_inv'),
            'jenis_pembayaran' => input('jenis_pembayaran'),
            'tempo_pembayaran' => input('tempo_pembayaran'),
            'no_permohonan_pem' => input('no_permohonan_pembayaran')
        );

        // cetak_die($data);

        $response = $this->General->insertRecord('tbl_permohonan_pem', $data);

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

    //------------------------------------------------------------------------------------

    public function deletePermohonanPem()
    {
        $deletePemLoc = $this->General->deleteData('tbl_permohonan_pem', ['id_permohonan_pem' => input('id_permohonan_pem')]);

        if ($deletePemLoc) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }


    //------------------------------------------------------------------------------------

    public function savePermohonanPem()
    {
        $get_session = [];
        $get_session = $this->session->userdata("user_login");
        if ($get_session['id_sgroup'] == '2' || $get_session['id_sgroup'] == '8') {
            $data = array(
                'id_invoice' => input('id_reg_inv2'),
                'jenis_pembayaran' => input('jenis_pembayaran2'),
                'tempo_pembayaran' => input('tempo_pembayaran2'),
                'no_permohonan_pem' => input('no_permohonan_pembayaran2'),
                'pinca_approvel'    => 1
            );
            $jenis_pembayaran = input('jenis_pembayaran2');
            if($jenis_pembayaran == "Full"){
                $flag_pembayaran = 2;
            }else{
                $flag_pembayaran = 1;
            }
            $po = array(
                'id_pembelian'  => input('id_permohonan_pem2'),
                'flag_pembayaran' => $flag_pembayaran
            );

            // cetak_die($data);
            $response = $this->General->update_record($data, ['id_permohonan_pem' => input('id_permohonan_pem2')], 'tbl_permohonan_pem');
            $this->General->update_record($po, ['id_po' => input('id_po')], 'tbl_po');

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
        } else {
            // print("cuy");
            // // var_dump("Cuy");
            $data = array(
                'id_invoice' => input('id_reg_inv2'),
                'jenis_pembayaran' => input('jenis_pembayaran2'),
                'tempo_pembayaran' => input('tempo_pembayaran2'),
                'no_permohonan_pem' => input('no_permohonan_pembayaran2')
            );

            // cetak_die($data);
            $response = $this->General->update_record($data, ['id_permohonan_pem' => input('id_permohonan_pem2')], 'tbl_permohonan_pem');

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

    //------------------------------------------------------------------------------------

    public function viewPermohonanpem($id_permohonan_pem)
    {
        $data = $this->General->fetch_records('v_permohonan_pem', ['id_permohonan_pem' => $id_permohonan_pem]);
        echo json_encode($data);
    }

    //------------------------------------------------------------------------------------

    private function _editPermohonanPem()
    {
        //fill this code!
    }

    //------------------------------------------------------------------------------------

    // public function cariNoInvoice()
    // {
    //     $no_invoice = input('no_invoice');
    //     if (input('idPerpem')) {
    //         $where = ['no_invoice' => $no_invoice, 'id_permohonan_pem' => input('idPerpem'), 'id_uker' => $this->session->userdata('user_login')['id_uker']];
    //     } else {
    //         $where = ['no_invoice' => $no_invoice, 'id_uker' => $this->session->userdata('user_login')['id_uker']];
    //     }

    //     $invo = $this->General->fetch_records('v_noinvoice', $where);

    //     if ($invo) {
    //         $invoice = array(
    //             'id_permohonan_pem' => $invo[0]->id_permohonan_pem,
    //             'id_po' => $invo[0]->id_po,
    //             'no_po' => $invo[0]->no_po,
    //             'tanggal_po' => $invo[0]->tanggal_po,
    //             'tgl_invoice' => $invo[0]->tgl_invoice,
    //             'subtotal' => $invo[0]->subtotal,
    //             'subtotal_ppn' => $invo[0]->subtotal_ppn,
    //             'grand_total' => $invo[0]->grand_total,
    //         );
    //         echo json_encode($invoice);
    //     } else {
    //         echo json_encode(false);
    //     }
    // }

    //-----------------------------------------------------------------------------------
}
