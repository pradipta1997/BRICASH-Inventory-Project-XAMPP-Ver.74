<?php
class Chained extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("user_login")) {
            redirect('Auth');
        }
    }
    
    public function Listsubgroupbarang($id_gbarang = null)
    {
        $sgroupbarang = $this->General->select_where('tbl_sgbarang', ['id_gbarang' => $id_gbarang]);
        $lists = "<option value=''>Select Subgroup Barang</option>";
        if ($sgroupbarang) {
            foreach ($sgroupbarang as $data) {
                $lists .= "<option value='" . $data['id_sgbarang'] . "'>" . $data['nama_sgbarang'] . "</option>";
            }
        }
        echo json_encode($lists);
    }

    public function Listmerekbarang($id_sgbarang = null)
    {
        $merek = $this->General->select_where('tbl_merek', ['id_sgbarang' => $id_sgbarang]);
        $lists = "<option value=''>Select Merek Barang</option>";
        if ($merek) {
            foreach ($merek as $data) {
                $lists .= "<option value='" . $data['id_merek'] . "'>" . $data['nama_merek'] . "</option>";
            }
        }
        echo json_encode($lists);
    }

    public function listgudang($id_uker = null)
    {
        $merek = $this->General->select_where('tbl_gudang', ['id_uker' => $id_uker]);
        $lists = "<option value=''>Select Gudang</option>";
        if ($merek) {
            foreach ($merek as $data) {
                $lists .= "<option value='" . $data['id_gudang'] . "'>" . $data['nama_gudang'] . "</option>";
            }
        }
        echo json_encode($lists);
    }

    public function listsubgroupuser($id_group = null)
    {
        $subgroupuser = $this->General->select_where('tbl_user_subgroup', ['id_group' => $id_group]);
        $lists = "<option value=''>Select Subgroup User</option>";
        if ($subgroupuser) {
            foreach ($subgroupuser as $data) {
                $lists .= "<option value='" . $data['id_subgroup'] . "'>" . $data['nama_subgroup'] . "</option>";
            }
        }
        echo json_encode($lists);
    }
}
