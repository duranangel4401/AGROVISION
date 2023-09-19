<?php
defined('BASEPATH') or exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP


class Productor extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('login')) {
			$idProductorLogeado = $this->session->userdata('idProductor');
			$datosProductor = $this->usuario_model->datosProductorLogeado($idProductorLogeado);
			$data['datosProductor'] = $datosProductor;
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/inicio_lte', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

	public function modificarProductorDatos()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $_POST['idProductor'];
			$data['datosProductor'] = $this->productor_model->recuperarDatosProductor($idProductor);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/modificarProductor', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarProductorBDD()
	{
		if ($this->session->userdata('login')) {

			$idProductor = $_POST['idProductor'];
			$data['nombres'] = $_POST['nombres'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
			$data['sexo'] = $_POST['sexo'];
			$data['telefonos'] = $_POST['telefonos'];
			$data['email'] = $_POST['email'];
			$data['nombreUsuario'] = $_POST['nombreUsuario'];

			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$this->productor_model->modificarProductor($idProductor, $data);
			redirect('productor/index', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	////////////////////CAMBIO DE CONTRASEÑA////////////////////////////////////////////
	////////////////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////

	public function cambioContrasenia()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/vistaUsuario/cambioContraseña_formulario');
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function verificarDatosContrasenia()
	{
		if ($this->session->userdata('login')) {

			$idProductor = $this->session->userdata('idProductor');
			$contraseniaActual = $_POST['contraseniaActual'];
			$contraseniaNueva = $_POST['contraseniaNueva'];
			$repeContraseniaNueva = $_POST['repeContraseniaNueva'];

			$data['contrasenia'] = md5($contraseniaNueva);

			$consulta = $this->contrasenia_model->verificarPasswordProductor($idProductor, $contraseniaActual);

			if ($consulta->num_rows() > 0) {
				if ($contraseniaNueva == $repeContraseniaNueva) {
					$this->contrasenia_model->actualizarContraseniaProductor($idProductor, $data);
					redirect('usuarios/logout', 'refresh');
				} else {
					redirect('productor/cambioContrasenia', 'refresh');
				}
			} else {
				redirect('productor/cambioContrasenia', 'refresh');
			}
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}



















































































	public function produccion()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$data['listaProduccion'] = $this->produccion_model->listaProduccion($idProductor);
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/produccion/list_produccion', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function agregarNuevaProduccion()
	{
		if ($this->session->userdata('login')) {

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/produccion/agregarProduccion');
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function agregarProduccionBDD()
	{
		if ($this->session->userdata('login')) {
			$data['nombre'] = $_POST['nombre'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['fechaInicio'] = $_POST['fechaInicio'];
			$data['fechaFin'] = $_POST['fechaFin'];

			$data['idProductor'] = $this->session->userdata('idProductor');

			$this->produccion_model->agregarProduccion($data);
			redirect('productor/produccion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarProduccion()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$idProduccion = $_POST['idProduccion'];
			$data['datosProduccion'] = $this->produccion_model->recuperarDatosProduccion($idProductor, $idProduccion);
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/produccion/ModificarProduccion', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function modificarProduccionBDD()
	{
		if ($this->session->userdata('login')) {
			$idProduccion = $_POST['idProduccion'];
			$data['nombre'] = $_POST['nombre'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['fechaInicio'] = $_POST['fechaInicio'];
			$data['fechaFin'] = $_POST['fechaFin'];
			$data['fechaActualizacion'] = date('y-m-d H:i:s');


			$data['idProductor'] = $this->session->userdata('idProductor');

			$this->produccion_model->modificarProduccion($idProduccion, $data);
			redirect('productor/produccion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function deshabilitarProduccion()
	{
		if ($this->session->userdata('login')) {
			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idProductor'] = $this->session->userdata('idProductor');
			$idProduccion = $_POST['idProduccion'];
			$data['estado'] = '0';

			$this->produccion_model->DeshabilitarProduccion($idProduccion, $data);
			redirect('productor/produccion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function gestionarProduccionClasificacion()
	{
		if ($this->session->userdata('login')) {

			$idProductor = $_POST['idProductor'];
			$idProduccion = $_POST['idProduccion'];

			$data['listaClasificaciones'] = $this->clasificacion_model->obtenerClasificaciones($idProductor);

			$data['nombreProduccion'] = $this->produccion_model->nombreProduccion($idProduccion);

			$data['obtenerProduccionClasificaciones'] = $this->produccionClasificacion_model->obtenerProduccionClasificaciones($idProduccion);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/produccion/gestionarProduccionClasificacion', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}





















































































	public function clasificacion()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$data['listaClasificacion'] = $this->clasificacion_model->listaClasificacion($idProductor);
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/clasificacion/list_clasificacion', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function agregarNuevaClasificacion()
	{
		if ($this->session->userdata('login')) {

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/clasificacion/agregarClasificacion');
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function agregarClasificacionBDD()
	{
		if ($this->session->userdata('login')) {
			$data['nombre'] = $_POST['nombre'];
			$data['rangoMinimo'] = $_POST['rangoMinimo'];
			$data['rangoMaximo'] = $_POST['rangoMaximo'];

			$data['idProductor'] = $this->session->userdata('idProductor');

			$this->clasificacion_model->agregarClasificacion($data);
			redirect('productor/clasificacion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarClasificacion()
	{
		if ($this->session->userdata('login')) {
			$idClasificacion = $_POST['idClasificacion'];
			$data['datosClasificacion'] = $this->clasificacion_model->recuperarDatosClasificacion($idClasificacion);
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/clasificacion/modificarClasificacion', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
	public function modificarClasificacionBDD()
	{
		if ($this->session->userdata('login')) {
			$idClasificacion = $_POST['idClasificacion'];
			$data['nombre'] = $_POST['nombre'];
			$data['rangoMinimo'] = $_POST['rangoMinimo'];
			$data['rangoMaximo'] = $_POST['rangoMaximo'];
			$data['idProductor'] = $this->session->userdata('idProductor');
			$data['fechaActualizacion'] = date('y-m-d H:i:s');

			$this->clasificacion_model->modificarClasificacion($idClasificacion, $data);
			redirect('productor/clasificacion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function deshabilitarClasificacion()
	{
		if ($this->session->userdata('login')) {
			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idProductor'] = $this->session->userdata('idProductor');
			$idClasificacion = $_POST['idClasificacion'];
			$data['estado'] = '0';

			$this->clasificacion_model->deshabilitarClasificacion($idClasificacion, $data);
			redirect('productor/clasificacion', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}





















































































	public function ingresoProducto()
	{
		if ($this->session->userdata('login')) {

			$idProductor = $this->session->userdata('idProductor');
			$data['obtenerTotalKilosBs'] = $this->reportesProductor_model->obtenerTotalKilosBs($idProductor);
			$data['totalIngresoBs'] = $this->reportesProductor_model->totalIngresoBs($idProductor);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/ingresoProducto/list_ingresoProducto',$data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}

















































































































	public function reporte()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$lista = $this->reportesProductor_model->obtenerTotalProductor($idProductor);
			$data['datosClasificacionProductor'] = $lista;

			$data['totalSeleccionadosProductor'] = $this->reportesProductor_model->totalSeleccionadosProductor($idProductor);
			$data['totalKilosProductor'] = $this->reportesProductor_model->totalKilosProductor($idProductor);
			$data['totalIngresoBs'] = $this->reportesProductor_model->totalIngresoBs($idProductor);

			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/reporte/list_reporte', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}





















































































	public function web()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$lista = $this->web_model->listaPublicoWeb($idProductor);
			$data['listaPublicoWeb'] = $lista;
			$this->load->view('vistaProductor/extem/1_cabecera');
			$this->load->view('vistaProductor/extem/2_menu_Superior');
			$this->load->view('vistaProductor/extem/3_menu_Lateral');
			$this->load->view('vistaProductor/web/list_web', $data);
			$this->load->view('vistaProductor/extem/4_pie');
		} else {
			redirect('usuarios/index/2', 'refresh');
		}
	}
}
