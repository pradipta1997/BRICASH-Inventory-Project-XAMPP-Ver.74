<?php
class Monpemper extends MY_Controller
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

        $this->header('Monitoring Pembukuan Persediaan');
        $this->load->view('Monpemper/list_monpemper');
        $this->footer();
    }

    public function listMonpemper()
    {
        $list = $this->Serverside->_serverSide(
            'v_monitoring_pembukuan_persedian',
            ['no', 'id_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'nama_ekpedisi', 'status_pengiriman', 'total_harga', 'status_pembukuan'],
            ['id_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'nama_ekpedisi', 'status_pengiriman', 'total_harga', 'status_pembukuan'],
            ['id_pengiriman' => 'asc'],
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
            $row[] = $results->nama_uker;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->status_pengiriman;
            $row[] = $results->total_harga;
            $row[] = $results->status_pembukuan;
            $row[] = "<a href='" . base_url('Monpemper/detailMonpembayaran/' . $results->id_pengiriman) . "' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i></a>
                    <button type='button' class='btn btn-default btn-sm' " . getEditperm() . " onclick='Modalperbaikanbarang()'>
                        <i class='fa fa-book'></i>
                    </button>";

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_monitoring_pembukuan_persedian'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_monitoring_pembukuan_persedian',
                ['no', 'id_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'nama_ekpedisi', 'status_pengiriman', 'total_harga', 'status_pembukuan'],
                ['id_pengiriman', 'tanggal_pengiriman', 'nama_uker', 'nama_ekpedisi', 'status_pengiriman', 'total_harga', 'status_pembukuan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }



    public function detailMonpembayaran()
    {

        $this->header('Detail Monitoring Pembukuan Persediaan');
        $this->load->view('Monpemper/detail_monpemper');
        $this->footer();
    }

    public function filterMonpemper()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $status = input('id_pembukuan');
        // cetak_die($startdate);
        if ($startdate && $enddate  && $status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_monitoring_pembukuan_persedian WHERE id_pembukuan = '" . $status . "' AND tanggal_pengiriman BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_monitoring_pembukuan_persedian WHERE tanggal_pengiriman BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_monitoring_pembukuan_persedian WHERE id_pembukuan = '" . $status . "'");
        } else {
            $list = $this->General->fetch_records('v_monitoring_pembukuan_persedian');
        }
        // lastq();

        $data = array();
        $no = 0;

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tanggal_pengiriman;
            $row[] = $results->nama_uker;
            $row[] = $results->nama_ekpedisi;
            $row[] = $results->status_pengiriman;
            $row[] = $results->total_harga;
            $row[] = $results->status_pembukuan;
            $row[] = "<a href='" . base_url('Monpemper/detailMonpembayaran/' . $results->id_pengiriman) . "' class='btn btn-primary btn-sm'><i class='fa fa-eye'></i></a>
                    <button type='button' class='btn btn-default btn-sm' " . getEditperm() . " onclick='Modalperbaikanbarang()'>
                        <i class='fa fa-book'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_monitoring_pembukuan_persedian'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
