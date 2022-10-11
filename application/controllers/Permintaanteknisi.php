<?php
class Permintaanteknisi extends MY_Controller
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
        $this->header('List Permintaan Teknisi');
        $this->load->view('Permintaanteknisi/list_permintaanteknisi', $data);
        $this->footer();
    }

    public function filter()
    {
        $id_user = input('id_user');
        $status_permintaan = input('status_permintaan');

        if ($id_user != 'All' && $status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $id_user . "' AND status_pertek = '" . $status_permintaan . "'");
        } else if ($id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $id_user . "'");
        } else if ($status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pertek = '" . $status_permintaan . "'");
        } else {
            $list = $this->General->fetch_records('v_pertekhed');
        }

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
            $row[] = $results->tanggal_pertek;
            $row[] = $results->nomor_pertek;
            $row[] = $results->username;
            $row[] = $results->tid;
            $row[] = $results->keterangan;
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum dipenuhi") : labelWarna("success", "Sudah dipenuhi");
            $row[] = $Approv;
            $row[] = "<a href='" . base_url("Permintaanteknisi/viewPermintaanteknisi/" . $results->id_pertek) . "' class='btn btn-primary btn-sm' " . getEditperm() . ">
                        <i class='fa fa-eye'></i>
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

    public function listPermintaanteknisi()
    {
        $list = $this->Serverside->_serverSide(
            'v_pertekhed',
            ['no', 'tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'status_approvel'],
            ['tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'status_approvel'],
            ['nomor_pertek' => 'desc'],
            null,
            'data'
        );
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
            $row[] = $results->tanggal_pertek;
            $row[] = $results->nomor_pertek;
            $row[] = $results->username;
            $row[] = $results->tid;
            $row[] = $results->keterangan;
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum dipenuhi") : labelWarna("success", "Sudah dipenuhi");
            $row[] = $Approv;
            $row[] = "<a href='" . base_url("Permintaanteknisi/viewPermintaanteknisi/" . $results->id_pertek) . "' class='btn btn-primary btn-sm' " . getEditperm() . ">
                        <i class='fa fa-eye'></i>
                    </a>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pertekhed'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pertekhed',
                ['no', 'tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'status_approvel'],
                ['tanggal_pertek', 'nomor_pertek', 'username', 'tid', 'keterangan', 'status_pertek', 'status_approvel']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function viewPermintaanteknisi($id_pertek)
    {
        $data = array('pertek' => $this->General->getRow("v_pertekhed", ['id_pertek' => $id_pertek]));

        $this->header('View Permintaan Teknisi');
        $this->load->view('Permintaanteknisi/viewpermintaanteknisi', $data);
        $this->footer();
    }

    public function approvPertek($id_pertek)
    {
        $datapertek = $this->General->getRow('v_pertekhed', ['id_pertek' => $id_pertek]);


        if ($this->session->userdata('user_login')['id_sgroup'] == 14) {    // <-------INI PINCA
            $data = array(
                'tanggal_approv_pinca' => date('Y-m-d'),
                'pinca_appovel' => 1,
            );

            $pinca = $this->General->update_record($data, ['id_pertek' => $id_pertek], 'tbl_pertek');

            if ($pinca) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Permintaan Teknisi berhasil di approv!');
                redirect('Permintaanteknisi');
            } else {
                $this->session->set_flashdata('error', 'Permintaan Teknisi gagal di approv!');
                redirect('Permintaanteknisi');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 23) { // <-------INI LEADER
            if ($datapertek->pinca_appovel == 1) {
                $data = array(
                    'tanggal_approv_leader' => date('Y-m-d'),
                    'leader_approvel' => 1,
                );

                $leader = $this->General->update_record($data, ['id_pertek' => $id_pertek], 'tbl_pertek');

                if ($leader) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Permintaan Teknisi berhasil di approv!');
                    redirect('Permintaanteknisi');
                } else {
                    $this->session->set_flashdata('error', 'Permintaan Teknisi gagal di approv!');
                    redirect('Permintaanteknisi');
                }
            } else {
                $this->session->set_flashdata('info', 'Silahkan tunggu pinca approvel terlebih dahulu!');
                redirect('Permintaanteknisi');
            }
        }
    }
}
