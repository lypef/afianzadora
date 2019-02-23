<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Models_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $r = $this->db->get('users');

        if ($r->num_rows() > 0)
        {
            $this->session->set_userdata('username',$username);
            return true;
        }else {return false; }
    }

}

?>