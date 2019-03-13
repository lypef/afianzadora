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

	public function fianzas_gestionar ()
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
			$TotalPags = number_format($this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_factura like '.$like.' ')->num_rows() / 10, 0, '', ' ');
		}
		else
		{
			$TotalPags = number_format($this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id')->num_rows() / 10, 0, '', ' ');
		}

		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = $TotalPags;
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_factura like '.$like.'  ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id '.$limit.' ')->result();
		}
		
		$data['fiadores'] = $this->db->query('SELECT id, razon_social FROM `fiadores` order by razon_social asc')->result();
		$data['afianzadores_tipos'] = $this->db->query('SELECT * FROM afianzadores_tipos order by nombre asc')->result();
		$data['afianzadora'] = $this->db->query('SELECT id, nombre FROM afianzadoras order by nombre asc')->result();

		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('fianzas_gestionar', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function fianzas_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'fiador' => $this->input->post('fiador'),
			'contrato' => $this->input->post('contrato'),
			'tipo_fianza' => $this->input->post('tipo_fianza'),
			'folio_fianza' => $this->input->post('folio_fianza'),
			'afianzadora' => $this->input->post('afianzadora'),
			'fecha_emision' => $this->input->post('fecha_emision'.$this->input->post('id')),
			'folio_factura' => $this->input->post('folio_factura'),
			'monto_factura' => floatval($this->input->post('monto_factura')),
			'fecha_pago' => $this->input->post('fecha_pago'.$this->input->post('id')),
			'entrega' => $this->input->post('entrega')
		);
		
		$this->db->where('id', $this->input->post('id'))->update('fianzas', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadora_aupdatetrue=true&search='.$this->input->post('contrato'));
		}else
		{
			redirect($url.'?afianzadora_aupdatefalse=false&search='.$this->input->post('contrato'));
		}
	}

	public function fianzas_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('fianzas');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?fianza_deletetrue=true');
		}else
		{
			redirect($url.'?fianza_deletefalse=false');
		}
	}
}
