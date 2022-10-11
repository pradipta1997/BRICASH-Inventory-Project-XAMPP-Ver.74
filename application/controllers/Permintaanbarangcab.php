<?php

class Permintaanbarangcab extends MY_Controller
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
            'uker' => $this->General->fetch_records('tbl_unit_kerja'),
        );
        $this->header('List Permintaan Barang');
        $this->load->view('Permintaanpengbar/list_permintaanpengbar', $data);
        $this->footer();
    }

    public function listPermintaanbarang()
    {
        $list = $this->Serverside->_serverSide(
            'v_permintaan_barang',
            ['no', 'nama_uker', 'tgl_permintaan', 'no_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'sla', 'status_permintaan', 'pgd_approv'],
            ['nama_uker', 'tgl_permintaan', 'no_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'sla', 'status_permintaan', 'pgd_approv'],
            ['id_permintaan' => 'asc'],
            null,
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if ($results->pinca_approv == 1) {

                if ($results->pinca_approv == 1) {
                    $pincaApprov = labelWarna('success', 'Pinca Approv');
                } else {
                    $pincaApprov = labelWarna('danger', 'Pinca Non Approv');
                }

                if ($results->pgd_approv == 1) {
                    $pgdApprov = labelWarna('success', 'PGD Approv');
                } else if ($results->pgd_approv == 2) {
                    $pgdApprov = labelWarna('warning', 'Approval Ditolak PGD');
                } else {
                    $pgdApprov = labelWarna('danger', 'PGD Non Approv');
                }

                $Approv = "<p>$pincaApprov</p>";

                $tanggal_now = new DateTime(date('Y-m-d'));
                $tanggal_pemenuhan = new DateTime(date('Y-m-d', strtotime('+' . $results->tempo_barang . ' days', strtotime($results->tgl_permintaan))));
                $jumlah_hari = $tanggal_now->diff($tanggal_pemenuhan);

                if ($results->pinca_approv == 1) {
                    if ($results->status_permintaan == 1) {
                        $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                    } else {
                        $sla = '<a title="Terlambat ' . abs($jumlah_hari->format("%a") - '0') . ' hari"  class="btn fa fa-thumbs-down" style="color:red" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                    }
                } else {
                    $sla = "-";
                }

                $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->nama_uker;
                $row[] = $results->tgl_permintaan;
                $row[] = $results->no_permintaan;
                $row[] = $results->alasan_permintaan;
                $row[] = $results->catatan_permintaan;
                if ($results->status_permintaan == null) {
                    $row[] = labelWarna("danger", "Belum di Penuhi");
                } else if ($results->status_permintaan == 0) {
                    $row[] = labelWarna("danger", "Belum di Penuhi");
                } else if ($results->status_permintaan == 1) {
                    $row[] = labelWarna("success", "Sudah di Penuhi");
                }
                $row[] = $Approv." ".$pgdApprov;
                $row[] = $sla;
                $row[] = "<a href='" . base_url("Permintaanbarangcab/editPermintaanpengbar/" . $results->id_permintaan) . "' class='btn btn-warning btn-sm'>
                        <i class='fa fa-pencil-square-o'></i>
                    </a>";

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permintaan_barang'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_permintaan_barang',
                ['no', 'nama_uker', 'tgl_permintaan', 'no_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'status_permintaan'],
                ['nama_uker', 'tgl_permintaan', 'no_permintaan', 'alasan_permintaan', 'catatan_permintaan', 'status_permintaan']
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function filter()
    {
        $status_per = input('status_permintaan');
        $uker = input('id_uker');

        if ($status_per != 'All' && $uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE status_permintaan = '" . $status_per . "' AND  id_uker = '" . $uker . "' ");
        } else if ($status_per != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE status_permintaan = '" . $status_per . "' ");
        } else if ($uker != 'All') {
            $list = $this->General->fetch_CoustomQuery("SELECT * FROM v_permintaan_barang WHERE id_uker = '" . $uker . "' ");
        } else {
            $list = $this->General->fetch_records('v_permintaan_barang');
        }

        // lastq();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            if ($results->pinca_approv == 1) {

                if ($results->pinca_approv == 1) {
                    $pincaApprov = labelWarna('success', 'Pinca Approv');
                } else {
                    $pincaApprov = labelWarna('danger', 'Pinca Non Approv');
                }

                $Approv = "<p>$pincaApprov</p>";

                $tanggal_now = new DateTime(date('Y-m-d'));
                $tanggal_pemenuhan = new DateTime(date('Y-m-d', strtotime('+' . $results->tempo_barang . ' days', strtotime($results->tgl_permintaan))));
                $jumlah_hari = $tanggal_now->diff($tanggal_pemenuhan);

                if ($results->pinca_approv == 1) {
                    if ($results->status_permintaan == 1) {
                        $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                    } else {
                        $sla = '<a title="Terlambat ' . abs($jumlah_hari->format("%a") - '0') . ' hari"  class="btn fa fa-thumbs-down" style="color:red" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                    }
                } else {
                    $sla = "-";
                }

                $row = array();
                $no++;
                $row[] = $no;
                $row[] = $results->nama_uker;
                $row[] = $results->tgl_permintaan;
                $row[] = $results->no_permintaan;
                $row[] = $results->alasan_permintaan;
                $row[] = $results->catatan_permintaan;
                if ($results->status_permintaan == null) {
                    $row[] = labelWarna("danger", "Belum di Penuhi");
                } else if ($results->status_permintaan == 0) {
                    $row[] = labelWarna("danger", "Belum di Penuhi");
                } else if ($results->status_permintaan == 1) {
                    $row[] = labelWarna("success", "Sudah di Penuhi");
                }
                $row[] = $Approv;
                $row[] = $sla;
                $row[] = "<a href='" . base_url("Permintaanbarangcab/editPermintaanpengbar/" . $results->id_permintaan) . "' class='btn btn-warning btn-sm'>
                            <i class='fa fa-pencil-square-o'></i>
                        </a>";

                $data[] = $row;
            }
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_permintaan_barang'),
            "recordsFiltered" => $list,
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function editPermintaanpengbar($id_permintaan)
    {
        $data = array(
            'permintaan' => $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]),
            'barang' => $this->General->fetch_records('tbl_barang'),
            'layanan' => $this->General->fetch_records('tbl_layanan_ekspedisi'),
        );

        $this->header('Edit Permintaan Barang Cabang');
        $this->load->view('Permintaanpengbar/edit_permintaanpengbar', $data);
        // cetak_die($data);
        // lastq();
        $this->footer();
    }

    public function updatePermintaanpengbar($id_permintaan)
    {
        $pemenuhan = array(
            'id_permintaan' => $id_permintaan,
            'id_layanan_ekspedisi' => input('layanan'),
        );
        $value =  $this->General->deleteData('tbl_pemenuhan_barcab', ['id_permintaan' => $id_permintaan]);
        if ($value) {
            $this->General->insertRecord('tbl_pemenuhan_barcab', $pemenuhan);
        }
        // lastq();
        $permintaanhead = array(
            'tgl_permintaan' => input('tgl_permintaan'),
            'no_permintaan' => input('no_permintaan'),
            'alasan_permintaan' => input('alasan_permintaan'),
            'catatan_permintaan' => input('catatan_permintaan'),
            'tempo_barang' => input('tempo_barang'),
            'status_permintaan' => 0,
            'permintaan_barang_updated_date' => date('Y-m-d H:i:s'),
            'permintaan_barang_updated_by' => $this->session->userdata('user_login')['username']
        );

        $updatePermintaan = $this->General->update_record($permintaanhead, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');
        // lastq();
        if ($updatePermintaan) {
            $this->General->deleteData('tbl_permintaan_barang_det', ['id_permintaan' => $id_permintaan]);
            $this->General->deleteData('tbl_pemenuhan_barcab_det', ['id_permintaan' => $id_permintaan]);
            $result = array();

            foreach ($_POST['no_urut'] as $key => $val) {
                $result[] = array(
                    'id_permintaan' => $id_permintaan,
                    'no_urut' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['keterangan'][$key],
                    'permintaan_det_created_by' => $this->session->userdata('user_login')['username']
                );
            }
            // cetak_die($result);

            $updatePermintaandet = $this->General->insertBatch('tbl_permintaan_barang_det', $result);
            $this->General->insertBatch('tbl_pemenuhan_barcab_det', $result);
            // lastq();

            if ($updatePermintaandet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Permintaanbarangcab');
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Permintaanbarangcab');
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Permintaanbarangcab');
        }
    }

    public function approve_perbarcab($id){
        $permintaanhead = array(
            'pgd_approv' => 1
        );

        $updatePermintaan = $this->General->update_record($permintaanhead, ['id_permintaan' => $id], 'tbl_permintaan_barang');
        if ($updatePermintaan) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record updated Successfully..!');
            redirect('Permintaanbarangcab');
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Permintaanbarangcab');
        }
    }

    public function decline_perbarcab($id){
        $permintaanhead = array(
            'pgd_approv' => 2
        );

        $updatePermintaan = $this->General->update_record($permintaanhead, ['id_permintaan' => $id], 'tbl_permintaan_barang');
        if ($updatePermintaan) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record updated Successfully..!');
            redirect('Permintaanbarangcab');
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Permintaanbarangcab');
        }
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
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }

    public function cariNosn()
    {
        $no_sn = input('no_sn');
        $where = ['no_sn' => $no_sn];

        $nm_brg = $this->General->fetch_records('v_stock', $where);
        // cetak_die($nm_brg);
        if ($nm_brg) {
            $brg = array(
                // 'id_tmp' => $nm_brg[0]->id_tmp,
                'no_urut' => $nm_brg[0]->no_urut,
                'nama_gbarang' => $nm_brg[0]->nama_gbarang,
                'nama_sgbarang' => $nm_brg[0]->nama_sgbarang,
                'nama_merek' => $nm_brg[0]->nama_merek,
                'tipe_barang' => $nm_brg[0]->tipe_barang,
                'kode_barang' => $nm_brg[0]->kode_barang,
                'nama_barang' => $nm_brg[0]->nama_barang,
                // 'harga_barang' => $nm_brg[0]->harga_barang,
                // 'qty' => $nm_brg[0]->qty,
                // 'keterangan' => $nm_brg[0]->keterangan,
            );

            echo json_encode($brg);
        } else {
            echo json_encode(false);
        }
    }

    public function penuhiStatus($id_permintaan)
    {
        $this->General->getRow('tbl_permintaan_barang', ['id_permintaan' => $id_permintaan]);
        $this->session->userdata('user_login');

        $data = array(
            'status_permintaan' => 1,
        );

        $status = $this->General->update_record($data, ['id_permintaan' => $id_permintaan], 'tbl_permintaan_barang');

        if ($status) {
            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Status Permintaan Barang berhasil di penuhi!');
            redirect('Permintaanbarangcab');
        } else {
            $this->session->set_flashdata('error', 'Status Permintaan Barang gagal di penuhi!');
            redirect('Permintaanbarangcab');
        }
    }
}
