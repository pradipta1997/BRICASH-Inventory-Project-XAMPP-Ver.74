<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends MY_Controller
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

        $this->header('List Project');
        $this->load->view('Project/list_project');
        $this->footer();
    }

    public function listProject()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_project',
            ['no', 'tid', 'tgl_spk', 'no_spk', 'nama_project', 'keterangan'],
            ['tid', 'tgl_spk', 'no_spk', 'nama_project', 'keterangan'],
            ['nama_project' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->tid;
            $row[] = $results->tgl_spk;
            $row[] = $results->no_spk;
            $row[] = $results->nama_project;
            $row[] = $results->keterangan;
            $row[] = "<button type='button' class='btn btn-warning btn-sm' " . getEditperm() . " onclick='VProject($results->id_project)'>
                        <i class='fa fa-pencil-square-o'></i>
                    </button>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deleteProject($results->id_project)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_project'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_project',
                ['no', 'tid', 'tgl_spk', 'no_spk', 'nama_project', 'keterangan'],
                ['tid', 'tgl_spk', 'no_spk', 'nama_project', 'keterangan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function formProject()
    {
        if (input('id_project')) {
            $this->_editProject();
        } else {
            $this->_saveProject();
        }
    }

    private function _saveProject()
    {
        $data = array(
            'tid' => input('tid'),
            'tgl_spk' => input('tgl_spk'),
            'no_spk' => input('no_spk'),
            'nama_project' => input('nama_project'),
            'keterangan' => input('keterangan'),
            'project_created_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->insertRecord('tbl_project', $data);

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

    public function viewProject($id_project)
    {
        $data = $this->General->fetch_records('tbl_project', ['id_project' => $id_project]);
        echo json_encode($data);
    }

    private function _editProject()
    {
        $data = array(
            'tid' => input('tid'),
            'tgl_spk' => input('tgl_spk'),
            'no_spk' => input('no_spk'),
            'nama_project' => input('nama_project'),
            'keterangan' => input('keterangan'),
            'project_updated_date' => date('Y-m-d H:i:s'),
            'project_updated_by' => $this->session->userdata('user_login')['username']
        );

        $response = $this->General->update_record($data, ['id_project' => input('id_project')], 'tbl_project');

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

    public function deleteProject()
    {
        $deleteProject = $this->General->deleteData('tbl_project', ['id_project' => input('id_project')]);

        if ($deleteProject) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
