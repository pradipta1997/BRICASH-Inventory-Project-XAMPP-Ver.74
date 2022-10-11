<?php
class Pempengsparekancab extends MY_Controller
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

        $this->header('Pembukuan Penggunaan Sparepart Kantor Cabang');
        $this->load->view('Pempengsparekancab/list_pempengsparekancab');
        $this->footer();
    }

    public function filter()
    {
        $status_pembukuan = input('status_pembukuan');
        $startdate = input('startdate');
        $enddate = input('enddate');

        if ($startdate && $enddate && $status_pembukuan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pembukuan = '" . $status_pembukuan . "' AND tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE  tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($status_pembukuan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pembukuan = '" . $status_pembukuan . "'");
        } else {
            $list = $this->General->fetch_records('v_pertekhed');
        }

        // lastq();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_uker;
            $row[] = $results->tanggal_pemenuhan;
            $harga = array(
                'price' => $this->General->fetch_CoustomQuery("SELECT SUM(qty*harga_satuan+totalppn) as harga FROM `tbl_pertek_det` WHERE id_pertek = $results->id_pertek")
            );
            $pengirimFinale = $harga['price'][0]->harga;
            $row[] = $pengirimFinale;
            if ($results->status_pembukuan == 0) {
                $row[] = labelWarna("danger", "Belum dibukukan");
                $row[] = labelWarna("danger", "Belum dibukukan");
                $row[] = labelWarna("danger", "Belum dibukukan");
            } else {
                $row[] = labelWarna("success", "Sudah dibukukan");
                $row[] = $results->no_voucher;
                $row[] = $results->tanggal_pembukuan;
            }
            $row[] = "<a href='" . base_url("Pempengsparekancab/edit_pempeng/" . $results->id_pertek) . "' class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function listPempengsparekancab()
    {
        $list = $this->Serverside->_serverSide(
            'v_pertekhed',
            ['no', 'tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
            ['tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
            ['nomor_pertek' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_uker;
            $row[] = $results->tanggal_pemenuhan;
            $harga = array(
                'price' => $this->General->fetch_CoustomQuery("SELECT SUM(qty*harga_satuan+totalppn) as harga FROM `tbl_pertek_det` WHERE id_pertek = $results->id_pertek")
            );
            $pengirimFinale = $harga['price'][0]->harga;
            $row[] = rupiah($pengirimFinale);
            if ($results->status_pembukuan == 0) {
                $row[] = labelWarna("danger", "Belum dibukukan");
                $row[] = labelWarna("danger", "Belum dibukukan");
                $row[] = labelWarna("danger", "Belum dibukukan");
            } else {
                $row[] = labelWarna("success", "Sudah dibukukan");
                $row[] = $results->no_voucher;
                $row[] = $results->tanggal_pembukuan;
            }
            $row[] = "<a href='" . base_url("Pempengsparekancab/edit_pempeng/" . $results->id_pertek) . "' class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pertekhed',
                ['no', 'tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
                ['tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function edit_pempeng($id_pertek)
    {
        // if ($this->session->userdata("user_login")['id_uker'] == 1) {
        //     $Uker = ['id_sgroup'];
        // } else {
        //     $Uker = ['id_sgroup' => 10, 'id_uker' => $this->session->userdata("user_login")['id_uker']];
        // }

        $data = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'gen'   => $this->General->getRow('v_pertekhed',  ['id_pertek' => $id_pertek]),
            'namaBarang' => $this->General->fetch_records('tbl_barang'),
            'gbarang' => $this->General->fetch_records('tbl_gbarang'),
            'sgbarang' => $this->General->fetch_records('tbl_sgbarang'),
            'merek' => $this->General->fetch_records('tbl_merek'),
            'tipeBarang' => $this->General->fetch_records('tbl_tipe_barang'),
        );


        $this->header('Edit Pembukuan Penggunaan Sparepart Kantor Cabang');
        $this->load->view('Pempengsparekancab/edit_pempengsparekancab', $data);
        $this->footer();
    }

    public function updatePembukuan($id_pertek)
    {
        $pembukuanHead = array(
            'tanggal_pembukuan' => input('tanggal_pembukuan'),
            'no_voucher' => input('no_voucher'),
            'status_pembukuan' => 1
        );

        $vch = input('no_voucher');

        $updatePembukuanHead = $this->General->update_record($pembukuanHead, ['id_pertek' => $id_pertek], 'tbl_pertek');


        if ($updatePembukuanHead) {
            foreach ($_POST['no_sn'] as $key => $val) {
                $no_sn = $val;
                $getStock = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_stock WHERE no_sn = '" . $no_sn . "'");
                $stock[] = array(
                    'no_voucher' => $vch,
                    'flag_pembukuan' => 1
                );
                // var_dump($stock);
                $this->General->update_record($stock[0], ['no_sn' => $getStock[0]->no_sn], 'tbl_stock');
            }
            $pembukuanDet = array(
                'flag_pembukuan' => 1
            );
            $updatePembartek = $this->General->update_record($pembukuanDet, ['id_pertek' => $id_pertek], 'tbl_pertek_det');

            if ($updatePembartek) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Pempengsparekancab');
            } else {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('error', 'Record all added Failed..!');
            }
        } else {
            $this->session->set_flashdata('error', 'Record all added Failed..!');
            redirect('Pempengsparekancab');
        }
    }
}
