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
				redirect(base_url().'all/fianzas_gestionar/?yessession=true');
			}
			else
			{
				redirect(base_url().'?nosession=true');
			}
		}else
		{
			if (LoginCheckBool())
			{
				redirect(base_url().'all/fianzas_gestionar');
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
			$TotalPags = $this->db->query('SELECT id FROM fiadores WHERE razon_social like '.$like.' or contactos like '.$like.' or correo1 like '.$like.' or correo2 like '.$like.' or telefonos like '.$like.' ')->num_rows() / 12;
		}
		else
		{
			$TotalPags = $this->db->query('SELECT id FROM `fiadores`')->num_rows() / 12;
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = ceil($TotalPags);
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
			$TotalPags = $this->db->query('SELECT id FROM afianzadores_tipos WHERE nombre like '.$like.'  ')->num_rows() / 12;
		}
		else
		{
			$TotalPags = $this->db->query('SELECT id FROM `afianzadores_tipos`')->num_rows() / 12;
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = ceil($TotalPags);
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
			$TotalPags = $this->db->query('SELECT id FROM afianzadoras WHERE nombre like '.$like.' or razon_social like '.$like.'  ')->num_rows() / 12;
		}
		else
		{
			$TotalPags = $this->db->query('SELECT id FROM `afianzadoras`')->num_rows() / 12;
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = ceil($TotalPags);
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
		$fiador = $this->input->get('fiador');
		$afianzadora = $this->input->get('afianzadora');
		
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_factura like '.$like.' ')->num_rows() / 10;
		}
		else
		{
			if  ($fiador > 0)
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.id = '.$fiador.' ')->num_rows() / 10;
			}
			else if ($afianzadora > 0)
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.id = '.$afianzadora.' ')->num_rows() / 10;
			}
			else
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id')->num_rows() / 10;
			}
			
		}

		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = ceil($TotalPags);
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.folio_factura like '.$like.'  ' . $limit .' ')->result();
		}
		else
		{
			if  ($fiador > 0)
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.id = '.$fiador.' '.$limit.' ')->result();
			}
			else if ($afianzadora > 0)
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.id = '.$afianzadora.' '.$limit.' ')->result();
			}
			else
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id '.$limit.' ')->result();
			}
			
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

	public function fianzas_gestionar_cancelaciones ()
	{
		LoginCheck();
		$pag = $this->input->get('pagina');
		$buscar = $this->input->get('search');
		$limit = '';
		$fiador = $this->input->get('fiador');
		$afianzadora = $this->input->get('afianzadora');
		
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.folio_factura like '.$like.' ')->num_rows() / 10;
		}
		else
		{
			if  ($fiador > 0)
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.id = '.$fiador.'  and f.active = 0 ')->num_rows() / 10;
			}
			else if ($afianzadora > 0)
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.id = '.$afianzadora.'  and f.active = 0 ')->num_rows() / 10;
			}
			else
			{
				$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 ')->num_rows() / 10;
			}
			
		}

		$limit = 'LIMIT '.(($pag * 10) - 10).', 10;';
		$data['pags'] = ceil($TotalPags);
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and fi.razon_social like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.contrato like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and t.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.folio_fianza like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and a.nombre like '.$like.' or f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 and f.folio_factura like '.$like.'  ' . $limit .' ')->result();
		}
		else
		{
			if  ($fiador > 0)
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and fi.id = '.$fiador.' and f.active = 0 '.$limit.' ')->result();
			}
			else if ($afianzadora > 0)
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and a.id = '.$afianzadora.' and f.active = 0 '.$limit.' ')->result();
			}
			else
			{
				$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, fi.id as fiador_id, f.contrato, t.nombre as tipo_fianza, t.id as tipo_fianza_id, f.folio_fianza, a.nombre as afianzadora, a.id as afianzadora_id, f.fecha_emision, f.folio_factura, f.monto_factura, f.fecha_pago, f.entrega, f.pdf_contrato_obra, f.pdf_constancia_situacion_fiscal, f.pdf_estados_financiero, f.pdf_comprobante_domicilio, f.pdf_ife_representante_legal, f.pdf_curp, f.active, f.comentarios FROM fianzas f, fiadores fi, afianzadores_tipos t, afianzadoras a where f.fiador = fi.id and f.tipo_fianza = t.id and f.afianzadora = a.id and f.active = 0 '.$limit.' ')->result();
			}
			
		}
		
		$data['fiadores'] = $this->db->query('SELECT id, razon_social FROM `fiadores` order by razon_social asc')->result();
		$data['afianzadores_tipos'] = $this->db->query('SELECT * FROM afianzadores_tipos order by nombre asc')->result();
		$data['afianzadora'] = $this->db->query('SELECT id, nombre FROM afianzadoras order by nombre asc')->result();

		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('fianzas_gestionar_cancelaciones', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function fianzas_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'fiador' => $this->input->post('fiador_0'),
			'contrato' => $this->input->post('contrato'),
			'tipo_fianza' => $this->input->post('tipo_fianza_0'),
			'folio_fianza' => $this->input->post('folio_fianza'),
			'afianzadora' => $this->input->post('afianzadora_0'),
			'fecha_emision' => $this->input->post('fecha_emision0'),
			'folio_factura' => $this->input->post('folio_factura'),
			'monto_factura' => floatval($this->input->post('monto_factura')),
			'fecha_pago' => $this->input->post('fecha_pago0'),
			'entrega' => $this->input->post('entrega')
		);
		
		
		//print_r($data);
		$this->db->insert('fianzas',$data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect(base_url().'/all/fianzas_gestionar?afianzadora_aupdatetrue=true&search='.$this->input->post('contrato'));
		}else
		{
			redirect(base_url().'/all/fianzas_gestionar?afianzadora_aupdatefalse=false&search='.$this->input->post('contrato'));
		}
	}
	
	public function fianzas_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'fiador' => $this->input->post('fiador_'.$this->input->post('id')),
			'contrato' => $this->input->post('contrato'),
			'tipo_fianza' => $this->input->post('tipo_fianza_'.$this->input->post('id')),
			'folio_fianza' => $this->input->post('folio_fianza'),
			'afianzadora' => $this->input->post('afianzadora_'.$this->input->post('id')),
			'fecha_emision' => $this->input->post('fecha_emision'.$this->input->post('id')),
			'folio_factura' => $this->input->post('folio_factura'),
			'monto_factura' => floatval($this->input->post('monto_factura')),
			'fecha_pago' => $this->input->post('fecha_pago'.$this->input->post('id')),
			'entrega' => $this->input->post('entrega')
		);
		
		//print_r($data);
		$this->db->where('id', $this->input->post('id'))->update('fianzas', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadora_aupdatetrue=true&search='.$this->input->post('contrato'));
		}else
		{
			redirect($url.'?afianzadora_aupdatefalse=false&search='.$this->input->post('contrato'));
		}
	}

	public function fianzas_update_active_no ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'active' => false
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

	public function fianzas_update_active_si ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'active' => true
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
	
	public function fianzas_update_comment ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'comentarios' => $this->input->post('comentarios'.$this->input->post('id'))
		);
		
		//print_r($data);
		$this->db->where('id', $this->input->post('id'))->update('fianzas', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?afianzadora_aupdatetrue=true&search='.$this->input->post('contrato'));
		}else
		{
			redirect($url.'?afianzadora_aupdatefalse=false&search='.$this->input->post('contrato'));
		}
	}

	public function fianzas_up_docs ()
	{
		LoginCheck();
		$id = $this->input->post('id'); $contrato = $this->input->post('contrato');
		$date = date("YmdHis");
		
		$pdf_contrato_obra = false; $situacion_fiscal= false; $estados_financieros= false; $comprobante_domicilio= false;	
		$pdf_contrato_obra_url = ""; $situacion_fiscal_url= ""; $estados_financieros_url= ""; $comprobante_domicilio_url= "";	
		
		$ife_r_legal= false; $curp= false;
		$ife_r_legal_url= ""; $curp_url= "";

		$config['upload_path'] = "../../documentos/";
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5000';
		$config['max_width']  = '5024';
		$config['max_height']  = '5768';
		$config['file_name'] = 'finza_'.$id.'_'. $date .'.pdf';
		$this->load->library('upload', $config);

		//subir pdf_contrato_obra
		if ($this->upload->do_upload('pdf_contrato_obra'.$this->input->post('id')))
		{
			$pdf_contrato_obra = true;
			$pdf_contrato_obra_url = $config['upload_path'] . $config['file_name'];
		}
		

		//subir situacion_fiscal
		if ($this->upload->do_upload('situacion_fiscal'.$this->input->post('id')))
		{
			$situacion_fiscal = true;
			$situacion_fiscal_url = $config['upload_path'] . 'finza_'.$id.'_'. $date .'1.pdf';
		}

		//subir estados_financieros
		if ($this->upload->do_upload('estados_financieros'.$this->input->post('id')))
		{
			$estados_financieros = true;
			$estados_financieros_url = $config['upload_path'] . 'finza_'.$id.'_'. $date .'2.pdf';
		}

		//subir comprobante_domicilio
		if ($this->upload->do_upload('comprobante_domicilio'.$this->input->post('id')))
		{
			$comprobante_domicilio = true;
			$comprobante_domicilio_url = $config['upload_path'] .'finza_'.$id.'_'. $date .'3.pdf';
		}

		//subir ife_r_legal
		if ($this->upload->do_upload('ife_r_legal'.$this->input->post('id')))
		{
			$ife_r_legal = true;
			$ife_r_legal_url = $config['upload_path'] . 'finza_'.$id.'_'. $date .'4.pdf';
		}

		//subir curp
		if ($this->upload->do_upload('curp'.$this->input->post('id')))
		{
			$curp = true;
			$curp_url = $config['upload_path'] . 'finza_'.$id.'_'. $date .'5.pdf';
		}
		
		$data = array(
			'pdf_contrato_obra' => $pdf_contrato_obra_url,
			'pdf_constancia_situacion_fiscal' => $situacion_fiscal_url,
			'pdf_estados_financiero' => $estados_financieros_url,
			'pdf_comprobante_domicilio' => $comprobante_domicilio_url,
			'pdf_ife_representante_legal' => $ife_r_legal_url,
			'pdf_curp' => $curp_url
		);

		if ($pdf_contrato_obra && $situacion_fiscal && $estados_financieros && $comprobante_domicilio && $ife_r_legal && $curp)
		{
			$this->db->where('id', $this->input->post('id'))->update('fianzas', $data);
		
			if ($this->db->affected_rows() >= 1 )
			{
				redirect(base_url().'all/fianzas_gestionar?search='.$contrato.'&afianzadora_aupdatetrue');
			}else
			{
				redirect(base_url().'all/fianzas_gestionar?search='.$contrato.'&afianzadora_aupdatefals');
			}
		}else
		{
			redirect(base_url().'all/fianzas_gestionar?search='.$contrato.'&afianzadora_aupdatefals');
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

	public function manager_users ()
	{
		LoginCheck();
		
		$data['users'] = $this->db->query('SELECT * FROM users order by name asc')->result();

		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('manager_users', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function manager_users_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('users');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?process_deletetrue=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function manager_users_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		
		if (!empty($this->input->post('password')))
		{
			if ( base64_encode(md5($this->input->post('password'))) == base64_encode(md5($this->input->post('password_confirm'))) )
			{
				$data = array(
					'name' => $this->input->post('name'),
					'username' => $this->input->post('username'),
					'password' => base64_encode(md5($this->input->post('password')))
				);
			}else
			{
				redirect($url.'?no_posible=false');	
			}
		}else
		{
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username')
			);
		}
		
		
		$this->db->where('id', $this->input->post('id'))->update('users', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?updateusertrue=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function manager_users_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		
		$data = array(
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => base64_encode(md5($this->input->post('password')))
		);
		
		
		$this->db->insert('users',$data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?addusertrue=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function comisiones ()
	{
		LoginCheck();
		$pag = $this->input->get('pagina');
		$buscar = $this->input->get('search');
		$id_fiador = $this->input->get('id_fiador');
		$limit = '';
		if (is_null($pag))
		{
			$pag = 1;
		}
		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$TotalPags = $this->db->query('SELECT c.id FROM comisiones c, fianzas f, fiadores fi WHERE c.fianza = f.id and fi.id = f.fiador and f.contrato like '.$like.' or c.fianza = f.id and fi.id = f.fiador and fi.razon_social like '.$like.' or c.fianza = f.id and fi.id = f.fiador and f.folio_fianza like '.$like.' or c.fianza = f.id and fi.id = f.fiador and f.folio_factura like '.$like.' ')->num_rows() / 12;
		}
		else if (!is_null($id_fiador))
		{
			$TotalPags = $this->db->query('SELECT c.id FROM comisiones c, fianzas f, fiadores fi WHERE c.fianza = f.id and fi.id = f.fiador and f.fiador = '.$id_fiador.' ')->num_rows() / 12;
		}
		else
		{
			$TotalPags = $this->db->query('SELECT id FROM `comisiones`')->num_rows() / 12;
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = ceil($TotalPags);
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT c.id, f.contrato, c.endoso, fi.razon_social, c.prima_neta, c.comision_agente, IF( c.comision_acreditado > 0, "ACREDITADO", "PENDIENTE") as pago, c.comision_acreditado as pago_boolean, IF( c.facturado > 0, "SI", "NO") as facturado_, c.facturado FROM comisiones c, fianzas f, fiadores fi WHERE c.fianza = f.id and fi.id = f.fiador and f.contrato like '.$like.' or c.fianza = f.id and fi.id = f.fiador and fi.razon_social like '.$like.' or c.fianza = f.id and fi.id = f.fiador and f.folio_fianza like '.$like.' or c.fianza = f.id and fi.id = f.fiador and f.folio_factura like '.$like.'  ' . $limit .' ')->result();
		}
		else if (!is_null($id_fiador))
		{
			$data['data'] = $this->db->query('SELECT c.id, f.contrato, c.endoso, fi.razon_social, c.prima_neta, c.comision_agente, IF( c.comision_acreditado > 0, "ACREDITADO", "PENDIENTE") as pago, c.comision_acreditado as pago_boolean, IF( c.facturado > 0, "SI", "NO") as facturado_, c.facturado FROM comisiones c, fianzas f, fiadores fi WHERE c.fianza = f.id and fi.id = f.fiador and f.fiador = '.$id_fiador.'  ' . $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT c.id, f.contrato, c.endoso, fi.razon_social, c.prima_neta, c.comision_agente, IF( c.comision_acreditado > 0, "ACREDITADO", "PENDIENTE") as pago, c.comision_acreditado as pago_boolean, IF( c.facturado > 0, "SI", "NO") as facturado_, c.facturado FROM comisiones c, fianzas f, fiadores fi WHERE c.fianza = f.id and fi.id = f.fiador  '.$limit.' ')->result();
		}
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('comisiones', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function comision_add ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		
		$data = array(
			'fianza' => $this->input->post('comision_0'),
			'endoso' => $this->input->post('comision_endoso'),
			'prima_neta' => floatval($this->input->post('comision_p_neta')),
			'comision_agente' => floatval($this->input->post('comision_agente'))
		);
		
		
		$this->db->insert('comisiones',$data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?addcomisiontrue=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function comision_delete ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$this->db->where('id', $this->input->post('id'))->delete('comisiones');
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?si_posible=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function comision_update ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'endoso' => $this->input->post('comision_endoso'),
			'comision_acreditado' => $this->input->post('comision_update'.$this->input->post('id')),
			'prima_neta' => floatval($this->input->post('comision_p_neta')),
			'comision_agente' => floatval($this->input->post('comision_agente'))
		);
		
		$this->db->where('id', $this->input->post('id'))->update('comisiones', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?si_posible=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function cobranza ()
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
			$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadoras a where f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and fi.razon_social LIKE '.$like.' or f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and f.contrato LIKE '.$like.' or f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and fi.contactos LIKE '.$like.' order by f.fecha_pago asc')->num_rows() / 12;
		}
		else
		{
			$TotalPags = $this->db->query('SELECT f.id FROM fianzas f, fiadores fi, afianzadoras a where f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 order by f.fecha_pago asc')->num_rows() / 12;
		}

		$limit = 'LIMIT '.(($pag * 12) - 12).', 12;';
		$data['pags'] = ceil($TotalPags);
		$data['pag'] = $pag;

		if (!is_null($buscar))
		{
			$like = "'%" .$buscar. "%'";
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, a.nombre, f.contrato, f.monto_factura, f.fecha_pago, fi.contactos, fi.correo1, fi.telefonos, fi.correo2 FROM fianzas f, fiadores fi, afianzadoras a where f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and fi.razon_social LIKE '.$like.' or f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and f.contrato LIKE '.$like.' or f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 and fi.contactos LIKE '.$like.' order by f.fecha_pago asc '. $limit .' ')->result();
		}
		else
		{
			$data['data'] = $this->db->query('SELECT f.id, fi.razon_social as fiador, a.nombre, f.contrato, f.monto_factura, f.fecha_pago, fi.contactos, fi.correo1, fi.telefonos, fi.correo2 FROM fianzas f, fiadores fi, afianzadoras a where f.fiador = fi.id and f.afianzadora = a.id and f.active = 1 and f.pagado = 0 order by f.fecha_pago asc  '.$limit.' ')->result();
		}
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_next');
		$this->load->view('cobranza', $data);
		$this->load->view('layout/footer_previus');
		$this->load->view('layout/footer');
	}

	public function cobranza_pay ()
	{
		LoginCheck();
		$url = $this->input->post('url');
		
		$data = array(
			'pagado' => 1
		);
		
		$this->db->where('id', $this->input->post('id'))->update('fianzas', $data);
		
		if ($this->db->affected_rows() >= 1 )
		{
			redirect($url.'?si_posible=true');
		}else
		{
			redirect($url.'?no_posible=false');
		}
	}

	public function CobranzaNotificaciones ()
	{
				$url = $this->input->post('url');
				$from = "cobranza@serviciosrjd.com";
        $to = $this->input->post('mail_to');
        $subject = $this->input->post('mail_subject');

        $cabecera = "From: SERVICIOS RJD <cobranza@serviciosrjd.com>"."\r\n";
        $cabecera .= "Content-type: text/html;  charset=utf-8"; 

        $message = $this->input->post('comentarios'.$this->input->post('id'));

				if (mail($to,$subject,$message, $cabecera))
				{
						redirect($url.'?si_posible=true');
				}else
				{
						redirect($url.'?no_posible=true');
				}
				
	}
}
