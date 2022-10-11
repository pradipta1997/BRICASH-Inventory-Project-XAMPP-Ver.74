<?php
class Penghapusbukbar extends MY_Controller
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
            'totalharga' => $this->General->fetch_CoustomQuery("SELECT sum(harga_barang) as totalHarga FROM v_perbaikankcsp where status_perbaikan = '2' "),
        );

        $this->header('List Penghapus Bukuan Barang');
        $this->load->view('Pengbukbar/list_pengbukbar', $data);
        $this->footer();
    }

    public function listPenghapusbukbar()
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
            $row[] = "1";
            $row[] = rupiah($results->harga_barang);
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "<button type='button' class='btn btn-warning btn-sm' onclick='Modalpengbukbar($results->id_pengkekp_det)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    ";
            // <a href='#ijinPrinsip' data-toggle='modal' class='btn btn-info btn-sm' title='Upload Ijin Prinsip'> <i class='fa fa-file' aria-hidden='true'></i></a>
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

    public function filter()
    {
        //filter belum
        $startdate = input('startdate');
        $enddate   = input('enddate');
        $status_hapus = input('status_hapusbuk');
        $status_buku = input('status_buku');

        if ($startdate && $enddate && $status_hapus != 'All' && $status_buku != 'All') {
            $list  = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND status_ph = '" . $status_hapus . "' AND status_pembukuan = '" . $status_buku . "' AND status_perbaikan = '2'");
        } else if ($startdate && $enddate && $status_hapus == 'All' && $status_buku == 'All') {
            $list  = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND status_perbaikan = '2'  ");
        } else if ($startdate && $enddate && $status_hapus != 'All') {
            $list  = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND status_ph = '" . $status_hapus . "' AND status_perbaikan = '2' ");
        } else if ($startdate && $enddate && $status_buku != 'All') {
            $list  = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT tanggal_perbaikan BETWEEN '" . $startdate . "' AND '" . $enddate . "' AND status_pembukuan = '" . $status_buku . "' AND status_perbaikan = '2'");
        } else if ($status_hapus != 'All' && $status_buku != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT status_ph = '" . $status_hapus . "' AND status_pembukuan = '" . $status_buku . "' AND status_perbaikan = '2'");
        } else if ($status_hapus != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT status_ph = '" . $status_hapus . "' AND status_perbaikan = '2'");
        } else if ($status_buku != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT status_pembukuan = '" . $status_buku . "' AND status_perbaikan = '2'");
        } else {
            $list  = $this->General->fetch_CoustomQuery("SELECT * FROM v_perbaikankcsp SELECT status_perbaikan = '2'");
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
            $row[] = "1";
            $row[] = rupiah($results->harga_barang);
            $row[] = $results->status_ph == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = $results->status_pembukuan == 1 ? labelWarna("success", "Sudah dibuku") : labelWarna("danger", "Belum dibuku");
            $row[] = "<button type='button' class='btn btn-warning btn-sm' onclick='Modalpengbukbar($results->id_pengkekp_det)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    ";
            // <a href='#ijinPrinsip' data-toggle='modal' class='btn btn-info btn-sm' title='Upload Ijin Prinsip'> <i class='fa fa-file' aria-hidden='true'></i></a>
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

    public function showModalPerbaikan($id_pengkekp_det)
    {
        $data = $this->General->fetch_records('v_perbaikankcsp', ['id_pengkekp_det' => $id_pengkekp_det]);
        echo json_encode($data);
    }

    public function savePengbukber()
    {
        $data = array(
            'status_ph' => 1,
            'status_pembukuan' => 1,
            'catatan_perbaikan' => input('remark2')
        );

        // var_dump($data);

        $response = $this->General->update_record($data, ['id_pengkekp_det' => input('id_perbaikanbarang2')], 'tbl_perbaikankcsp');

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

    public function detailPenghapusbukber()
    {

        $this->header('Detail Penghapus Bukuan Barang');
        $this->load->view('Pengbukbar/detail_pengbukbar');
        $this->footer();
    }

    function download()
    {
        // Load view "pdf_report" untuk menampilkan hasilnya $this->load->view('page_laporan', $data); }
        define('FPDF_FONTPATH', $this->config->item('fonts_path'));
        $query = $this->db->query("SELECT * FROM class")->result();
        $data['hasil'] = $query;
    }
}
