<?php

class Pemenuhanbartek extends MY_Controller
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
            'user' => $this->General->fetch_records('tbl_user')
        );
        $this->header('List Pemenuhan Barang Untuk Teknisi');
        $this->load->view('Pemenuhanbartek/list_pemenuhanbartek', $data);
        $this->footer();
    }

    public function filter()
    {
        $id_user = input('id_user');
        $status_permintaan = input('status_permintaan');
        $startdate = input('startdate');
        $enddate = input('enddate');

        if ($startdate && $enddate && $status_permintaan != 'All' && $id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $id_user . "' AND status_pertek = '" . $status_permintaan . "' AND tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate  && $status_permintaan == 'All' && $id_user == 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate && $id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND id_user = '" . $id_user . "'");
        } else if ($startdate && $enddate && $status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE tanggal_pemenuhan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND status_pertek = '" . $status_permintaan . "'");
        } else if ($status_permintaan != 'All' && $id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pertek = '" . $id_user . "' AND id_user = '" . $id_user . "'");
        } else if ($status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pertek = '" . $id_user . "'");
        } else if ($id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $status_permintaan . "'");
        } else {
            $list = $this->General->fetch_records('v_pertekhed');
        }

        // lastq();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            if ($results->leader_approvel == 1) {
                $leader_approvel = labelWarna('success', 'Leader Approv');
            } else {
                $leader_approvel = labelWarna('danger', 'Leader Non Approv');
            }

            $Approv = "<p>$leader_approvel</p>";

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : $results->tanggal_pemenuhan;
            $row[] = $results->nomor_pertek;
            $row[] = $results->username;
            $row[] = $results->tid;
            $row[] = $results->keterangan;
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : labelWarna("success", "Sudah di Penuhi");
            $row[] = "<a href='" . base_url("Pemenuhanbartek/editPemenuhanbartek/" . $results->id_pertek) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
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

    public function listPemenuhanBarTek()
    {
        $list = $this->Serverside->_serverSide(
            'v_pertekhed',
            ['no', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan'],
            ['nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan'],
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
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : $results->tanggal_pemenuhan;
            $row[] = $results->nomor_pertek;
            $row[] = $results->username;
            $row[] = $results->tid;
            $row[] = $results->keterangan;
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : labelWarna("success", "Sudah di Penuhi");
            $row[] = "<a href='" . base_url("Pemenuhanbartek/editPemenuhanbartek/" . $results->id_pertek) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pertekhed',
                ['no', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan'],
                ['nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function editPemenuhanbartek($id_pertek)
    {
        if ($this->session->userdata("user_login")['id_uker'] == 1) {
            $Teknisi = ['id_sgroup'];
        } else {
            $Teknisi = ['id_sgroup' => 10, 'id_uker' => $this->session->userdata("user_login")['id_uker']];
        }

        $offsetDet = $this->General->getRow('v_pertekdet', ['id_pertek' => $id_pertek]);

        $data = array(
            'permintaan' => $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_pertek]),
            'perTek' => $this->General->getRow('v_pertekhed', ['id_pertek' => $id_pertek]), // <-- ini nanti coba di hapus
            'perTekDet' => $this->General->getRow('v_pertekdet', ['id_pertek' => $id_pertek]),
            'namaTeknisi' => $this->General->fetch_records('v_user', $Teknisi),
            'namaBarang' => $this->General->fetch_records('tbl_barang'),
            'tid' => $this->General->fetch_records('tbl_project'),
            // 'nm_brg' => $this->General->fetch_records('v_caribarang',$offsetDet->no_urut)
            'nm_brg' => $this->General->getRow('v_caribarang', ['no_urut' => $offsetDet->no_urut]),
            'totalHarga' => $this->General->fetch_CoustomQuery("SELECT SUM(qty*harga_satuan) as subtotal FROM `tbl_pertek_det` WHERE id_pertek=" . $id_pertek . ""),
            'ppkmmode' => $this->General->fetch_CoustomQuery("SELECT SUM(totalppn) as subtotal FROM `tbl_pertek_det` WHERE id_pertek=" . $id_pertek . ""),
            'grandservant' => $this->General->fetch_CoustomQuery("SELECT SUM(qty*harga_satuan)+SUM(totalppn) as subtotal FROM `tbl_pertek_det` WHERE id_pertek=" . $id_pertek . "")

        );
        // cetak_die($data['totalppn'][0]->subtotal);

        $this->header('Edit Pemenuhan Barang Untuk Teknisi');
        $this->load->view('Pemenuhanbartek/edit_pemenuhanbartek', $data);
        $this->footer();
    }

    public function caribarang()
    {
        $no_urut = input('no_urut');
        $where = ['no_urut' => $no_urut];


        $nm_brg = $this->General->fetch_records('v_caribarang', $where);

        if ($nm_brg) {
            $brg = array(

                'no_urut' => $nm_brg[0]->no_urut,
                'nama_merek' => $nm_brg[0]->nama_merek,
                'tipe_barang' => $nm_brg[0]->tipe_barang,
                // 'kode_barang' => $nm_brg[0]->kode_barang,
                // 'nama_barang' => $nm_brg[0]->nama_barang,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }

    public function updatePemenuhanbartek($id_pertek)
    {
        $pembartekHead = array(
            'tanggal_pemenuhan' => input('tglPemenuhan'),
            'status_pertek' => 1,
            'pertek_updated_date' => $this->session->userdata('user_login')['id_uker']
        );

        // cetak($pembartekHead);

        $updatePembartekHead = $this->General->update_record($pembartekHead, ['id_pertek' => $id_pertek], 'tbl_pertek');
        // cetak($savePemlocHead);
        // lastq();

        if ($updatePembartekHead) {
            $this->General->deleteData('tbl_pertek_det', ['id_pertek' => $id_pertek]);
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pertek' => $id_pertek,
                    'no_urut' => $val,
                    'no_sn_new' => $_POST['no_sn'][$key],
                    'harga_satuan' => $_POST['harga_satuan'][$key],
                    'totalppn' => $_POST['total_ppn'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'pertekdet_created_date' => $this->session->userdata('user_login')['id_uker']
                );
                $no_sn = $_POST['no_sn'][$key];
                $offset_user = input('namaTeknisi');
                $offset_project = input('tid');
                $getUsername = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_user WHERE id_user = '" . $offset_user . "'");
                $getProject = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_project WHERE id_project = '" . $offset_project . "'");
                $getTransaksi = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_transaksi WHERE no_sn = '" . $no_sn . "' ORDER BY tran_created_date DESC LIMIT 1");
                $trans[] = array(
                    'tgl_pemakai_barang' => input('tglPemenuhan'),
                    'nama_teknisi' => $getUsername[0]->username,
                    'tid' => $getProject[0]->tid,
                    'catatan_pemakaian' => $_POST['keterangan'][$key],
                    'status_pakai' => 1
                );
                $this->General->update_record($trans[0], ['id_tran' => $getTransaksi[0]->id_tran], 'tbl_transaksi');
            }

            $updatePembartek = $this->General->insertBatch('tbl_pertek_det', $result);

            if ($updatePembartek) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Pemenuhanbartek');
            } else {
                var_dump($result);
            }
        } else {
            $this->session->set_flashdata('error', 'Record all added Failed..!');
            redirect('Pemenuhanbartek');
        }
    }
}
