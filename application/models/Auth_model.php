<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function AuthLogin($username, $password)
    {
        $this->db->select("*");
        $this->db->from('tbl_user');
        $this->db->where('username', $username);
        $this->db->where('password', sha1(md5($password)));
        $query = $this->db->get();

        return $query->first_row('array');
    }
}
