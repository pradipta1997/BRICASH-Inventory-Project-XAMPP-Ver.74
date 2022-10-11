<?php

class Pembelianlocal extends MY_Controller
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
            'subTotal' => $this->General->fetch_CoustomQuery("SELECT sum(sub_total) as GrandTotalSub FROM v_pembelian_local"),
            'nilaiPajak' => $this->General->fetch_CoustomQuery("SELECT sum(nilai_pajak) as GrandTotalNilaiPajak FROM v_pembelian_local"),
            'total' => $this->General->fetch_CoustomQuery("SELECT sum(total) as GrandTotal FROM v_pembelian_local")
        );

        $this->header('List Pembelian Local');
        $this->load->view('Pembelianlocal/list_pembelianlocal', $data);
        $this->footer();
    }


    public function listPembelianLocal()
    {
        $list = $this->Serverside->_serverSide(
            'v_pembelian_local',
            ['no', 'nomor_pembelian', 'tanggal_pembelian', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'sub_total', 'nilai_pajak', 'total', 'approvel'], //Filter
            ['nomor_pembelian', 'tanggal_pembelian', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'sub_total', 'nilai_pajak', 'total', 'approvel'], //Searching
            ['nomor_pembelian' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if ($results->approvel == 0) {

                //APPROVEL
                if ($results->approvel == 1) {
                    $Approv = labelWarna('success', 'Approv');
                } else {
                    $Approv = labelWarna('danger', 'Non-Approv');
                }

                $Approvel = "<p>$Approv</p>";

                //PEMBAGIAN BUTTON
                if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                    $button = "<a href='" . base_url('Pembelianlocal/viewPembelianlocal/' . $results->id_pembelian) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                    <i class='fa fa-pencil-square-o'></i>
                                </a>";
                } else if ($this->session->userdata('user_login')['id_sgroup'] == 1) {
                    $button = "<a href='" . base_url('Pembelianlocal/editPembelianlocal/' . $results->id_pembelian) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                                </a>

                                <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePembelianLocal($results->id_pembelian)'>
                                    <i class='fa fa-trash' aria-hidden='true'></i>
                                </button>";
                } else {

                    $button = "";
                }

                $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->nomor_pembelian;
                $row[] = $results->tanggal_pembelian;
                $row[] = $results->nama_uker;
                $row[] = $results->nama_vendor;
                $row[] = $results->jenis_pembayaran;
                $row[] = $results->tempo_pembayaran;
                $row[] = rupiah($results->sub_total);
                $row[] = rupiah($results->nilai_pajak);
                $row[] = rupiah($results->total);
                $row[] = $Approvel;
                $row[] = $button;


                // $row[] = "<a href='" . base_url("Pembelianlocal/editPembelianlocal/" . $results->id_pembelian) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                //         <i class='fa fa-pencil-square-o'></i>
                //     </a>
                //     <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePembelianLocal($results->id_pembelian)'>
                //         <i class='fa fa-trash' aria-hidden='true'></i>
                //     </button>";

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pembelian_local'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pembelian_local',
                ['no', 'nomor_pembelian', 'tanggal_pembelian', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'sub_total', 'nilai_pajak', 'total', 'approvel'], //Filter
                ['nomor_pembelian', 'tanggal_pembelian', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'tempo_pembayaran', 'sub_total', 'nilai_pajak', 'total', 'approvel'] //Searching
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }


    public function tambahPembelianlocal()
    {
        $data = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'jenisPembayaran' => $this->General->fetch_records('tbl_po'),
            'currency' => $this->General->fetch_records('v_currency', ['id_currency' => 1]),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPemLocal' => $this->General->autoNoPemLocal()
        );

        $this->header('Tambah Pembelian Local');
        $this->load->view('Pembelianlocal/tambah_pembelianlocal', $data);
        $this->footer();
    }


    public function simpanPembelianLocal()
    {

        $pemlocHead = array(
            'id_uker' => input('id_uker'),
            'id_vendor' => input('id_vendor'),
            'jenis_pembayaran' => input('jenis_pembayaran'),
            'nomor_pembelian' => input('nomor_pembelian'),
            'tanggal_pembelian' => input('tgl_pembelian'),
            'tempo_pembayaran' => input('tempo_pembayaran'),
            'sub_total' => input('subtotal'),
            'nilai_pajak' => input('subtotal_ppn'),
            'total' => input('grand_total'),
            'approvel' => 0,
            'pembelian_created_by' => $this->session->userdata('user_login')['id_uker']
        );

        cetak($pemlocHead);

        $savePemlocHead = $this->General->insertRecord('tbl_pembelian', $pemlocHead);
        // cetak($savePemlocHead);
        // lastq();

        if ($savePemlocHead) {
            $id_pembelian = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pembelian' => $id_pembelian,
                    'no_urut' => $val,
                    // 'id_det_currency' => $val,
                    'id_det_currency' => 1,
                    'qty' => $_POST['qty'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'total_ppn' => $_POST['total_ppn'][$key],
                    'total' => $_POST['total'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'pembelian_det_created_by' => $this->session->userdata('user_login')['id_uker']
                );
            }

            $savePemlocDet = $this->General->insertBatch('tbl_pembelian_det', $result);

            if ($savePemlocDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Pembelianlocal');
            } else {
                $this->session->set_flashdata('error', 'Record Pemlocdet added Failed..!');
                redirect('Pembelianlocal');
            }
        } else {
            $this->session->set_flashdata('error', 'Record all added Failed..!');
            redirect('Pembelianlocal');
        }
    }


    public function editPembelianlocal($id_pembelian)
    {
        $data = array(
            'pemLocal' => $this->General->getRow('tbl_pembelian', ['id_pembelian' => $id_pembelian]),
            'pembelian' => $this->General->fetch_records('tbl_pembelian'),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'jenisPembayaran' => $this->General->fetch_records('tbl_po'),
            'currency' => $this->General->fetch_records('v_currency', ['id_currency']), // => 1
            'barang' => $this->General->fetch_records('tbl_barang')
        );

        $this->header('Edit Pembelian Local');
        $this->load->view('Pembelianlocal/edit_pembelianlocal', $data);
        $this->footer();
    }



    public function updatePembelianlocal($id_pembelian)
    {
        $pembelianLocalHead = array(
            'tanggal_pembelian' => input('tanggal_pembelian'),
            'id_uker' => input('id_uker'),
            'id_vendor' => input('nama_vendor'),
            'jenis_pembayaran' => input('jenis_pembayaran'),
            'tempo_pembayaran' => input('tempo_pembayaran'),
            'sub_total' => input('sub_total'),
            'nilai_pajak' => input('nilai_pajak'),
            'total' => input('total'),
            'pembelian_updated_date' => date('Y-m-d H:i:s'),
            'pembelian_updated_by' => $this->session->userdata('user_login')['id_uker']
        );

        // cetak_die($pembelianLocalHead);

        $updatePemLoc = $this->General->update_record($pembelianLocalHead, ['id_pembelian' => $id_pembelian], 'tbl_pembelian');

        // lastq();

        if ($updatePemLoc) {
            $this->General->deleteData('tbl_pembelian_det', ['id_pembelian' => $id_pembelian]);

            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pembelian' => $id_pembelian,
                    'no_urut' => $val,
                    'id_det_currency' => $_POST['id_det_currency'][$key],
                    'qty' => $_POST['qty'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'total_ppn' => $_POST['total_ppn'][$key],
                    'total' => $_POST['total'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'pembelian_det_updated_date' => date('Y-m-d'),
                    'pembelian_det_updated_by' => $this->session->userdata('user_login')['id_uker']
                );
            }

            $savePemLocDet = $this->General->insertBatch('tbl_pembelian_det', $result);

            // lastq();

            if ($savePemLocDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Pembelianlocal');
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..! (2)');
                redirect('Pembelianlocal');
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..! (1)');
            redirect('Pembelianlocal');
        }
    }

    public function viewPembelianlocal($id_pembelian)
    {
        $data = array(
            'pembelian' => $this->General->getRow("v_pembelian_local", ['id_pembelian' => $id_pembelian])
        );

        $this->header('View Pembelian Local');
        $this->load->view('Pembelianlocal/view_pembelianlocal', $data);
        $this->footer();
    }

    public function approvPembelianlocal($id_pembelian)
    {
        $this->General->getRow('tbl_pembelian', ['id_pembelian' => $id_pembelian]);
        $this->session->userdata('user_login')['id_sgroup'] == 14;

        $data = array(
            'tanggal_approve' => date('Y-m-d'),
            'approvel' => 1,
        );

        $pinca = $this->General->update_record($data, ['id_pembelian' => $id_pembelian], 'tbl_pembelian');

        if ($pinca) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Pembelian Local berhasil di approve!');
            redirect('Pembelianlocal');
        } else {
            $this->session->set_flashdata('error', 'Pembelian Local gagal di approve!');
            redirect('Pembelianlocal');
        }
    }





    public function deletePembelianLocal()
    {
        $deletePemLoc = $this->General->deleteData('tbl_pembelian', ['id_pembelian' => input('id_pembelian')]);

        if ($deletePemLoc) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }


    // public function currencyPemlocdet()
    // {
    //     $rupiah = 0;

    //     if (input("id_det_currency")) {
    //         $qrupiah = $this->General->getRow('v_currency', ['id_det_currency' => input('id_det_currency')]);
    //         $rupiah += $qrupiah->rupiah;
    //     } else {
    //         $rupiah += 0;
    //     }

    //     echo json_encode($rupiah);
    // }
}
