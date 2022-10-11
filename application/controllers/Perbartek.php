<?php
class Perbartek extends MY_Controller
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

        $this->header('List Permintaan Barang Teknisi');
        $this->load->view('Perbartek/list_perbartek', $data);
        $this->footer();
    }

    public function filterPerbartek()
    {
        $id_user = input('id_user');
        $status_permintaan = input('status_permintaan');

        // cetak_die($id_user);
        if ($id_user != 'All' && $status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $id_user . "' AND status_pertek = '" . $status_permintaan . "' AND pinca_appovel = '1'");
        } else if ($id_user != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE id_user = '" . $id_user . "' AND pinca_appovel = '1'");
        } else if ($status_permintaan != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE status_pertek = '" . $status_permintaan . "' AND pinca_appovel = '1'");
        } else {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_pertekhed WHERE pinca_appovel = '1'");
        }

        // lastq();
        $data = array();
        $no = 0;

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
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : labelWarna("success", "Sudah di Penuhi");
            $row[] = $Approv;
            $row[] = "<a href='" . base_url("Perbartek/editPerbartek/" . $results->id_pertek) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePerbartek($results->id_pertek)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

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

    public function listPerbartek()
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
            if ($results->pinca_appovel == 1) {
                $pincaApprov = labelWarna('success', 'Pinca Approv');
            } else {
                $pincaApprov = labelWarna('danger', 'Pinca Non Approv');
            }

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
            $row[] = $results->status_pertek == 0 ? labelWarna("danger", "Belum di Penuhi") : labelWarna("success", "Sudah di Penuhi");
            $row[] = $Approv;
            $row[] = "<a href='" . base_url("Perbartek/editPerbartek/" . $results->id_pertek) . "' class='btn btn-warning btn-sm' " . getEditperm() . ">
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePerbartek($results->id_pertek)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";

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

    public function tambahPerbartek()
    {
        if ($this->session->userdata("user_login")['id_uker'] == 1) {
            $Teknisi = ['id_sgroup']; //=> 10
        } else {
            $Teknisi = ['id_sgroup' => 10, 'id_uker' => $this->session->userdata("user_login")['id_uker']];
        }

        $data = array(
            'tid' => $this->General->fetch_records('tbl_project'),
            'userTek' => $this->General->fetch_records('v_user', $Teknisi),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPertek' => $this->General->autoNoPertek()
        );

        $this->header('Tambah Permintaan Teknisi');
        $this->load->view('Perbartek/tambahperbartek', $data);
        $this->footer();
    }

    public function savePerbartek()
    {
        $pertekHead = array(
            'id_user' => input('id_user'),
            'id_project' => input('id_project'),
            'nomor_pertek' => input('nomor_pertek'),
            'tanggal_pertek' => input('tanggal_pertek'),
            'status_pertek' => 0,
            'pinca_appovel' => 0,
            'leader_approvel' => 0,
            'keterangan' => input('keterangan'),
            'pertek_created_by' => $this->session->userdata('user_login')['username']
        );

        $savePertek = $this->General->insertRecord('tbl_pertek', $pertekHead);

        if ($savePertek) {
            $id_pertek = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pertek' => $id_pertek,
                    'no_urut' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['ketdet'][$key],
                    'pertekdet_created_by' => $this->session->userdata('user_login')['username']
                );
            }
            // cetak_die($result);
            $savePertekDet = $this->General->insertBatch('tbl_pertek_det', $result);

            if ($savePertekDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Perbartek');
            } else {
                // $this->session->set_flashdata('error', 'Record added Failed..!');
                // redirect('Perbartek');
                var_dump($result);
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Perbartek');
        }
    }

    public function editPerbartek($id_pertek)
    {
        if ($this->session->userdata("user_login")['id_uker'] == 1) {
            $Teknisi = ['id_sgroup'];   //=> 10
        } else {
            $Teknisi = ['id_sgroup' => 10, 'id_uker' => $this->session->userdata("user_login")['id_uker']];
        }

        $data = array(
            'pertek' => $this->General->getRow('tbl_pertek', ['id_pertek' => $id_pertek]),
            'tid' => $this->General->fetch_records('tbl_project'),
            'userTek' => $this->General->fetch_records('v_user', $Teknisi),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        $this->header('Edit Permintaan Teknisi');
        $this->load->view('Perbartek/editperbartek', $data);
        $this->footer();
    }

    public function updatePerbartek($id_pertek)
    {
        $pertekHead = array(
            'id_user' => input('id_user'),
            'id_project' => input('id_project'),
            'tanggal_pertek' => input('tanggal_pertek'),
            'keterangan' => input('keterangan'),
            'pertek_updated_date' => date('Y-m-d H:i:s'),
            'pertek_updated_by' => $this->session->userdata('user_login')['username']
        );

        $updatePertek = $this->General->update_record($pertekHead, ['id_pertek' => $id_pertek], 'tbl_pertek');

        if ($updatePertek) {
            $this->General->deleteData('tbl_pertek_det', ['id_pertek' => $id_pertek]);

            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pertek' => $id_pertek,
                    'no_urut' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['ketdet'][$key],
                    'pertekdet_created_by' => $this->session->userdata('user_login')['username']
                );
            }

            $updatePertekDet = $this->General->insertBatch('tbl_pertek_det', $result);

            if ($updatePertekDet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Perbartek');
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Perbartek');
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Perbartek');
        }
    }

    public function deletePerbartek()
    {
        $deletePerbartek = $this->General->deleteData('tbl_pertek', ['id_pertek' => input('id_pertek')]);

        if ($deletePerbartek) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }
}
