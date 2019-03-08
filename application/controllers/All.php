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

	public function fiadores_gestionar ()
	{
		LoginCheck();
		$pag = $this->input->get('pagina');
		$buscar = $this->input->get('search');
		$limit = '';
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT id FROM fiadores WHERE razon_social like '.$like.' or contactos like '.$like.' or correo1 like '.$like.' or correo2 like '.$like.' or telefonos like '.$like.' ')->num_rows() / 12, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM `fiadores`')->num_rows() / 12, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT * FROM fiadores WHERE razon_social like '.$like.' or contactos like '.$like.' or correo1 like '.$like.' or correo2 like '.$like.' or telefonos like '.$like.' ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT * FROM `fiadores`  '.$limit.' ')->result();
		}
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('fiadores_gestionar', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function fiadores_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'razon_social' => $this->input->post('razon_social'),
			'contactos'  => $this->input->post('contactos'),
			'correo1'  => $this->input->post('correo1'),
			'telefonos'  => $this->input->post('telefonos'),
			'correo2'  => $this->input->post('correo2')
		);
		
		$this->db->insert('fiadores',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?fiadoraddtrue=true');
		}else
		{
			redirect($url.'?fiadoraddfalse=false');
		}
	}

	public function fiadores_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'razon_social' => $this->input->post('razon_social'),
			'contactos'  => $this->input->post('contactos'),
			'correo1'  => $this->input->post('correo1'),
			'telefonos'  => $this->input->post('telefonos'),
			'correo2'  => $this->input->post('correo2')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('fiadores', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?fiadoraupdatetrue=true');
		}else
		{
			redirect($url.'?fiadorupdatefalse=false');
		}
	}

	public function fiadores_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('fiadores');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?fiadoradeletetrue=true');
		}else
		{
			redirect($url.'?fiadordeletefalse=false');
		}
	}

	public function afianzadores_tipos ()
	{
		LoginCheck();
		$pag = $this->input->get('pagina');
		$buscar = $this->input->get('search');
		$limit = '';
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT id FROM afianzadores_tipos WHERE nombre like '.$like.'  ')->num_rows() / 12, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM `afianzadores_tipos`')->num_rows() / 12, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT * FROM afianzadores_tipos WHERE nombre like '.$like.'  ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT * FROM `afianzadores_tipos`  '.$limit.' ')->result();
		}
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('afianzadores_tipos', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function afianzadores_tipo_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'nombre' => $this->input->post('tipo_fianza')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('afianzadores_tipos', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afiador_tipo_aupdatetrue=true');
		}else
		{
			redirect($url.'?afiador_tipo_aupdatefalse=false');
		}
	}

	public function afianzadores_tipo_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('afianzadores_tipos');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afiador_tipo_deletetrue=true');
		}else
		{
			redirect($url.'?afiador_tipo_deletefalse=false');
		}
	}

	public function afianzador_tipo_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'nombre' => $this->input->post('nombre')
		);
		
		$this->db->insert('afianzadores_tipos',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?fiadoraddtrue=true');
		}else
		{
			redirect($url.'?fiadoraddfalse=false');
		}
	}

	public function afianzadoras ()
	{
		LoginCheck();
		$pag = $this->input->get('pagina');
		$buscar = $this->input->get('search');
		$limit = '';
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = number_format($this->db->query('SELECT id FROM afianzadoras WHERE nombre like '.$like.' or razon_social like '.$like.'  ')->num_rows() / 12, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT id FROM `afianzadoras`')->num_rows() / 12, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT * FROM afianzadoras WHERE nombre like '.$like.' or razon_social like '.$like.'  ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT * FROM `afianzadoras`  '.$limit.' ')->result();
		}
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('afianzadoras', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function afianzadoras_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'razon_social' => $this->input->post('razon_social'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email')
		);
		
		$this->db->insert('afianzadoras',$data);

		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadoraaddtrue=true');
		}else
		{
			redirect($url.'?afianzadoraaddfalse=false');
		}
	}

	public function afianzadoras_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'nombre' => $this->input->post('nombre'),
			'razon_social' => $this->input->post('razon_social'),
			'direccion' => $this->input->post('direccion'),
			'telefono' => $this->input->post('telefono'),
			'email' => $this->input->post('email')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('afianzadoras', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadora_aupdatetrue=true');
		}else
		{
			redirect($url.'?afianzadora_aupdatefalse=false');
		}
	}

	public function afianzadoras_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('afianzadoras');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadora_deletetrue=true');
		}else
		{
			redirect($url.'?afianzadora_deletefalse=false');
		}
	}
}
