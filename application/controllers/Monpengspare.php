<?php
class Monpengspare extends MY_Controller
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

        $this->header('Monitoring Pembukuan Penggunaan Sparepart Kantor Cabang');
        $this->load->view('Monpengspare/list_monpengspare');
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
            $row[] = "<a href='" . base_url('Monpengspare/detailMonpengspare/') . $results->id_pertek . "' class='btn btn-primary btn-sm' title='View Detail'>
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

    public function detailMonpengspare($id)
    {
        $data = array(
            'gen'   => $this->General->getRow('v_pertekdet',  ['id_pertek' => $id])
        );

        $this->header('Detail Monitoring Pembukuan Penggunaan Sparepart Kantor Cabang');
        $this->load->view('Monpengspare/detail_monpengspare', $data);
        $this->footer();
    }

    public function filterPempengsparekancab()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $status_pembukuan = input('status_pembukuan');

        // cetak_die($startdate);
        if ($startdate && $enddate  && $status_pembukuan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_pertekhed WHERE id_pertek = '" . $status_pembukuan . "' AND tanggal_pembukuan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE tanggal_pembukuan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($status_pembukuan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_pertek = '" . $status_pembukuan . "'");
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
            $row[] = "<a href='" . base_url('Monpengspare/detailMonpengspare/') . $results->id_pertek . "' class='btn btn-primary btn-sm' title='View Detail'>
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
