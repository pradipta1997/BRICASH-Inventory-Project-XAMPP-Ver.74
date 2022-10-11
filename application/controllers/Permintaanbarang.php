<?php

class Permintaanbarang extends MY_Controller
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
        $this->header('List Permintaan Barang');
        $this->load->view('Permintaanbarang/list_permintaanbarang');
        $this->footer();
    }

    public function filter()
    {
        $status_permintaan = input('status_permintaan');

        $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE status_permintaan = '" . $status_permintaan . "';");

        // var_dump($id_user." ".$status_permintaan." ".$startdate." ".$enddate." ");
        $data = array();
        $no = 0;

        foreach ($list as $results) {
            // STATUS PERMINTAAN
            if ($results->status_permintaan == 1) {
                $status_permintaan = labelWarna("success", "Sudah di Penuhi");
            } else {
                $status_permintaan = labelWarna("danger", "Belum di Penuhi");
            }

            //APPROVEL
            if ($results->pinca_approv == 1) {
                $pincaApprov = labelWarna('success', 'Pinca Approv');
            } else {
                $pincaApprov = labelWarna('danger', 'Pinca Non-Approv');
            }

            $Approv = "<p>$pincaApprov</p>";

            //SLA
            if ($results->pinca_approv == 1) {
                if ($results->status_permintaan == 1) {
                    $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                } else {
                    $sla = '<a title="Terlambat " class="btn fa fa-thumbs-down" style="color:red" type="button"> </a>';
                }
            } else {
                $sla = "-";
            }

            // PEMBAGIAN BUTTON
            if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                $button =   "<a href='" . base_url('Permintaanbarang/viewPermintaanbarang/' . $results->id_permintaan) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                            </a>";
            } else {
                $button =   "<a href='" . base_url('Permintaanbarang/editPermintaanbarang/' . $results->id_permintaan) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                             </a>

                            <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePermintaanbarang($results->id_permintaan)'>
                                <i class='fa fa-trash' aria-hidden='true'></i>
                            </button>";
            }

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            $row[] = $results->tgl_permintaan;
            $row[] = $results->alasan_permintaan;
            $row[] = $results->catatan_permintaan;
            $row[] = $results->tempo_barang;
            $row[] = $status_permintaan;
            $row[] = $Approv;
            $row[] = $sla;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "recordsTotal" => $this->Serverside->_countAll('v_permintaan_barang'),
            "recordsFiltered" => $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE status_permintaan = '" . $status_permintaan . "';"),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function listPermintaanbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_permintaan_barang',
            ['no', 'no_permintaan', 'tgl_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'tempo_barang', 'status_permintaan', 'pinca_approv', 'sla'],
            ['no_permintaan', 'tgl_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'tempo_barang', 'status_permintaan', 'pinca_approv', 'sla'],
            ['no_permintaan' => 'desc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            // STATUS PERMINTAAN
            if ($results->status_permintaan == 1) {
                $status_permintaan = labelWarna("success", "Sudah di Penuhi");
            } else {
                $status_permintaan = labelWarna("danger", "Belum di Penuhi");
            }

            //APPROVEL
            if ($results->pinca_approv == 1) {
                $pincaApprov = labelWarna('success', 'Sudah diApprove');
            }else if($results->pinca_approv == 2){
                $pincaApprov = labelWarna('warning', 'Approval Ditolak');
            } else {
                $pincaApprov = labelWarna('danger', 'Belum diApprove');
            }

            $Approv = "<p>$pincaApprov</p>";

            //SLA
            if ($results->pinca_approv == 1) {
                if ($results->status_permintaan == 1) {
                    $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                } else {
                    $sla = '<a title="Terlambat " class="btn fa fa-thumbs-down" style="color:red" type="button"> </a>';
                }
            } else {
                $sla = "-";
            }

            // PEMBAGIAN BUTTON
            if ($this->session->userdata('user_login')['id_sgroup'] == 14) {
                $button =   "<a href='" . base_url('Permintaanbarang/viewPermintaanbarang/' . $results->id_permintaan) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                            </a>";
            } else {
                if($results->pinca_approv == 1){
                    $button = labelWarna('success', 'Sudah diApprove');
                }else{
                    $button =   "<a href='" . base_url('Permintaanbarang/editPermintaanbarang/' . $results->id_permintaan) . "' " . getEditperm() . " class='btn btn-warning btn-sm'>
                                <i class='fa fa-pencil-square-o'></i>
                             </a>

                            <button type='button' class='btn btn-danger btn-sm' " . getDeleteperm() . " onclick='deletePermintaanbarang($results->id_permintaan)'>
                                <i class='fa fa-trash' aria-hidden='true'></i>
                            </button>";
                }
            }

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $results->no_permintaan;
            $row[] = $results->tgl_permintaan;
            $row[] = $results->alasan_permintaan;
            $row[] = $results->catatan_permintaan;
            $row[] = $results->tempo_barang;
            $row[] = $status_permintaan;
            $row[] = $Approv;
            $row[] = $sla;
            $row[] = $button;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permintaan_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permintaan_barang',
                ['no', 'no_permintaan', 'tgl_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'tempo_barang', 'status_permintaan', 'pinca_approv', 'sla'],
                ['no_permintaan', 'tgl_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'tempo_barang', 'status_permintaan', 'pinca_approv', 'sla']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function tambahPermintaanbarang()
    {
        $data = array(
            'sgbarang'  =>  $this->General->fetch_records('tbl_sgbarang'),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'autoNoPerBar' => $this->General->autoNoPerBar()
        );

        $this->header('List Permintaan Barang');
        $this->load->view('Permintaanbarang/tambah_permintaanbarang', $data);
        $this->footer();
    }

    public function savePermintaanbarang()
    {
        $permintaanhead = array(
            // 'id_permintaan' => input('id_permintaan'),
            'id_uker' => $this->session->userdata('user_login')['id_uker'],
            'no_permintaan' => input('no_permintaan'),
            'tgl_permintaan' => input('tgl_permintaan'),
            'alasan_permintaan' => input('alasan_permintaan'),
            'catatan_permintaan' => input('catatan_permintaan'),
            'tempo_barang' => input('tempo_barang'),
            'status_permintaan' => 0,
            'pinca_approv' => 0,
            'permintaan_barang_created_by' => $this->session->userdata('user_login')['id_uker']
        );

        // cetak_die($permintaanhead);

        $savePermintaanBarang = $this->General->insertRecord('tbl_permintaan_barang', $permintaanhead);

        // cetak($savePermintaanBarang);
        // lastq();

        if ($savePermintaanBarang) {
            $id_permintaan = $this->db->insert_id();
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_permintaan' => $id_permintaan,
                    'no_urut' => $val,
                    // 'nama_merek' => $_POST['nama_merek'][$key],
                    // 'tipe_barang' => $_POST['tipe_barang'][$key],
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'permintaan_det_created_by' => $this->session->userdata('user_login')['username']
                );
            }
            $savePermintaandet = $this->General->insertBatch('tbl_permintaan_barang_det', $result);

            // lastq();

            if ($savePermintaandet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record added Successfully..!');
                redirect('Permintaanbarang');
            } else {
                $this->session->set_flashdata('error', 'Record added Failed..!');
                redirect('Permintaanbarang');
            }
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Permintaanbarang');
        }
    }

    public function editPermintaanbarang($id_permintaan)
    {
        $data = array(
            'permintaan' => $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        $this->header('Edit Permintaan Barang');
        $this->load->view('Permintaanbarang/edit_permintaanbarang', $data);
        $this->footer();
    }

    public function updatePermintaanbarang($id_permintaan)
    {
        $permintaanhead = array(
            // 'id_permintaan' => input('id_permintaan'),
            'tgl_permintaan' => input('tgl_permintaan'),
            'no_permintaan' => input('no_permintaan'),
            'alasan_permintaan' => input('alasan_permintaan'),
            'catatan_permintaan' => input('catatan_permintaan'),
            'tempo_barang' => input('tempo_barang'),
            'pinca_approv' => 0,
            'permintaan_barang_updated_date' => date('Y-m-d H:i:s'),
            'permintaan_barang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $updatePermintaan = $this->General->update_record($permintaanhead, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');

        if ($updatePermintaan) {
            $this->General->deleteData('tbl_permintaan_barang_det', ['id_permintaan' => $id_permintaan]);

            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_permintaan' => $id_permintaan,
                    'no_urut' => $val,
                    // 'id_merk' => $val,
                    // 'id_tipe_barang' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'permintaan_det_created_by' => $this->session->userdata('user_login')['username']
                );
            }
            // cetak_die($result);

            $updatePermintaandet = $this->General->insertBatch('tbl_permintaan_barang_det', $result);
            // lastq();

            if ($updatePermintaandet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Permintaanbarang');
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Permintaanbarang');
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Permintaanbarang');
        }
    }

    public function viewPermintaanbarang($id_permintaan)
    {
        $data = array(
            'permintaan' => $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]),
            'barang' => $this->General->fetch_records('tbl_barang'),
        );

        $this->header('View Permintaan Barang');
        $this->load->view('Permintaanbarang/view_permintaanbarang', $data);
        $this->footer();
    }

    public function tolakPermintaanbarang($id_permintaan)
    {
        $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]);
        $this->session->userdata('user_login')['id_sgroup'] == 14;

        $data = array(
            'tgl_approve_pinca' => date('Y-m-d'),
            'pinca_approv' => 2,
        );

        $pinca = $this->General->update_record($data, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');

        if ($pinca) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Permintaan Barang berhasil di approv!');
            redirect('Permintaanbarang');
        } else {
            $this->session->set_flashdata('error', 'Permintaan Barang gagal di approv!');
            redirect('Permintaanbarang');
        }
    }

    public function approvPermintaanbarang($id_permintaan)
    {
        $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]);
        $this->session->userdata('user_login')['id_sgroup'] == 14;

        $data = array(
            'tgl_approve_pinca' => date('Y-m-d'),
            'pinca_approv' => 1,
        );

        $pinca = $this->General->update_record($data, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');

        if ($pinca) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Permintaan Barang berhasil di approv!');
            redirect('Permintaanbarang');
        } else {
            $this->session->set_flashdata('error', 'Permintaan Barang gagal di approv!');
            redirect('Permintaanbarang');
        }
    }

    public function deletePermintaanbarang()
    {
        $deletePermintaanbarang = $this->General->deleteData('tbl_permintaan_barang', ['id_permintaan' => input('id_permintaan')]);

        if ($deletePermintaanbarang) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data gagal dihapus!";
        }

        echo json_encode($message);
    }

    public function fromSG(){
        $id_sgbarang = input('id_sgbarang');
        
        $where = ['id_sgbarang' => $id_sgbarang];

        $isidata = '';

        $nm_brg = $this->General->fetch_CoustomQuery("SELECT * FROM v_pencarianbarang WHERE id_sgbarang=$id_sgbarang");

        foreach($nm_brg as $row){
            $isidata .= '<option value="'.$row->no_urut.'">'.$row->nama_barang.'"</option>';
        }

        // cetak_die($isidata);

        $msg = [
            'data'  => $isidata
        ];

        echo json_encode($msg);

        // echo json_encode($nm_brg);
        // lastq();
        // echo json_encode($nm_brg);
        // if ($nm_brg) {
        //     $brg = array(

        //         'kode_barang' => $nm_brg[0]->kode_barang,
        //         'nama_barang' => $nm_brg[0]->nama_barang,
        //         // 'tipe_barang' => $nm_brg[0]->tipe_barang,
        //         // 'kode_barang' => $nm_brg[0]->kode_barang,
        //         // 'nama_barang' => $nm_brg[0]->nama_barang,
        //     );

        //     echo json_encode($brg);
        // } else {
        //     echo json_encode(false);
        // }
    }

    public function caribarang()
    {
        $no_urut = input('no_urut');
        $where = ['no_urut' => $no_urut];


        $nm_brg = $this->General->fetch_records('v_caribarang', $where);

        if ($nm_brg) {
            $brg = array(

                'no_urut' => $nm_brg[0]->no_urut,
                'nama_merek' => $nm_brg[0]->nama_merek,
                'tipe_barang' => $nm_brg[0]->tipe_barang,
                // 'kode_barang' => $nm_brg[0]->kode_barang,
                // 'nama_barang' => $nm_brg[0]->nama_barang,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }
}
