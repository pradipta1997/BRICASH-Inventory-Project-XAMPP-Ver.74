<?php
class Laporankeuangan extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    // ----------------------------------------------------------------

    public function Pengbukbar()
    {
        $data = array(
            'grandTotal' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) AS GrandTotal FROM v_perbaikankcsp WHERE status_perbaikan = '2'")
        );

        $this->header('Laporan Penghapus Bukuan Barang');
        $this->load->view('Laporankeuangan/lappengbukbar', $data);
        $this->footer();
    }

    public function listLapPenghapusbukbar()
    {

        $list = $this->Serverside->_serverSide(
            'v_perbaikankcsp',
            ['no', 'no_permintaan', 'tanggal_perbaikan', 'harga_barang'],
            ['no_permintaan', 'tanggal_perbaikan', 'harga_barang'],
            ['no_permintaan' => 'asc'],
            ['status_perbaikan' => '2'],
            'data'
        );
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            $row[] = $results->tanggal_perbaikan;
            $row[] = $results->nama_barang;
            $row[] = "1";
            $row[] = rupiah($results->harga_barang);
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah di Status PH") : labelWarna("danger", "Belum di Status PH");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "<a href='" . base_url("Laporankeuangan/detailPenghapusbukber/" . $results->id_perbaikankcsp) . "' class='btn btn-primary btn-sm' " . getEditperm() . ">
                        <i class='fa fa-eye'></i>
                    </a>";



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_perbaikankcsp'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_perbaikankcsp',
                ['no', 'no_permintaan', 'tanggal_perbaikan', 'harga_barang'],
                ['no_permintaan', 'tanggal_perbaikan', 'harga_barang'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailPenghapusbukber()
    {
        $data = array(
            'grandTotal' => $this->General->fetch_CoustomQuery('SELECT sum(harga_barang) AS GrandTotal FROM v_perbaikankcsp')
        );

        $this->header('Laporan Detail Penghapus Bukuan Barang');
        $this->load->view('Laporankeuangan/lappengbukbar_det', $data);
        $this->footer();
    }

    public function listLapPenghapusbukbarDet()
    {
        $list = $this->Serverside->_serverSide(
            'v_perbaikankcsp',
            ['no', 'tanggal_perbaikan', 'no_sn', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'harga_barang', 'kondisi_barang', 'catatan_perbaikan'],
            ['tanggal_perbaikan', 'no_sn', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'harga_barang', 'kondisi_barang', 'catatan_perbaikan'],
            ['no_sn' => 'asc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tanggal_perbaikan;
            $row[] = $results->no_sn;
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->kode_barang;
            $row[] = $results->nama_barang;
            $row[] = $results->kondisi_barang == 1 ? labelWarna("success", "Bagus") : labelWarna("danger", "Rusak");
            $row[] = rupiah($results->harga_barang);
            $row[] = $results->catatan_perbaikan;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_perbaikankcsp'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_perbaikankcsp',
                ['no', 'tanggal_perbaikan', 'no_sn', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'harga_barang', 'kondisi_barang', 'catatan_perbaikan'],
                ['tanggal_perbaikan', 'no_sn', 'nama_gbarang', 'nama_sgbarang', 'nama_merek', 'tipe_barang', 'kode_barang', 'nama_barang', 'harga_barang', 'kondisi_barang', 'catatan_perbaikan'],
            ),

            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filterLappengbukbar()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        // cetak_die($startdate);
        if ($startdate && $enddate != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_perbaikankcsp WHERE  tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp WHERE tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else {
            $list = $this->General->fetch_records('v_perbaikankcsp');
        }
        // lastq();

        $data = array();
        $no = 0;

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            $row[] = $results->tanggal_perbaikan;
            $row[] = $results->nama_barang;
            $row[] = "1";
            $row[] = rupiah($results->harga_barang);
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah di Status PH") : labelWarna("danger", "Belum di Status PH");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "<a href='" . base_url("Laporankeuangan/detailPenghapusbukber/" . $results->id_perbaikankcsp) . "' class='btn btn-primary btn-sm' " . getEditperm() . ">
                        <i class='fa fa-eye'></i>
                    </a>";



            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_perbaikankcsp'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    // ----------------------------------------------------------------

    public function detailMonpengspare()
    {

        $this->header('Laporan Detail Pembukuan Pembebanan Sparepart');
        $this->load->view('Laporankeuangan/lappempemspare_det');
        $this->footer();
    }

    public function detailPersediaan($id_pengiriman)
    {
        $data = array(
            'pengiriman' => $this->General->getRow('tbl_pengiriman_barang', ['id_pengiriman' => $id_pengiriman]),
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'ekspedisi' => $this->General->fetch_records('tbl_ekpedisi'),
            'service' => $this->General->fetch_records('tbl_layanan_ekspedisi'),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        $this->header('Laporan Detail Pembukuan Persediaan');
        $this->load->view('Laporankeuangan/lappemper_det', $data);
        $this->footer();
    }

    // ----------------------------------------------------------------

    public function Pemper()
    {
        $data = array(
            'uker' => $this->General->fetch_records("tbl_unit_kerja"),
            'totalHarga' => $this->General->fetch_CoustomQuery('SELECT sum(total_harga) as total FROM v_pengiriman_barang'),
        );

        // cetak_die($data);
        $this->header('Laporan Pembukuan Persediaan');
        $this->load->view('Laporankeuangan/lappemper', $data);
        $this->footer();
    }

    public function listPemper()
    {
        $list = $this->Serverside->_serverSide(
            'v_pengiriman_barang',
            ['no', 'tanggal_pengiriman', 'tanggal_penerimaan', 'nama_uker', 'nama_ekpedisi', 'keterangan', 'status_pengiriman', 'total_harga'],
            ['tanggal_pengiriman', 'tanggal_penerimaan', 'nama_uker', 'nama_ekpedisi', 'keterangan', 'status_pengiriman', 'total_harga'],
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
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->tanggal_penerimaan;
            $row[] = "Pengadaan";
            $row[] = $results->nama_uker;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->keterangan;
            if ($results->status_pengiriman == 0) {
                $row[] = labelWarna("danger", "Belum diterima");
                $row[] = rupiah($results->total_harga);
            } else {
                $row[] = labelWarna("success", "Sudah diterima");
                $row[] = rupiah($results->total_harga);
            }
            $row[] = "<a href='" . base_url('Laporankeuangan/detailPersediaan/' . $results->id_pengiriman) . "' class='btn btn-primary btn-sm'>
                        <li class='fa fa-eye'></li>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pengiriman_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pengiriman_barang',
                ['no', 'tanggal_pengiriman', 'tanggal_penerimaan', 'nama_uker', 'nama_ekpedisi', 'keterangan', 'status_pengiriman', 'total_harga'],
                ['tanggal_pengiriman', 'tanggal_penerimaan', 'nama_uker', 'nama_ekpedisi', 'keterangan', 'status_pengiriman', 'total_harga'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filterLapPemper()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $uker = input('id_uker');
        // cetak_die($startdate);
        if ($startdate && $enddate  && $uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_pengiriman_barang WHERE id_uker = '" . $uker . "' AND tanggal_pengiriman BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pengiriman_barang WHERE tanggal_pengiriman BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pengiriman_barang WHERE id_uker = '" . $uker . "'");
        } else {
            $list = $this->General->fetch_records('v_pengiriman_barang');
        }
        // lastq();

        $data = array();
        $no = 0;

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->tanggal_penerimaan;
            $row[] = "Pengadaan";
            $row[] = $results->nama_uker;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->keterangan;
            if ($results->status_pengiriman == 0) {
                $row[] = labelWarna("danger", "Belum diterima");
                $row[] = rupiah($results->total_harga);
            } else {
                $row[] = labelWarna("success", "Sudah diterima");
                $row[] = rupiah($results->total_harga);
            }
            $row[] = "<a href='" . base_url('Laporankeuangan/detailPersediaan/' . $results->id_pengiriman) . "' class='btn btn-primary btn-sm'>
                        <li class='fa fa-eye'></li>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_laporan_po'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    // ----------------------------------------------------------------

    public function Pempemspare()
    {
        $data = array(
            'uker' => $this->General->fetch_records("tbl_unit_kerja")
        );


        $this->header('Laporan Pembukuan Penggunaan Sparepart');
        $this->load->view('Laporankeuangan/lappempemspare', $data);
        $this->footer();
    }

    public function listPempengsparekancab()
    {
        $list = $this->Serverside->_serverSide(
            'v_pertekhed',
            ['no', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
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
            $row[] = "<a href='" . base_url('Laporankeuangan/detailMonpengspare') . "' class='btn btn-primary btn-sm' title='View Detail'>
                        <i class='fa fa-eye' aria-hidden='true'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pertekhed',
                ['no', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
                ['tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'tanggal_pemenuhan', 'status_pembukuan'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filterLapPempemspare()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $uker = input('id_uker');
        // cetak_die($startdate);
        if ($startdate && $enddate  && $uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_pertekhed WHERE id_uker = '" . $uker . "' AND tanggal_pembukuan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE tanggal_pembukuan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_uker = '" . $uker . "'");
        } else {
            $list = $this->General->fetch_records('v_pertekhed');
        }
        // lastq();

        $data = array();
        $no = 0;

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
            $row[] = "<a href='" . base_url('Laporankeuangan/detailMonpengspare') . "' class='btn btn-primary btn-sm' title='View Detail'>
                        <i class='fa fa-eye' aria-hidden='true'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
