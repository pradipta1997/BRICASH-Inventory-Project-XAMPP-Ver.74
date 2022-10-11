<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Model
{
    public function insertBatch($table, $data)
    {
        return $this->db->insert_batch($table, $data);
    }

    public function updateBatch($table, $data, $where)
    {
        return $this->db->update_batch($table, $data, $where);
    }

    public function count_all($tbl)
    {
        return $this->db->count_all($tbl);
    }

    public function getRow($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    //check child menu count
    public function checkchildMenuCount($pmenuid)
    {
        $whr = array(
            "parent_id" => $pmenuid
        );

        $this->db->where($whr);
        $this->db->from('tbl_user_menu');

        return $this->db->count_all_results();
    }

    // fetching records by single column
    public function fetch_bysinglecol($col, $tbl, $id)
    {
        $where = array(
            $col => $id
        );

        $this->db->select()->from($tbl)->where($where);
        $query = $this->db->get();

        return $query->result();
    }

    //Custom Query function
    public function fetch_CoustomQuery($sql)
    {
        $query = $this->db->query($sql);

        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    //find max id
    public function find_maxid($col, $tbl)
    {
        $query = $this->db->query("SELECT ifnull(max($col),'0') as $col FROM `$tbl`");

        return $query->row();
    }

    // add record
    function insertRecord($table, $array_data)
    {
        $query = $this->db->insert($table, $array_data);

        if ($query == 1)
            return $query;
        else
            return false;
    }

    //Fetch New Entry with Increment......
    public function fetch_maxid($tbl)
    {
        $this->db->select()->from($tbl);
        $query = $this->db->get();

        return $query->result();
    }

    // Fetch List for records...
    public function fetch_records($tbl, $where = null, $like = null)
    {
        $this->db->select()->from($tbl);
        is_null($where) ?: $this->db->where($where);
        is_null($like) ?: $this->db->like($like);
        $query = $this->db->get();

        return $query->result();
    }

    //fetch num rows of menus for a group
    public function fetch_per_groupmenu($id_sgroup, $id_menu)
    {
        $where = array(
            "id_sgroup" => $id_sgroup,
            "id_menu" => $id_menu
        );
        $query = $this->db->get_where('tbl_user_permission', $where);

        return $query->num_rows();
    }

    //fetch menus by a group
    public function fetch_groupid_menu($id_sgroup, $id_menu)
    {
        $where = array(
            "id_sgroup" => $id_sgroup,
            "id_menu" => $id_menu
        );
        $query = $this->db->get_where('tbl_user_permission', $where);

        return $query->result();
    }

    //updating permission records
    public function update_permissionrecord($data, $tbl, $where)
    {
        $this->db->where('id_per', $where);
        $this->db->update($tbl, $data);

        return true;
    }

    //get single record by id
    public function getbyId($select, $tbl, $where = null)
    {
        $this->db->select($select);
        $this->db->from($tbl);
        is_null($where) ?: $this->db->where($where);
        $i = $this->db->get();

        return $i->row();
    }

    // dynamic query for updating
    function update_record($update, $where, $tbl)
    {
        $this->db->where($where);

        return $this->db->update($tbl, $update);
    }

    //delete records
    public function deleteData($tbl, $whr)
    {
        return $this->db->delete($tbl, $whr);
    }

    //selecting and where clause dynamic query
    public function select_where($table, $where, $flag = '')
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        $query = $this->db->get();
        if ($flag == 's')
            return $query->row();
        else
            return $query->result_array();
    }

    function check_url_permission($id_menu)
    {
        $id_sgroup = $this->session->userdata('id_sgroup');
        $query = $this->db->query("SELECT * FROM tbl_user_menu AS um, tbl_user_permission AS up WHERE um.id_menu = '$id_menu' AND um.`id_menu` = up.`id_menu` AND up.`per_select` = 1 AND up.id_sgroup = $id_sgroup")->result();

        if ($query) {
            return $query;
        } else {
            redirect(base_url());
        }
    }

    public function getJumlahData($tbl, $where)
    {
        $query = $this->db->get_where($tbl, $where);

        return $query->num_rows();
    }

    //No Purchase Order Otomatis
    public function autoNoPo()
    {
        $this->db->select('LEFT(no_po,5) as noPo', FALSE);
        $this->db->order_by('id_po', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_po');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPo) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 5, "0", STR_PAD_LEFT);
        $kodejadi = $kodemax . "/CHM/PGD/" . $this->romawiBulan(date("n")) . "/" . date('Y');

        return $kodejadi;
    }

    //No Permintaan Teknisi Otomatis
    public function autoNoPertek()
    {
        $this->db->select('SUBSTRING(nomor_pertek,5,4) as noPer', FALSE);
        $this->db->order_by('id_pertek', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pertek');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPer) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PRMT" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');
        // $kodeJadi = $kodemax . "/PRMT/" . date('Y');

        return $kodeJadi;
    }

    //no pengiriman ke kp
    public function autoNoPengirimankeKP()
    {
        $this->db->select('SUBSTRING(no_permintaan,5,4) as noPer', FALSE);
        $this->db->order_by('id_pengirimankekp', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pengirimankekp');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPer) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PKKP" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');
        // $kodeJadi = $kodemax . "/PRMT/" . date('Y');

        return $kodeJadi;
    }


    //No Pengriman Barang Otomatis
    public function autoNoPengiriman()
    {
        $this->db->select('SUBSTRING(no_pengiriman,5,4) as noPeng', FALSE);
        $this->db->order_by('id_pengiriman', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pengiriman_barang');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPeng) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi = "PGRM" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');

        return $kodeJadi;
    }

    //No Permintaan Barang
    public function autoNoPerBar()
    {
        $this->db->select('SUBSTRING(no_permintaan,5,4) as noPerBar', FALSE);
        $this->db->order_by('id_permintaan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_permintaan_barang');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPerBar) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PRMB" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');

        return $kodeJadi;
    }

    public function autoNoPBJ()
    {
        $this->db->select('SUBSTRING(no_pbj,5,4) as noPerBar', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pbj');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPerBar) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PBJ" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');

        return $kodeJadi;
    }

    //No Pertek Otomatis
    public function autoNoPemLocal()
    {
        $this->db->select('SUBSTRING(nomor_pembelian,5,4) as noPem', FALSE);
        $this->db->order_by('id_pembelian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_pembelian');

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPem) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PMBL" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');
        // $kodeJadi = $kodemax . "/PRMT/" . date('Y');

        return $kodeJadi;
    }

    // Untuk no permohonan pembayaran PO Persediaan
    public function autoNoPPPo()
    {
        $this->db->select('MID(no_pp,2,4) as nopp, RIGHT(no_pp,4) as tahun', FALSE);
        $this->db->order_by('id_pp', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_permohonan_pembayaran');
        $data = $query->row();

        if ($query->num_rows() <> 0 && $data->tahun == date('Y')) {
            $tiket = intval($data->nopp) + 1;
        } else {
            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodejadi = "B" . $kodemax . "/CHM/PGD/PSD/" . $this->romawiBulan(date("n")) . "/" . date('Y');

        return $kodejadi;
    }


    public function autoNoPermohonanPem()
    {
        $this->db->select('SUBSTRING(no_permohonan_pem,5,4) as noPer', FALSE);
        $this->db->order_by('id_permohonan_pem', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_permohonan_pem');
        $data = $query->row();

        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $tiket = intval($data->noPer) + 1;
        } else {

            $tiket = 1;
        }

        $kodemax = str_pad($tiket, 4, "0", STR_PAD_LEFT);
        $kodeJadi =  "PPPB" . $kodemax . "/" . $this->romawiBulan(date("n")) . "/" . date('Y');
        // $kodeJadi = $kodemax . "/PRMT/" . date('Y');

        return $kodeJadi;
    }



    // Penerimaan Barang

    public function m_terimabarang($no_sn)
    {
        
    }


    private function romawiBulan($bulan)
    {
        switch ($bulan) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;

            default:
                return "Bulan tidak diketahui!";
                break;
        }
    }

    private function romawiTanggal($tanggal)
    {
        switch ($tanggal) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
            case 13:
                return "XIII";
                break;
            case 14:
                return "XIV";
                break;
            case 15:
                return "XV";
                break;
            case 16:
                return "XVI";
                break;
            case 17:
                return "XVII";
                break;
            case 18:
                return "XVIII";
                break;
            case 19:
                return "XIX";
                break;
            case 20:
                return "XX";
                break;
            case 21:
                return "XXI";
                break;
            case 22:
                return "XXII";
                break;
            case 23:
                return "XXIII";
                break;
            case 24:
                return "XXIV";
                break;
            case 25:
                return "XXV";
                break;
            case 26:
                return "XXVI";
                break;
            case 27:
                return "XXVII";
                break;
            case 28:
                return "XXVIII";
                break;
            case 29:
                return "XXIX";
                break;
            case 30:
                return "XXX";
                break;
            case 31:
                return "XXXI";
                break;

            default:
                return "Tanggal tidak diketahui!";
                break;
        }
    }


    public function generateSn($kodeBrg)
    {
        $kode_nama = $this->getRow('tbl_unit_kerja', ['id_uker' => $this->session->userdata('user_login')['id_uker']]);

        $this->db->select('no_sn');
        $this->db->order_by('id_stock', 'DESC');
        $this->db->like('no_sn', $kodeBrg . '-' . $kode_nama->kode_nama);
        $this->db->limit(1);
        $query = $this->db->get('tbl_stock');

        if ($query->num_rows() <> 0) {
            $this->db->select('RIGHT(tbl_stock.no_sn,6) as noSn', FALSE);
            $this->db->order_by('id_stock', 'DESC');
            $this->db->like('no_sn', $kodeBrg . '-' . $kode_nama->kode_nama);
            $this->db->limit(1);
            $lastNo = $this->db->get('tbl_stock');
            $data = $lastNo->row();
            $no = intval($data->noSn) + 1;
            $kodemax = str_pad($no, 6, "0", STR_PAD_LEFT);

            return $kodeBrg . "-" . $kode_nama->kode_nama . "-" . $kodemax;
        } else {
            return $kodeBrg . "-" . $kode_nama->kode_nama . "-" . str_pad(1, 6, "0", STR_PAD_LEFT);
        }
    }
}
