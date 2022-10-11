<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchaseorder extends MY_Controller
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

        $this->header('List Purchase Order');
        $this->load->view('Purchaseorder/listpurchaseorder');
        $this->footer();
    }

    public function listPurchaseorder()
    {
        $list = $this->Serverside->_serverSide(
            'v_pohead',
            ['no', 'no_po', 'tanggal_po', 'direksi_approv', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', null, 'sla', 'is_active'],
            ['no_po', 'tanggal_po', 'direksi_approv', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', null, 'sla', 'is_active'],
            ['id_po' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if($results->grand_total>=50000000){
                if ($results->kadiv_approv == 1) {
                    $kadivApprov = labelWarna('success', 'Sudah Diapprov Kadiv');
                }else if ($results->kadiv_approv == 2) {
                    $kadivApprov = labelWarna('warning', 'Approval Ditolak Kadiv');
                } else {
                    $kadivApprov = labelWarna('danger', 'Belum diapprov Kadiv');
                }
    
                if ($results->direksi_approv == 1) {
                    $direksi_approv = labelWarna('success', 'Sudah diapprov Direksi');
                }else if($results->direksi_approv == 2) {
                    $direksi_approv = labelWarna('warning', 'Approval Ditolak Direksi');
                } else {
                    $direksi_approv = labelWarna('danger', 'Belum diapprov Direksi');
                }
    
                $Approv = $kadivApprov . "<br>" . $direksi_approv;
    
                if ($this->session->userdata('user_login')['id_sgroup'] == 2 || $this->session->userdata('user_login')['id_sgroup'] == 8 || $this->session->userdata('user_login')['id_sgroup'] == 24) {
                    $button = "<a href='" . base_url('Purchaseorder/viewPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>";
                } else {
                    if($results->direksi_approv == 1){
                        $button = labelWarna('danger', 'Data Sudah Diapprove');
                    }else{
                        $button = "<a href='" . base_url('Purchaseorder/editPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>
                        <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePurchaseorder($results->id_po)'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>";
                    }
                }
            }else{
                if ($results->kadiv_approv == 1) {
                    $kadivApprov = labelWarna('success', 'Sudah Diapprov Kadiv');
                }else if ($results->kadiv_approv == 2) {
                    $kadivApprov = labelWarna('warning', 'Approval Ditolak Kadiv');
                } else {
                    $kadivApprov = labelWarna('danger', 'Belum diapprov Kadiv');
                }
    
                if ($results->wakadiv_approv == 1) {
                    $wakadiv_approv = labelWarna('success', 'Sudah diapprov Wakadiv');
                }else if($results->wakadiv_approv == 2) {
                    $wakadiv_approv = labelWarna('warning', 'Approval Ditolak Wakadiv');
                } else {
                    $wakadiv_approv = labelWarna('danger', 'Belum diapprov Wakadiv');
                }
    
                $Approv = $kadivApprov . "<br>" . $wakadiv_approv;
    
                if ($this->session->userdata('user_login')['id_sgroup'] == 2 || $this->session->userdata('user_login')['id_sgroup'] == 8) {
                    $button = "<a href='" . base_url('Purchaseorder/viewPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>";
                } else {
                    if($results->wakadiv_approv == 1){
                        $button = labelWarna('danger', 'Data Sudah Diapprove');
                    }else{
                        $button = "<a href='" . base_url('Purchaseorder/editPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>
                        <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePurchaseorder($results->id_po)'>
                            <i class='fa fa-trash' aria-hidden='true'></i>
                        </button>";
                    }
                }
            }
            $tanggal_now = new DateTime(date('Y-m-d'));
            $tanggal_pemenuhan = new DateTime(date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po))));
            $jumlah_hari = $tanggal_now->diff($tanggal_pemenuhan);

            if ($results->wakadiv_approv == 1 && $results->kadiv_approv == 1) {
                if ($results->status_po == 1) {
                    $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                } else if ($jumlah_hari->format("%R") == '+' and $jumlah_hari->format("%a") > '0') {
                    $sla = '<a title="Proses ' . abs($jumlah_hari->format("%a") - '0') . ' hari" class="btn fa fa-thumbs-up" style="color:green" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                } else {
                    $sla = '<a title="Terlambat ' . abs($jumlah_hari->format("%a") - '0') . ' Hari!" class="btn fa fa-thumbs-down" style="color:red" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                }
            } else {
                $sla = "-";
            }

            if ($results->status_invoice == 2) {
                $status_invoice = labelWarna("success", "Sudah Bayar");
            } else if ($results->status_invoice == 1) {
                $status_invoice = labelWarna("warning", "Bayar Sebagian");
            } else {
                $status_invoice = labelWarna("danger", "Belum Bayar");
            }

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_po;
            $row[] = $results->tanggal_po;
            $row[] = $results->nama_project;
            $row[] = $results->nama_uker;
            $row[] = $results->nama_vendor;
            $row[] = $results->jenis_pembayaran;
            $row[] = date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po)));
            $row[] = rupiah($results->subtotal);
            $row[] = rupiah($results->subtotal_ppn);
            $row[] = rupiah($results->grand_total);
            $row[] = $results->status_po == 1 ? labelWarna('danger', 'Close') : labelWarna('success', 'Open');
            $row[] = $status_invoice;
            $row[] = $Approv;
            $row[] = $sla;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pohead'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pohead',
                ['no', 'no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', null, 'sla', 'is_active'],
                ['no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'subtotal', 'subtotal_ppn', 'grand_total', 'status_po', null, 'sla', 'is_active']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filter()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $status_po = input('status_po');

        if ($startdate && $enddate && $status_po != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_pohead WHERE status_po = '" . $status_po . "' AND tanggal_po BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pohead WHERE tanggal_po BETWEEN '" . $startdate . "' AND '" . $enddate . "' ");
        } else if ($status_po != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pohead WHERE status_po = '" . $status_po . "' ");
        } else {
            $list = $this->General->fetch_records('v_pohead');
        }
        // lastq();

        $data = array();
        $no =  $_POST['start'];

        foreach ($list as $results) {
            if ($results->kadiv_approv == 1) {
                $kadivApprov = labelWarna('success', 'Sudah Diapprov Kadiv');
            }else if ($results->kadiv_approv == 2) {
                $kadivApprov = labelWarna('warning', 'Approval Ditolak Kadiv');
            } else {
                $kadivApprov = labelWarna('danger', 'Belum diapprov Kadiv');
            }

            if ($results->wakadiv_approv == 1) {
                $wakadiv_approv = labelWarna('success', 'Sudah diapprov Wakadiv');
            }else if($results->wakadiv_approv == 2) {
                $wakadiv_approv = labelWarna('warning', 'Approval Ditolak Wakadiv');
            } else {
                $wakadiv_approv = labelWarna('danger', 'Belum diapprov Wakadiv');
            }

            $Approv = $kadivApprov . "<br>" . $wakadiv_approv;

            if ($this->session->userdata('user_login')['id_sgroup'] == 2 || $this->session->userdata('user_login')['id_sgroup'] == 8) {
                $button = "<a href='" . base_url('Purchaseorder/viewPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";
            } else {
                $button = "<a href='" . base_url('Purchaseorder/editPurchaseorder/' . $results->id_po) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePurchaseorder($results->id_po)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";
            }

            $tanggal_now = new DateTime(date('Y-m-d'));
            $tanggal_pemenuhan = new DateTime(date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po))));
            $jumlah_hari = $tanggal_now->diff($tanggal_pemenuhan);

            if ($results->wakadiv_approv == 1 && $results->kadiv_approv == 1) {
                if ($results->status_po == 1) {
                    $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                } else if ($jumlah_hari->format("%R") == '+' and $jumlah_hari->format("%a") > '0') {
                    $sla = '<a title="Proses ' . abs($jumlah_hari->format("%a") - '0') . ' hari" class="btn fa fa-thumbs-up" style="color:green" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                } else {
                    $sla = '<a title="Terlambat ' . abs($jumlah_hari->format("%a") - '0') . ' Hari!" class="btn fa fa-thumbs-down" style="color:red" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                }
            } else {
                $sla = "-";
            }

            if ($results->status_invoice == 2) {
                $status_invoice = labelWarna("success", "Sudah Bayar");
            } else if ($results->status_invoice == 1) {
                $status_invoice = labelWarna("warning", "Bayar Sebagian");
            } else {
                $status_invoice = labelWarna("danger", "Belum Bayar");
            }

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_po;
            $row[] = $results->tanggal_po;
            $row[] = $results->nama_project;
            $row[] = $results->nama_uker;
            $row[] = $results->nama_vendor;
            $row[] = $results->jenis_pembayaran;
            $row[] = date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po)));
            $row[] = rupiah($results->subtotal);
            $row[] = rupiah($results->subtotal_ppn);
            $row[] = rupiah($results->grand_total);
            $row[] = $results->status_po == 1 ? labelWarna('danger', 'Close') : labelWarna('success', 'Open');
            $row[] = $status_invoice;
            $row[] = $Approv;
            $row[] = $sla;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pohead'),
            "recordsFiltered" => $list,
            "data" => $data,
            // ),
        );

        echo json_encode($output);
    }

    public function tambahPurchaseorder()
    {
        $data = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'currency' => $this->General->fetch_records('v_currency'),
            'project' => $this->General->fetch_records('tbl_project'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNopo' => $this->General->autoNoPo()
        );


        $this->header('Tambah Purchase Order');
        $this->load->view('Purchaseorder/tambahpurchaseorder', $data);
        $this->footer();
    }

    public function simpanPurchaseOrder()
    {
        $config['upload_path']          = './assets/file_po/';
        $config['allowed_types']        = 'jpg|png|pdf|docx|xlsx';

        $this->load->library('upload', $config);

        $file_po = array();

        foreach ($_FILES['file_po']['name'] as $key => $value) {
            $_FILES['images[]']['name'] = $_FILES['file_po']['name'][$key];
            $_FILES['images[]']['type'] = $_FILES['file_po']['type'][$key];
            $_FILES['images[]']['tmp_name'] = $_FILES['file_po']['tmp_name'][$key];
            $_FILES['images[]']['error'] = $_FILES['file_po']['error'][$key];
            $_FILES['images[]']['size'] = $_FILES['file_po']['size'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $file_po[$key] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'File tidak sesuai!');
                redirect('Purchaseorder');
            }
        }

        $hasilFile = implode('|', $file_po);

        $poHead = array(
            'id_uker' => input('id_uker'),
            'id_vendor' => input('id_vendor'),
            'id_project' => input('id_project'),
            'no_po' => input('no_po'),
            'tanggal_po' => input('tanggal_po'),
            'kontak_person_po' => input('kontak_person_po'),
            'nama_kontak_po' => input('nama_kontak_po'),
            'jenis_pembayaran' => input('jenis_pembayaran'),
            'jtempo_pembayaran' => input('jtempo_pembayaran'),
            'jtempo_pemenuhan' => input('jtempo_pemenuhan'),
            'catatan_po' => input('catatan_po'),
            'term_condition' => input('term_condition'),
            'subtotal' => input('subtotal'),
            'subtotal_ppn' => input('subtotal_ppn'),
            'grand_total' => input('grand_total'),
            'file_po' =>  $hasilFile,
            'sisa_bayar' => input('grand_total'),
            'no_ijin_prinsip'   =>  input('no_ijin_prinsip'),
            'po_created_by' => $this->session->userdata('user_login')['username']
        );

        $savePohead = $this->General->insertRecord('tbl_po', $poHead);

        if ($savePohead) {
            $id_po = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_po' => $id_po,
                    'no_urut' => $val,
                    'id_det_currency' => $_POST['id_det_currency'][$key],
                    'qty' => $_POST['qty'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'total_ppn' => $_POST['total_ppn'][$key],
                    'total' => $_POST['total'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'podet_created_by' => $this->session->userdata('user_login')['username']
                );
            }

            $savePoDet = $this->General->insertBatch('tbl_po_det', $result);

            if ($savePoDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Purchaseorder');
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                redirect('Purchaseorder');
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Purchaseorder');
        }
    }

    public function editPurchaseorder($id_po)
    {
        $dataPo = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'currency' => $this->General->fetch_records('v_currency'),
            'project' => $this->General->fetch_records('tbl_project'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'po' => $this->General->getRow('v_pohead', ['id_po' => $id_po])
        );


        $this->header('Edit Purchase Order');
        $this->load->view('Purchaseorder/editpurchaseorder', $dataPo);
        $this->footer();
    }

    public function updatePurchaseorder($id_po)
    {
        $config['upload_path']          = './assets/file_po/';
        $config['allowed_types']        = 'jpg|png|pdf|docx|xlsx';

        $this->load->library('upload', $config);

        $file_po = array();

        foreach ($_FILES['file_po']['name'] as $key => $value) {
            $_FILES['images[]']['name'] = $_FILES['file_po']['name'][$key];
            $_FILES['images[]']['type'] = $_FILES['file_po']['type'][$key];
            $_FILES['images[]']['tmp_name'] = $_FILES['file_po']['tmp_name'][$key];
            $_FILES['images[]']['error'] = $_FILES['file_po']['error'][$key];
            $_FILES['images[]']['size'] = $_FILES['file_po']['size'][$key];

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $file_po[$key] = $this->upload->data('file_name');
            }
        }

        $poHead = array(
            'id_uker' => input('id_uker'),
            'id_vendor' => input('id_vendor'),
            'id_project' => input('id_project'),
            'tanggal_po' => input('tanggal_po'),
            'kontak_person_po' => input('kontak_person_po'),
            'nama_kontak_po' => input('nama_kontak_po'),
            'jenis_pembayaran' => input('jenis_pembayaran'),
            'jtempo_pembayaran' => input('jtempo_pembayaran'),
            'jtempo_pemenuhan' => input('jtempo_pemenuhan'),
            'catatan_po' => input('catatan_po'),
            'term_condition' => input('term_condition'),
            'subtotal' => input('subtotal'),
            'subtotal_ppn' => input('subtotal_ppn'),
            'grand_total' => input('grand_total'),
            'wakadiv_approv' => 0,
            'kadiv_approv' => 0,
            'po_updated_date' => date('Y-m-d'),
            'po_updated_by' => $this->session->userdata('user_login')['username']
        );

        if (count($file_po) > 0) {
            $fileOld = $this->General->getRow("tbl_po", ['id_po' => $id_po]);
            $file = explode("|", $fileOld->file_po);
            foreach ($file as $fl) {
                HapusFileOld('assets/file_po/' . $fl);
            }

            $hasilFile = implode('|', $file_po); // untuk row izin prinsip

            $poHead['file_po'] = $hasilFile;
        }

        $updatePohead = $this->General->update_record($poHead, ['id_po' => $id_po], 'tbl_po');

        if ($updatePohead) {
            $this->General->deleteData('tbl_po_det', ['id_po' => $id_po]);

            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_po' => $id_po,
                    'no_urut' => $val,
                    'id_det_currency' => $_POST['id_det_currency'][$key],
                    'qty' => $_POST['qty'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'total_ppn' => $_POST['total_ppn'][$key],
                    'total' => $_POST['total'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'podet_updated_date' => date('Y-m-d'),
                    'podet_updated_by' => $this->session->userdata('user_login')['username']
                );
            }

            $savePoDet = $this->General->insertBatch('tbl_po_det', $result);

            if ($savePoDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Purchaseorder');
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Purchaseorder');
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Purchaseorder');
        }
    }

    public function viewPurchaseorder($id_po)
    {
        $dataPo = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'project' => $this->General->fetch_records('tbl_project'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'currency' => $this->General->fetch_records('v_currency'),
            'po' => $this->General->getRow('v_pohead', ['id_po' => $id_po])
        );


        $this->header('View Purchase Order');
        $this->load->view('Purchaseorder/viewpurchaseorder', $dataPo);
        $this->footer();
    }

    public function approvPurchaseorder($id_po)
    {
        $dataPo = $this->General->getRow('tbl_po', ['id_po' => $id_po]);

        // Ini Wakadiv
        if ($this->session->userdata('user_login')['id_sgroup'] == 8) {
            $data = array(
                'tanggal_approv_wakadiv' => date('Y-m-d'),
                'wakadiv_approv' => 1,
            );

            $wakaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');
            
            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil di approv!');
                redirect('Purchaseorder');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Purchaseorder');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 2) { // Ini Kadiv
            if($dataPo->grand_total<50000000){
                if ($dataPo->wakadiv_approv == 1) {
                    $data = array(
                        'tanggal_approv_kadiv' => date('Y-m-d'),
                        'kadiv_approv' => 1,
                    );
    
                    $kaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');
    
                    if ($kaDiv) {
                        LogActivity($this->db->last_query());
                        $this->session->set_flashdata('success', 'Po berhasil di approv!');
                        redirect('Purchaseorder');
                    } else {
                        $this->session->set_flashdata('error', 'Po gagal di approv!');
                        redirect('Purchaseorder');
                    }
                } else {
                    $this->session->set_flashdata('info', 'Silahkan tunggu wakadiv approvel terlebih dahulu!');
                    redirect('Purchaseorder');
                }
            }
            else{
                $data = array(
                    'tanggal_approv_kadiv' => date('Y-m-d'),
                    'kadiv_approv' => 1,
                );

                $kaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');

                if ($kaDiv) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Po berhasil di approv!');
                    redirect('Purchaseorder');
                } else {
                    $this->session->set_flashdata('error', 'Po gagal di approv!');
                    redirect('Purchaseorder');
                }
            }
            
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 24){
            if ($dataPo->kadiv_approv == 1){
                $data = array(
                    'tanggal_approv_direksi' => date('Y-m-d'),
                    'direksi_approv' => 1,
                );
    
                $wakaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');
                
                if ($wakaDiv) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Po berhasil di approv!');
                    redirect('Purchaseorder');
                } else {
                    $this->session->set_flashdata('error', 'Po gagal di approv!');
                    redirect('Purchaseorder');
                }
            } else {
                $this->session->set_flashdata('info', 'Silahkan tunggu kadiv approvel terlebih dahulu!');
                redirect('Purchaseorder');
            }
        }
    }

    public function tolak_approval($id_po)
    {
        $dataPo = $this->General->getRow('tbl_po', ['id_po' =>$id_po]);

        // Ini Wakadiv
        if ($this->session->userdata('user_login')['id_sgroup'] == 8) {
            $data = array(
                'wakadiv_approv' => 2
            );

            $wakaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');

            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'PO Berhasil Ditolak.');
                // var_dump($id_po);
                redirect('Purchaseorder');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Purchaseorder');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 2) { // Ini Kadiv
            if ($dataPo->wakadiv_approv == 1) {
                $data = array(
                    'kadiv_approv' => 2
                );

                $kaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');

                if ($kaDiv) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Po berhasil di approv!');
                    // var_dump($id_po);
                    redirect('Purchaseorder');
                } else {
                    $this->session->set_flashdata('error', 'Po gagal di approv!');
                    redirect('Purchaseorder');
                }
            } else {
                $this->session->set_flashdata('info', 'Silahkan tunggu wakadiv approvel terlebih dahulu!');
                redirect('Purchaseorder');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 24){
            $data = array(
                'tanggal_approv_direksi' => date('Y-m-d'),
                'direksi_approv' => 2,
            );

            $wakaDiv = $this->General->update_record($data, ['id_po' => $id_po], 'tbl_po');
            
            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil ditolak!');
                redirect('Purchaseorder');
            } else {
                $this->session->set_flashdata('error', 'Po gagal ditolak!');
                redirect('Purchaseorder');
            }
        }
    }

    public function deletePurchaseOrder()
    {
        $deletePurchaseOrder = $this->General->deleteData('tbl_po', ['id_po' => input('id_po')]);

        if ($deletePurchaseOrder) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }

    public function currencyPodet()
    {
        $rupiah = 0;

        if (input("id_det_currency")) {
            $qrupiah = $this->General->getRow('v_currency', ['id_det_currency' => input('id_det_currency')]);
            $rupiah += $qrupiah->rupiah;
        } else {
            $rupiah += 0;
        }

        echo json_encode($rupiah);
    }
}
