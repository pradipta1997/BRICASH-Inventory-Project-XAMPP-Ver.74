<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengmesin extends MY_Controller
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

        $this->header('List Pengelolaan Mesin');
        $data['uker'] = $this->General->fetch_records("tbl_unit_kerja");
        $data['project'] = $this->General->fetch_records("tbl_project");
        $this->load->view('Pengmesin/list_pengmesin', $data);
        $this->footer();
    }

    public function listPengmesin()
    {
        $list = $this->Serverside->_serverSide(
            'v_pengelolaanmesin',
            ['no', 'nama_uker', 'nama_project', 'tid', 'lokasi', 'db', 'merek', 'tipe'],  //filter
            ['nama_uker', 'lokasi', 'tipe'],   //searching
            ['id_det_project' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->kode_uker . " | " . $results->nama_uker;
            $row[] = $results->nama_project;
            $row[] = $results->tid;
            $row[] = $results->lokasi;
            $row[] = $results->db;
            $row[] = $results->merek;
            $row[] = $results->tipe;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VPengmesin($results->id_det_project)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePengmesin($results->id_det_project)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pengelolaanmesin'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pengelolaanmesin',
                ['no', 'nama_uker', 'lokasi', 'tipe'],
                ['nama_uker', 'lokasi', 'tipe']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formPengmesin()
    {
        if (input('id_det_project')) {
            $this->_editPengmesin();
        } else {
            $this->_savePengmesin();
        }
    }

    private function _savePengmesin()
    {
        $data = array(
            'id_uker' => input('id_uker'),
            'id_project' => input('id_project'),
            // 'tid' => input('tid'),
            'lokasi' => input('lokasi'),
            'db' => input('db'),
            'merek' => input('merek'),
            'tipe' => input('tipe'),
            'pengmes_created_date' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_pengelolaan_mesin', $data);

        if ($response) {
            LogActivity($this->db->last_query());

            $pesan = array(
                'pesan' => 'Data berhasil di simpan!',
                'tipe' => 'success'
            );

            echo json_encode($pesan);
        } else {
            $pesan = array(
                'pesan' => 'Data gagal di simpan!',
                'tipe' => 'error'
            );

            echo json_encode($pesan);
        }
    }

    public function viewPengmesin($id_det_project)
    {
        $data = $this->General->fetch_records('v_pengelolaanmesin', ['id_det_project' => $id_det_project]);
        echo json_encode($data);
    }

    private function _editPengmesin()
    {

        $data = array(
            'id_uker' => input('id_uker'),
            'id_project' => input('id_project'),
            'lokasi' => input('lokasi'),
            'db' => input('db'),
            'merek' => input('merek'),
            'tipe' => input('tipe'),
            'pengmes_updated_date' => Date("Y-m-d H:i:s"),
            'pengmes_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_det_project' => input('id_det_project')], 'tbl_pengelolaan_mesin');


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

    public function deletePengmesin()
    {
        $deletePengmesin = $this->General->deleteData('tbl_pengelolaan_mesin', ['id_det_project' => input('id_det_project')]);

        if ($deletePengmesin) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}


/* End of file Controllername.php */
