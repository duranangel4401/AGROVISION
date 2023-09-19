<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

// http://localhost:9094/web2/SIS_TECNOSTREAMING/Proyecto/index.php/clienteStream

class Web extends CI_Controller { //ESTO ES HERERNCIA, ACCEDEMOS A NUESTRO CONTROLADOR Welcome.php

	public function index()
	{
		$listaProductores = $this->productor_model->listaProductores();
		$data['listaProductores'] = $listaProductores;
        $this->load->view('web/paginaWeb',$data);
	}

	public function webProductor()
	{
		$idProductor = $_POST['idProductor'];
		$listaProductores = $this->web_model->listaProductorWeb($idProductor);
		$data['listaProductorWeb'] = $listaProductores;

		$listaProductores = $this->web_model->nombreProductor($idProductor);
		$data['nombreProductor'] = $listaProductores;
        $this->load->view('web/webProductor',$data);
	}
	
	public function agregarNuevapublicacion()
	{
		if ($this->session->userdata('login')) {

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/web/agregarNuevapublicacion');
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function subirPublicacionBDD()
	{
		if ($this->session->userdata('login')) {

			$data_tema['titulo'] = $_POST['titulo'];
			$data_tema['descripcion'] = $_POST['descripcion'];
			$data_contenido['detalle'] = $_POST['detalle'];
			
			$data_tema['idProductor']=$this->session->userdata('idProductor');

			$this->web_model->insertarPublicacion($data_tema,$data_contenido);

			redirect('productor/web', 'refresh');

		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function subirFoto()
	{
		if ($this->session->userdata('login')) {
			$data['idTemaPromocion'] = $_POST['idTemaPromocion'];
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/web/subirFotoPublicar',$data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function subirFotoBDD()
	{
		if ($this->session->userdata('login')) {

			//recepcionamos el id del cliente
			$idTemaPromocion = $_POST['idTemaPromocion'];
			$nombrearchivo = $idTemaPromocion . ".jpg";
			//CREAMOS UN ARRAY DE CONFIGURACION DE SUBIA
			$config['upload_path'] = './uploads/web/';
			$config['file_name'] = $nombrearchivo;
			$direccion = "./uploads/web/" . $nombrearchivo;

			if (file_exists($direccion)) {
				//SI EXISTE EL ARCHIVO BORRAMOS LA FOTO DE PERFIL PARA REEMPLAZARLA POR OTRA
				unlink($direccion);
			}

			$config['allowed_types'] = 'jpg|png';
			// cargamos la libreria con todos los parametros de configuracion
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()) {
				$data['error'] = $this->upload->display_errors();
			} else {
				$data['foto'] = $nombrearchivo;
				$this->web_model->modificarContenido($idTemaPromocion, $data); //trataba con base de datos
				$this->upload->data(); //copia el archivo en carpeta
			}
			redirect('productor/web', 'refresh');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function modificarPublico()
	{
		if ($this->session->userdata('login')) {
			$idTemaPromocion = $_POST['idTemaPromocion'];
			$data['recuperarDatos'] = $this->web_model->recuperarDatos($idTemaPromocion);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/web/modificarPublicidad',$data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function modificarPublicidadBDD()
	{
		if ($this->session->userdata('login')) {

			$idTemaPromocion=$_POST["idTemaPromocion"];
			$data_tema['titulo'] = $_POST['titulo'];
			$data_tema['descripcion'] = $_POST['descripcion'];
			$data_contenido['detalle'] = $_POST['detalle'];
			$data_contenido['fechaActualizacion'] = date('y-m-d H:i:s');
			$data_tema['fechaActualizacion'] = date('y-m-d H:i:s');


			
			$data_tema['idProductor']=$this->session->userdata('idProductor');

			$this->web_model->modificarPublicacion($idTemaPromocion, $data_tema, $data_contenido);

			redirect('productor/web', 'refresh');

		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}


	public function bajarWeb()
	{
		if ($this->session->userdata('login')) {
			$idTemaPromocion = $_POST['idTemaPromocion'];
			$data['estado'] = '0';

			$this->web_model->bajarPublicidad($idTemaPromocion, $data);
			redirect('productor/web', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	
}
