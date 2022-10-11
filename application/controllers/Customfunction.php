<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customfunction extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }

    public function cekNoDO()
    {
        $value = input('value');
        $no_do = $this->General->fetch_CoustomQuery("SELECT * FROM tbl_do WHERE no_do = '$value'");
        if ($no_do) {
            echo json_encode(array("pesan" => "No DO sudah tersedia!", "tipe" => "error"));
        }
    }

    public function cekQtyBarPo()
    {
        // Cari id po nya
        $PO = $this->General->getRow('tbl_po_det', ['id_po_det' => input('id_po_det')]);

        // Cari do nya
        $DOJumlah = $this->General->getJumlahData('tbl_do', ['id_po' => $PO->id_po]);

        if ($DOJumlah > 0) {
            // Cek jumlah terima ketika do lebih dari 1
            $DO = $this->General->getRow('tbl_do', ['id_po' => $PO->id_po]);
            $jumlahTerima = 0;
            $cekJmlterima = $this->General->fetch_records('tbl_do_detail', ['id_do' => $DO->id_do, 'no_urut' => input('no_urut')]);
            foreach ($cekJmlterima as $value) {
                $jumlahTerima += $value->qty;
            }

            $jumlahTerima += input('value');

            if ($jumlahTerima > input("qty")) {
                echo json_encode(array("pesan" => "Qty melebihi data Qty pada PO!", "tipe" => "error"));
            }
        } else {
            if (input('value') > input("qty")) {
                echo json_encode(array("pesan" => "Qty melebihi data Qty pada PO!", "tipe" => "error"));
            }
        }
    }

    public function generateNoSn()
    {
        $kode_barang = input('kode_barang');
        $id_rak = input('id_rak');
        $noSN = $this->General->generateSn($kode_barang, $id_rak);

        echo json_encode($noSN);
    }

    public function noPerpem()
    {
        echo json_encode($this->General->autoNoPPPo());
    }

    public function cariVendor()
    {
        $id_vendor = input('id_vendor');
        $vendor = $this->General->getRow("tbl_vendor", ['id_vendor' => $id_vendor]);
        if ($vendor) {
            echo json_encode($vendor);
        } else {
            echo json_encode("-");
        }
    }

    public function cariInvoiceVendor()
    {
        $id_po = input('id_po2');
        if ($id_po == null) {
            $id_po = input('id_po');
        }
        $vendor = $this->General->getRow("v_pembayaranpo", ['id_po' => $id_po]);
        if ($vendor) {
            echo json_encode($vendor);
        } else {
            var_dump($id_po);
        }
    }

    public function getInvoiceBayar()
    {
        $id_po = input('id_po2');
        $no_do = $this->General->fetch_CoustomQuery("SELECT SUM(nilai_invoice) AS total_bayar FROM tbl_invoicebarang WHERE id_po = '".$id_po."'");
        var_dump($no_do);
    }

    public function cariInvoicePermohonanPembayaran()
    {
        $id_reg_inv = input('id_reg_inv');
        $tbl = $this->General->getRow("v_invoicebarang", ['id_invoice' => $id_reg_inv]);
        if ($tbl) {
            echo json_encode($tbl);
        } else {
            var_dump($id_reg_inv);
        }
    }

    public function cariStock()
    {
        $id_stock = input('id_stock');
        $vendor = $this->General->getRow("v_caristock", ['id_stock' => $id_stock]);
        if ($vendor) {
            echo json_encode($vendor);
        } else {
            var_dump($id_stock);
        }
    }

    // public function cariTipe()
    // {
    //     $id_tipe_barang = input('id_tipe_barang');
    //     $tipe = $this->General->getRow("tbl_tipe_barang", ['id_tipe_barang' => $id_tipe_barang]);
    //     if ($tipe) {
    //         echo json_encode($tipe);
    //     } else {
    //         echo json_encode("-");
    //     }
    // }
}
