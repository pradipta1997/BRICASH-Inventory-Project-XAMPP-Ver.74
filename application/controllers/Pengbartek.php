<?php
class Pengbartek extends MY_Controller
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
        $this->header('List Permintaan Barang Teknisi');
        $this->load->view('Pengbartek/list_pengbartek');
        $this->footer();
    }

    public function listPengbartek()
    {
        $list = $this->General->fetch_CoustomQuery("SELECT nama_teknisi, tid, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, no_sn FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND status_pakai = '1';");
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_teknisi;
            $row[] = $results->tid;
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->no_sn;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_stockcbg', 'id_jtran = 2 AND dari_uker = 1 AND is_have = 1 AND status_pakai = 1'),
            "recordsFiltered" => $list = $this->General->fetch_CoustomQuery("SELECT nama_teknisi, tid, nama_gbarang, nama_sgbarang, nama_barang, nama_merek, tipe_barang, no_sn FROM `v_stockcbg` no_urut WHERE id_jtran = '2' AND dari_uker = '1' AND is_have = '1' AND status_pakai = '1';"),
            "data" => $data,
        );

        echo json_encode($output);
    }
}
