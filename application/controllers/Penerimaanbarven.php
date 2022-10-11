<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penerimaanbarven extends MY_Controller
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

        $this->header('List Penerimaan Barang Vendor');
        $this->load->view('Penerimaanbarven/list_penbarven');
        $this->footer();
    }

    public function listPenerimaanbarven()
    {
        $list = $this->Serverside->_serverSide(
            'v_pohead',
            ['no', 'no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'sla'],
            ['no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'sla'],
            ['id_po' => 'desc'],
            ['kadiv_approv' => 1],
            'data'
        );

        $data = array();
        $no = $_POST['start'];

        foreach ($list as $results) {
            $tanggal_now = new DateTime(date('Y-m-d'));
            $tanggal_pemenuhan = new DateTime(date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po))));
            $jumlah_hari = $tanggal_now->diff($tanggal_pemenuhan);

            if ($results->wakadiv_approv == 1 && $results->kadiv_approv == 1) {
                if ($results->status_po == 1) {
                    $sla = '<a title="Selesai! ' . $results->sla . '" class="btn_dispo btn fa fa-thumbs-up" style="color:green" type="button"></a>';
                } else if ($jumlah_hari->format("%R") == '+' and $jumlah_hari->format("%a") > '0') {
                    $sla = '<a title="Proses ' . abs($jumlah_hari->format("%a") - '0') . ' Hari" class="btn fa fa-thumbs-up" style="color:green" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                } else {
                    $sla = '<a title="Terlambat ' . abs($jumlah_hari->format("%a") - '0') . ' Hari!" class="btn fa fa-thumbs-down" style="color:red" type="button">+' . abs($jumlah_hari->format("%a") - '0') . '</a>';
                }
            } else {
                $sla = "-";
            }

            $row = array();
            $no++;
            $row[] = $no;
            $row[] = "<a style='cursor: pointer;' onclick='VPurchaseorder($results->id_po)'>" . $results->no_po . "</a>";
            $row[] = $results->tanggal_po;
            $row[] = $results->nama_project;
            $row[] = $results->nama_uker;
            $row[] = $results->nama_vendor;
            $row[] = date('Y-m-d', strtotime('+' . $results->jtempo_pemenuhan . ' days', strtotime($results->tanggal_po)));
            $row[] = $sla;
            $row[] = $results->status_po == 1 ? labelWarna('danger', 'Close') : labelWarna('success', 'Open');
            $row[] = "<a href='" . base_url('Penerimaanbarven/detailListpenbarven/' . $results->id_po) . "' class='btn btn-primary btn-sm' " . getEditperm() . ">
                        <i class='fa fa-align-center'></i>
                     </a>";
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Serverside->_countAll('v_pohead'),
            "recordsFiltered" => $this->Serverside->_serverSide(
                'v_pohead',
                ['no', 'no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'sla'],
                ['no_po', 'tanggal_po', 'nama_project', 'nama_uker', 'nama_vendor', 'jenis_pembayaran', 'jtempo_pemenuhan', 'sla'],
                null,
                ['kadiv_approv' => 1, 'wakadiv_approv' => 1]
            ),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detailListpenbarven($id_po)
    {
        $data['detailDo'] = $this->General->fetch_records("v_dohead", ['id_po' => $id_po]);
        $data['id_po'] = $id_po;


        $this->header('Detail List Penerimaan Barang Vendor');
        $this->load->view('Penerimaanbarven/detail_list_penbarven', $data);
        $this->footer();
    }

    public function tambahDO($id_po)
    {
        $data['detailDo'] = $this->General->fetch_records("v_podet", ['id_po' => $id_po]);
        $data['barang'] = $this->General->fetch_records("tbl_barang");
        $data['id_po'] = $id_po;


        $this->header('Tambah Data Delivery Order');
        $this->load->view('Penerimaanbarven/tambahDO', $data);
        $this->footer();
    }

    public function saveDo($id_po)
    {
        $doHead = array(
            'id_po' => $id_po,
            'tgl_do' => input('tgl_do'),
            'tgl_kirim' => input('tgl_kirim'),
            'tgl_terima' => input('tgl_terima'),
            'telp_pengirim' => input('telp_pengirim'),
            'no_do' => input('no_do'),
            'nama_pengirim' => input('nama_pengirim'),
            'nama_penerima' => input('nama_penerima'),
            'keterangan' => input('kethead'),
            'status_do' => 1,
            'do_status_date'    =>  input('tgl_terima'),
            'do_created_by' => $this->session->userdata('user_login')['username'],
        );

        $saveDohead = $this->General->insertRecord('tbl_do', $doHead);

        if ($saveDohead) {
            $id_do = $this->db->insert_id();

            foreach ($_POST['no_urut'] as $key => $val) {
                $po = $this->General->getRow('tbl_po_det', ['id_po' => $id_po, 'no_urut' => $val]);

                $result = array(
                    'id_do' => $id_do,
                    'no_urut' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['ketdet'][$key],
                    'dodet_created_by' => $this->session->userdata('user_login')['username']
                );
                // cetak_die($result);
                $this->General->insertRecord('tbl_do_detail', $result);

                $id_do_detail = $this->db->insert_id();
                for ($i = 0; $i < $_POST['qty'][$key]; $i++) {
                    $dataBarQc = array(
                        'id_do_detail' => $id_do_detail,
                        'id_det_currency' => $po->id_det_currency,
                        'no_urut' => $val,
                        'harga_barang' => $po->harga_satuan,
                        'id_rak' => 10,
                    );
                    // cetak_die('stop');
                    $this->General->insertRecord('tbl_barang_temp', $dataBarQc);
                }
            }

            LogActivity($this->db->last_query());
            $this->session->set_flashdata('success', 'Record added Successfully..!');
            redirect('Penerimaanbarven/detailListpenbarven/' . $id_po);
        } else {
            $this->session->set_flashdata('error', 'Record added Failed..!');
            redirect('Penerimaanbarven/detailListpenbarven/' . $id_po);
        }
    }

    public function editDO($id_do)
    {
        $data['do'] = $this->General->getRow("v_dohead", ['id_do' => $id_do]);
        $data['barang'] = $this->General->fetch_records("tbl_barang");


        $this->header('Edit Data Delivery Order');
        $this->load->view('Penerimaanbarven/editDO', $data);
        $this->footer();
    }

    public function updateDo($id_po, $id_do)
    {
        $doHead = array(
            'id_po' => $id_po,
            'tgl_do' => input('tgl_do'),
            'tgl_kirim' => input('tgl_kirim'),
            'tgl_terima' => input('tgl_terima'),
            'telp_pengirim' => input('telp_pengirim'),
            'no_do' => input('no_do'),
            'nama_pengirim' => input('nama_pengirim'),
            'nama_penerima' => input('nama_penerima'),
            'keterangan' => input('kethead'),
            'do_status_date' => input('tgl_terima'),
            'status_do' => 1,
            'do_created_by' => $this->session->userdata('user_login')['username'],
        );

        $saveDohead = $this->General->update_record($doHead, ['id_do' => $id_do], 'tbl_do');

        if ($saveDohead) {
            $result = array();

            foreach ($_POST['id_do_detail'] as $key => $val) {
                $result[] = array(
                    'id_do_detail' => $val,
                    'qty' => $_POST['qty'][$key],
                    'keterangan' => $_POST['ketdet'][$key],
                    'dodet_update_date' => date('Y-m-d H:i:s'),
                    'dodet_update_by' => $this->session->userdata('user_login')['username']
                );
            }

            $saveDodet = $this->General->updateBatch('tbl_do_detail', $result, 'id_do_detail');

            if ($saveDodet) {
                LogActivity($this->db->last_query());
                $this->session->set_flashdata('success', 'Record updated Successfully..!');
                redirect('Penerimaanbarven/detailListpenbarven/' . $id_po);
            } else {
                $this->session->set_flashdata('error', 'Record updated Failed..!');
                redirect('Penerimaanbarven/detailListpenbarven/' . $id_po);
            }
        } else {
            $this->session->set_flashdata('error', 'Record updated Failed..!');
            redirect('Penerimaanbarven/detailListpenbarven/' . $id_po);
        }
    }

    public function deleteDO()
    {
        $deleteDO = $this->General->deleteData('tbl_do', ['id_do' => input('id_do')]);

        if ($deleteDO) {
            LogActivity($this->db->last_query());
            $message = "Data berhasil dihapus!";
        } else {
            $message = "Data berhasil dihapus!";
        }

        echo json_encode($message);
    }

    public function tambahPenerimaanbarven()
    {

        $this->header('Tambah Penerimaan Barang Vendor');
        $this->load->view('Penerimaanbarven/tambah_penbarver');
        $this->footer();
    }

    public function detailPO()
    {
        $detailPo = $this->General->fetch_records("v_podet", ['id_po' => input('id_po')]);

        echo json_encode($detailPo);
    }
}
