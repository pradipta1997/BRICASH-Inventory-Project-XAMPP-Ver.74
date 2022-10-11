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

        $this->header('List Pembelian Local');
        $this->load->view('Pembelianlocal/list_pembelianlocal');
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

                if ($results->approvel == 1) {
                    $Approv = labelWarna('success', 'Approv');
                } else {
                    $Approv = labelWarna('danger', 'Non-Approv');
                }

                $Approvel = "<p>$Approv</p>";

                $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->nomor_pembelian;
                $row[] = $results->tanggal_pembelian;
                $row[] = $results->nama_uker;
                $row[] = $results->nama_vendor;
                $row[] = $results->jenis_pembayaran;
                $row[] = date('Y-m-d', strtotime('+' . $results->tempo_pembayaran . ' days', strtotime($results->tanggal_pembelian)));
                $row[] = rupiah($results->sub_total);
                $row[] = rupiah($results->nilai_pajak);
                $row[] = rupiah($results->total);
                $row[] = $Approvel;
                $row[] = "<a href='" . base_url("Pembelianlocal/editPembelianlocal/" . $results->id_pembelian) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePembelianlocal($results->id_pembelian)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

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
            'pembelian' => $this->General->fetch_records('tbl_pembelian'),
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
            'id_po' => input('id_po'),
            'nopem' => input('nomor_pembelian'),
            'tanggalpem' => input('tanggal_pembelian'),
            'tempopem' => input('tempo_pembayaran'),
            'subtotal' => input('sub_total'),
            'nilaipajak' => input('nilai_pajak'),
            'total' => input('total'),
            'approvel' => 0,
            'pembelian_created_by' => $this->session->userdata('user_login')['username']
        );

        $savePemlocHead = $this->General->insertRecord('tbl_pembelian', $pemlocHead);

        if ($savePemlocHead) {
            $id_pembelian = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pembelian' => $id_pembelian,
                    'no_urut' => $val,
                    'id_det_currency' => $val,
                    'qty' => $_POST['qty'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'total_ppn' => $_POST['total_ppn'][$key],
                    'total' => $_POST['total'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'pembelian_det_created_by' => $this->session->userdata('user_login')['username']
                );
            }

            $savePemlocDet = $this->General->insertBatch('tbl_pembelian_det', $result);

            if ($savePemlocDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Pembelianlocal');
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                redirect('Pembelianlocal');
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
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
            'currency' => $this->General->fetch_records('v_currency', ['id_currency' => 1]),
            'barang' => $this->General->fetch_records('tbl_barang')
        );

        $this->header('Edit Pembelian Local');
        $this->load->view('Pembelianlocal/edit_pembelianlocal', $data);
        $this->footer();
    }

    public function currencyPemlocdet()
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
