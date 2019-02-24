<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class All extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('Models_model');
		$this->load->helper('helpers');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{
		if ( !is_null ($this->input->post('username')) )
		{
			if ($this->Models_model->login($_POST['username'], $_POST['password']))
			{
				redirect(base_url().'all/dashboard/?yessession=true');
			}
			else
			{
				redirect(base_url().'?nosession=true');
			}
		}else
		{
			if (LoginCheckBool())
			{
				redirect(base_url().'all/dashboard');
			}else
			{
				$this->load->view('layout/header');
				$this->load->view('login');
				$this->load->view('layout/footer');
			}
		}
	}

	public function login_close ()
	{
		$this->session->sess_destroy();
		redirect(base_url().'?bye=true');
	}

	public function dashboard ()
	{
		LoginCheck();
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('dashboard');
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}
}
