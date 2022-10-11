<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Serverside extends CI_Model
{
    public function _serverSide($table, $columnOrder = null, $columnSearch = null, $order = null, $where = null, $tipeResult = null)
    {
        $this->db->from($table);
        is_null($where) ?: $this->db->where($where);
        $i = 0;

        if ($columnSearch) {
            foreach ($columnSearch as $item) {
                if ($_POST['search']['value']) {
                    if ($i === 0) {
                        $this->db->group_start();
                        $this->db->like($item, $_POST['search']['value']);
                    } else {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    count($columnSearch) - 1 != $i ?:  $this->db->group_end();
                }
                $i++;
            }
        }

        if ($columnOrder) {
            if ($order) {
                if ($tipeResult) {
                    if (isset($_POST['order'])) {
                        $this->db->order_by($columnOrder[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
                    } else if (isset($order)) {
                        $this->db->order_by(key($order), $order[key($order)]);
                    }
                }

                if ($_POST['length'] != -1)
                    $this->db->limit($_POST['length'], $_POST['start']);
            }
        }

        $query = $this->db->get();

        if (is_null($tipeResult)) {
            return $query->num_rows();
        } else {
            return $query->result();
        }
    }

    public function _countAll($table, $where = null)
    {
        $this->db->from($table);
        is_null($where) ?: $this->db->where($where);
        return $this->db->count_all_results();
    }

    public function _countAllLike($table, $like = null)
    {
        // $this->db->from($table);
        // is_null($like) ?: $this->db->like($like);
        // return $this->db->count_all_results();
        $query = $this->db->query("SELECT count(DISTINCT nama_barang) as result FROM ".$table." WHERE nama_gbarang like '".$like."' ");
        // cetak_die($query);
        return $query->result();
    }
}
