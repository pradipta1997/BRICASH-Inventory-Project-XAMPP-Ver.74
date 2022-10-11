<?php
class Perbaikanbarang extends MY_Controller
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
            'namaBarang' => $this->General->fetch_records('tbl_barang'),
            'GBarang' => $this->General->fetch_records('tbl_gbarang'),
            'SGBarang' => $this->General->fetch_records('tbl_sgbarang'),
            'SGBarang' => $this->General->fetch_records('tbl_sgbarang'),
            'MerkBarang' => $this->General->fetch_records('tbl_merek'),
            'TipeBarang' => $this->General->fetch_records('tbl_tipe_barang'),
            'Viper' => $this->General->fetch_records('v_perbaikan'),
        );

        $this->header('List Perbaikan Barang');
        $this->load->view('Perbaikanbarang/list_perbaikanbarang', $data);
        $this->footer();
    }

    public function listperbaikanbarang(){
        $list = $this->Serverside->_serverSide(
            'v_perbaikankcsp',
            ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'catatan_perbaikan', 'status_perbaikan'],
            ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'catatan_perbaikan', 'status_perbaikan'],
            ['id_perbaikankcsp' => 'asc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $results) {

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->nama_gbarang;
            $row[] = $results->nama_sgbarang;
            $row[] = $results->nama_barang;
            $row[] = $results->nama_merek;
            $row[] = $results->tipe_barang;
            $row[] = $results->no_sn;
            if($results->catatan_perbaikan== "-"){
                $row[] = labelWarna("danger", "Belum diQC");
                $row[] = labelWarna("danger", "Belum diQC");
            }else{
                $row[] = $results->catatan_perbaikan;
                $row[] = $results->status_perbaikan == 1? labelWarna("success", "Bisa Diperbaiki") : labelWarna("danger", "Tidak bisa diperbaiki");
            }
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='Modalperbaikanbarang($results->id_pengkekp_det)'>
                        <i class='fa fa-pencil-square-o'></i>
                      </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_perbaikankcsp'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_perbaikankcsp',
                ['no', 'nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'catatan_perbaikan', 'status_perbaikan'],
                ['nama_gbarang', 'nama_sgbarang', 'nama_barang', 'nama_merek', 'tipe_barang', 'no_sn', 'catatan_perbaikan', 'status_perbaikan'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function showModalPerbaikan($id_perbaikanbarang)
    {
        $data = $this->General->fetch_records('v_perbaikankcsp', ['id_pengkekp_det' => $id_perbaikanbarang]);
        echo json_encode($data);
    }

    public function editPerbaikanBarang()
    {
        $data = array(
            'tanggal_perbaikan' => input('tanggal_perbaikan'),
            'catatan_perbaikan' => input('catatan_perbaikan'),
            'status_perbaikan' => input('stat_perbaikan'),
        );

        // var_dump($data);

        $response = $this->General->update_record($data, ['id_pengkekp_det' => input('id_perbaikanbarang')], 'tbl_perbaikankcsp');

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
}
