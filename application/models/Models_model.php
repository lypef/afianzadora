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
        $this->db->where('password',base64_encode(md5($password)));
        $r = $this->db->get('users');

        if ($r->num_rows() > 0)
        {
            $this->session->set_userdata('session_username',$r->row()->username);
            $this->session->set_userdata('session_name',$r->row()->name);
            $this->session->set_userdata('session_id',$r->row()->id);
            return true;
        }else {return false; }
    }

}

?>