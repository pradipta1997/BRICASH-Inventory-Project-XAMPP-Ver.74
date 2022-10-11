<?php

class Permintaanpbj extends MY_Controller
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
        $this->header('List Purchase Order');
        $this->load->view('Permintaanpbj/list_permintaanpbj');
        $this->footer();
    }

    public function listPurchaseorder()
    {
        $list = $this->Serverside->_serverSide(
            'tbl_pbj',
            ['no', 'no_pbj', 'tanggal_permintaan', 'keterangan', 'terms', 'wakadiv_approv', 'spv_gudang_approv'],
            ['no_pbj', 'tanggal_permintaan', 'keterangan', 'terms', 'wakadiv_approv', 'spv_gudang_approv'],
            ['id' => 'desc'],
            null,
            'data'
        );
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {

            if ($results->spv_gudang_approv == 1) {
                $spv_gudang_approv = labelWarna('success', 'Sudah diapprov SPV Gudang');
            }else if($results->spv_gudang_approv == 2) {
                $spv_gudang_approv = labelWarna('warning', 'Approval Ditolak SPV Gudang');
            } else {
                $spv_gudang_approv = labelWarna('danger', 'Belum diapprov SPV Gudang');
            }

            if ($results->wakadiv_approv == 1) {
                $wakadiv_approv = labelWarna('success', 'Sudah diapprov Kabag PGD');
                if($results->spv_gudang_approv == 1){
                    $status = "PBJ Sudah DiApprov Gudang & Kabag PGD.";
                }
            }else if($results->wakadiv_approv == 2) {
                $wakadiv_approv = labelWarna('warning', 'Approval Ditolak Kabag PGD');
                if($results->spv_gudang_approv == 1){
                    $status = "PBJ Ditolak Kabag PGD.";
                }
            } else {
                $wakadiv_approv = labelWarna('danger', 'Belum diapprov Kabag PGD');
                if($results->spv_gudang_approv == 1){
                    $status = "PBJ Belum DiApprove Kabag PGD.";
                }else if($results->spv_gudang_approv == 0){
                    $status = "PBJ Belum DiApprove SPV Gudang.";
                }else if($results->spv_gudang_approv == 2){
                    $status = "PBJ Ditolak SPV Gudang.";
                }
            }

            if ($this->session->userdata('user_login')['id_sgroup'] == 22 || $this->session->userdata('user_login')['id_sgroup'] == 25) {
                $button = "<a href='" . base_url('Permintaanpbj/viewpbj/' . $results->id) . "'  class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";
            } else {
                if($results->wakadiv_approv == 1){
                    $button = "<a href='" . base_url('Permintaanpbj/editpbj/' . $results->id) . "' class='btn btn-info btn-sm'>
                        <i class='fa fa-eye'></i>
                    </a>";
                }else{
                    $button = "<a href='" . base_url('Permintaanpbj/editpbj/' . $results->id) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>
                    <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletepbj($results->id)'>
                        <i class='fa fa-trash' aria-hidden='true'></i>
                    </button>";
                }   
            }

            $Approv = $wakadiv_approv." ".$spv_gudang_approv;

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_pbj;
            $row[] = $results->tanggal_permintaan;
            $row[] = $results->keterangan;
            $row[] = $Approv;
            $row[] = $status;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('tbl_pbj'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'tbl_pbj',
                ['no', 'no_pbj', 'tanggal_permintaan', 'keterangan', 'terms', 'wakadiv_approv'],
                ['no_pbj', 'tanggal_permintaan', 'keterangan', 'terms', 'wakadiv_approv'],
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function tambahPBJ()
    {
        $data = array(
            'sgbarang'  =>  $this->General->fetch_records('tbl_sgbarang'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPerBar' => $this->General->autoNoPBJ()
        );


        $this->header('Tambah Purchase Order');
        $this->load->view('Permintaanpbj/tambah_permintaanpbj', $data);
        $this->footer();
    }

    public function savePBJ()
    {
        $permintaanhead = array(
            // 'id_permintaan' => input('id_permintaan'),
            'no_pbj' => input('no_pbj'),
            'tanggal_permintaan' => input('tanggal_permintaan'),
            'keterangan' => input('keterangan2'),
            'terms' => input('terms'),
            'wakadiv_approv' => 0,
            'wakadiv_approv_date' => date('Y-m-d')
        );

        // cetak_die($permintaanhead);

        $savePermintaanBarang = $this->General->insertRecord('tbl_pbj', $permintaanhead);

        // cetak($savePermintaanBarang);
        // lastq();

        if ($savePermintaanBarang) {
            $id_po = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pbj' => $id_po,
                    'no_urut' => $val,
                    // 'nama_merek' => $_POST['nama_merek'][$key],
                    // 'tipe_barang' => $_POST['tipe_barang'][$key],
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['keterangan'][$key]
                );
            }
            $savePermintaandet = $this->General->insertBatch('tbl_pbj_det', $result);

            // lastq();

            if ($savePermintaandet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                redirect('Permintaanpbj');
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Permintaanpbj');
        }
    }

    public function editpbj($id)
    {
        $dataPo = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'currency' => $this->General->fetch_records('v_currency'),
            'project' => $this->General->fetch_records('tbl_project'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'po' => $this->General->getRow('tbl_pbj', ['id' => $id])
        );


        $this->header('Edit Purchase Order');
        $this->load->view('Permintaanpbj/edit_permintaanpbj', $dataPo);
        $this->footer();
    }

    public function printpbj($id){
        $dataPO = array(
            'po' => $this->General->getRow('v_print_pbj', ['id_pbj' => $id]),
            // 'mpo' => $this->General->getRow('v_pohead', ['id_po' => $id_po])

        );
        // var_dump($dataPO['po']);
        $this->load->view('LaporanPusat/print_pbj',$dataPO);
    }

    public function updatepbj($id)
    {
        $permintaanhead = array(
            // 'id_permintaan' => input('id_permintaan'),
            'no_pbj' => input('no_pbj'),
            'tanggal_permintaan' => input('tanggal_permintaan'),
            'keterangan' => input('keterangan2'),
            'terms' => input('terms'),
            'wakadiv_approv' => 0,
            'wakadiv_approv_date' => date('Y-m-d')
        );

        // cetak_die($permintaanhead);

        $updatePohead = $this->General->update_record($permintaanhead, ['id' => $id], 'tbl_pbj');

        // cetak($savePermintaanBarang);
        // lastq();

        if ($updatePohead) {
            $this->General->deleteData('tbl_pbj_det', ['id_pbj' => $id]);
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_pbj' => $id,
                    'no_urut' => $val,
                    // 'nama_merek' => $_POST['nama_merek'][$key],
                    // 'tipe_barang' => $_POST['tipe_barang'][$key],
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['keterangan'][$key]
                );
            }
            $savePermintaandet = $this->General->insertBatch('tbl_pbj_det', $result);

            // lastq();

            if ($savePermintaandet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                redirect('Permintaanpbj');
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Permintaanpbj');
        }
    }

    public function viewpbj($id)
    {
        $dataPo = array(
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
            'vendor' => $this->General->fetch_records('tbl_vendor'),
            'project' => $this->General->fetch_records('tbl_project'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'currency' => $this->General->fetch_records('v_currency'),
            'po' => $this->General->getRow('tbl_pbj', ['id' => $id])
        );


        $this->header('View Purchase Order');
        $this->load->view('Permintaanpbj/view_permintaanpbj', $dataPo);
        $this->footer();
    }

    public function approvpbj($id)
    {
        $dataPo = $this->General->getRow('tbl_pbj', ['id' => $id]);

        // Ini Wakadiv
        if ($this->session->userdata('user_login')['id_sgroup'] == 22) {
            $data = array(
                'wakadiv_approv_date' => date('Y-m-d'),
                'wakadiv_approv' => 1,
            );

            $wakaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');
            
            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil di approv!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Permintaanpbj');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 25) { // Ini Kadiv
            $data = array(
                'spv_gudang_approv_date' => date('Y-m-d'),
                'spv_gudang_approv' => 1,
            );

            $kaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');

            if ($kaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil di approv!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Permintaanpbj');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 24){
            $data = array(
                'tanggal_approv_direksi' => date('Y-m-d'),
                'direksi_approv' => 1,
            );

            $wakaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');
            
            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil di approv!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Permintaanpbj');
            }
        }
    }

    public function tolak_approval($id)
    {
        $dataPo = $this->General->getRow('tbl_pbj', ['id' =>$id]);

        // Ini Wakadiv
        if ($this->session->userdata('user_login')['id_sgroup'] == 22) {
            $data = array(
                'wakadiv_approv' => 2
            );

            $wakaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');

            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'PO Berhasil Ditolak.');
                // var_dump($id_po);
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Po gagal di approv!');
                redirect('Permintaanpbj');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 25) { // Ini Kadiv
            if ($dataPo->wakadiv_approv == 1) {
                $data = array(
                    'spv_gudang_approv' => 2
                );

                $kaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');

                if ($kaDiv) {
                    LogActivity($this->db->last_query());
                    $this->session->set_flashdata('success', 'Po berhasil di approv!');
                    // var_dump($id_po);
                    redirect('Permintaanpbj');
                } else {
                    $this->session->set_flashdata('error', 'Po gagal di approv!');
                    redirect('Permintaanpbj');
                }
            } else {
                $this->session->set_flashdata('info', 'Silahkan tunggu wakadiv approvel terlebih dahulu!');
                redirect('Permintaanpbj');
            }
        } else if ($this->session->userdata('user_login')['id_sgroup'] == 24){
            $data = array(
                'tanggal_approv_direksi' => date('Y-m-d'),
                'direksi_approv' => 2,
            );

            $wakaDiv = $this->General->update_record($data, ['id' => $id], 'tbl_pbj');
            
            if ($wakaDiv) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Po berhasil ditolak!');
                redirect('Permintaanpbj');
            } else {
                $this->session->set_flashdata('error', 'Po gagal ditolak!');
                redirect('Permintaanpbj');
            }
        }
    }

    public function deletepbj()
    {
        $deletePurchaseOrder = $this->General->deleteData('tbl_pbj', ['id' => input('id')]);

        if ($deletePurchaseOrder) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }
}
