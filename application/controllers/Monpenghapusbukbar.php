<?php
class Monpenghapusbukbar extends MY_Controller
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
        $this->header('Monitoring Penghapus Bukuan Barang');
        $this->load->view('Monpenghapusbukbar/list_monpenghapusbukbar');
        $this->footer();
    }

    public function listPenghapusbukbar()
    {

        $list = $this->Serverside->_serverSide(
            'v_perbaikankcsp',
            ['no', 'no_permintaan', 'tanggal_perbaikan', 'nama_barang', 'harga_barang'],
            ['no_permintaan', 'tanggal_perbaikan', 'nama_barang', 'harga_barang'],
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
            $row[] = $results->harga_barang;
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "-";
            $row[] = "<a href='" . base_url('Monpenghapusbukbar/detailMonpenghapusbukbar/' . $results->id_pengkekp_det) . "' class='btn btn-primary btn-sm' title='View Detail'>
                        <i class='fa fa-eye' aria-hidden='true'></i>
                    </a>";

            // $row[] = $results->status_pengiriman == 1? labelWarna("success", "Sudah diterima") : labelWarna("danger", "Belum diterima");
            // $row[] = "coek";

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

    public function detailMonpenghapusbukbar($id)
    {
        $data = array(
            'pengbarang' => $this->General->getRow('v_perbaikankcsp',  ['id_pengkekp_det' => $id])
        );

        $this->header('Detail Penghapus Bukuan Barang');
        $this->load->view('Monpenghapusbukbar/detail_monpenghapusbukbar', $data);
        $this->footer();
    }

    public function filterPenghapusbukbar()
    {
        $startdate = input('startdate');
        $enddate = input('enddate');
        $status = input('status');
        // cetak_die($startdate);
        if ($startdate && $enddate  && $status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM  v_perbaikankcsp WHERE status_pembukuan = '" . $status . "' AND tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($startdate && $enddate) {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp WHERE tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "'");
        } else if ($status != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp WHERE status_pembukuan = '" . $status . "'");
        } else {
            $list = $this->General->fetch_records('v_perbaikankcsp');
        }
        lastq();

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
            $row[] = $results->harga_barang;
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "-";
            $row[] = "<a href='" . base_url('Monpenghapusbukbar/detailMonpenghapusbukbar/' . $results->id_pengkekp_det) . "' class='btn btn-primary btn-sm' title='View Detail'>
                        <i class='fa fa-eye' aria-hidden='true'></i>
                    </a>";
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_perbaikankcsp'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }
}
