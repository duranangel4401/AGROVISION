<?php
defined('BASEPATH') or exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

class Administrador extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('login')) {

			$listaUsuarios = $this->usuario_model->listaUsuarios();
			$data['listaUsuarios'] = $listaUsuarios;
			$listaUsuarios = $this->usuario_model->listaUsuariosLogeado();
			$data['listaUsuariosLogeado'] = $listaUsuarios;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/vistaUsuario/inicio_lte', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function cambioContrasenia()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/vistaUsuario/cambioContrasenia');
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function verificarDatosContrasenia()
	{
		if ($this->session->userdata('login')) {

			$idUsuario = $this->session->userdata('idUsuario');
			$contraseniaActual = $_POST['contraseniaActual'];
			$contraseniaNueva = $_POST['contraseniaNueva'];
			$repeContraseniaNueva = $_POST['repeContraseniaNueva'];

			$data['contrasenia'] = md5($contraseniaNueva);

			$consulta = $this->contrasenia_model->verificarPasswordAdministrador($idUsuario, $contraseniaActual);

			if ($consulta->num_rows() > 0) {
				if ($contraseniaNueva == $repeContraseniaNueva) {
					$this->contrasenia_model->actualizarContraseniaAdministrador($idUsuario, $data);
					redirect('usuarios/logout', 'refresh');
				} else {
					redirect('administrador/cambioContrasenia', 'refresh');
				}
			} else {
				redirect('administrador/cambioContrasenia', 'refresh');
			}
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}




































	/* ---------------------------------------------------------------------------------------------------------------------------------------- */
	/*------------------   CRUD EN LA TABLA PRODUCTOR ------------------------------------------------------------------------------------------- */
	/* ---------------------------------------------------------------------------------------------------------------------------------------- */

	//MOSTRAR LA LISTA DE PRODCUTORES
	public function productor()
	{
		if ($this->session->userdata('login')) {
			$listaProductores = $this->productor_model->listaProductores();
			$data['listaProductores'] = $listaProductores;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/productor/list_productor', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	//FUNCION PARA AGREGAR NUEVO PRODUCTOR
	public function agregarNuevoProductor()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/productor/agregarNuevoProductorFormulario');
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function agregarProductorBDD()
	{
		if ($this->session->userdata('login')) {
			$data['nombres'] = $_POST['nombres'];
			$data['primerApellido'] = $_POST['primerApellido'];
			$data['segundoApellido'] = $_POST['segundoApellido'];
			$data['fechaNacimiento'] = $_POST['fechaNacimiento'];
			$data['sexo'] = $_POST['sexo'];
			$data['telefonos'] = $_POST['telefonos'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['email'] = $_POST['email'];
			$data['rol'] = 'Productor';
			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$nombre = $_POST['nombres'];
			$primerApellido = $_POST['primerApellido'];
			$segundoApellido = $_POST['segundoApellido'];
			$email = $_POST['email'];
			$nombreCompletoReceptor = $nombre . ' ' . $primerApellido . ' ' . $segundoApellido;

			$username = $this->generarNombreUsuarioUnico($nombre, $primerApellido, $segundoApellido);

			$data['nombreUsuario'] = $username;

			$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+=-';
			$password = substr(str_shuffle($characters), 0, 8);

			$data['contrasenia'] = md5($password);

			$datos_registro = array('nameUser' => $username, 'contraseniaUser' => $password);

			$this->session->set_userdata('datos_registro', $datos_registro);

			$this->session->set_userdata('NombreReceptor', $nombreCompletoReceptor);
			$this->session->set_userdata('nombreUsuarioReceptor', $username);
			$this->session->set_userdata('contraseniaReceptor', $password);
			$this->session->set_userdata('correoReceptor', $email);

			$this->productor_model->agregarProductor($data);
			redirect('administrador/mostrarDatosRegistro', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function generarNombreUsuarioUnico($nombres, $primerApellido, $segundoApellido)
	{
		// Obtener las iniciales del nombre y apellidos
		$iniciales = $this->obtenerIniciales($nombres, $primerApellido, $segundoApellido);

		// Generar un número aleatorio
		$numeroAleatorio = $this->generarNumeroAleatorio();

		// Combinar las iniciales y el número aleatorio para formar el nombre de usuario
		$nombreUsuario = $iniciales . $numeroAleatorio;

		// Verificar si el nombre de usuario generado ya existe en la base de datos
		$nombreUsuarioExistente = $this->verificarExistenciaNombreUsuario($nombreUsuario);

		// Si el nombre de usuario generado ya existe, generar uno nuevo hasta obtener uno único
		while ($nombreUsuarioExistente) {
			// Generar otro número aleatorio
			$numeroAleatorio = $this->generarNumeroAleatorio();

			// Combinar las iniciales y el nuevo número aleatorio
			$nombreUsuario = $iniciales . $numeroAleatorio;

			$nombreUsuarioExistente = $this->verificarExistenciaNombreUsuario($nombreUsuario);
		}

		return $nombreUsuario;
	}

	private function obtenerIniciales($nombres, $primerApellido, $segundoApellido)
	{
		// Obtener las iniciales del nombre y apellidos
		$iniciales = '';

		if (!empty($nombres))
			$iniciales .= $nombres[0];

		if (!empty($primerApellido))
			$iniciales .= $primerApellido[0];

		if (!empty($segundoApellido))
			$iniciales .= $segundoApellido[0];

		return strtoupper($iniciales);
	}

	private function generarNumeroAleatorio()
	{
		// Generar un número aleatorio entre 1000 y 9999
		return mt_rand(1000, 9999);
	}

	private function verificarExistenciaNombreUsuario($nombreUsuario)
	{
		$usuarioExiste = false;
		$consulta = $this->usuario_model->verificarNameUserProductor($nombreUsuario);

		if ($consulta->num_rows() > 0) {
			$usuarioExiste = true;
		}

		return $usuarioExiste;
	}

	public function generarContraseniaInicial()
	{
		// Generar una contraseña inicial aleatoria
		$caracteresPermitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		$contrasenia = '';
		$longitud = 8;

		for ($i = 0; $i < $longitud; $i++) {
			$indice = mt_rand(0, strlen($caracteresPermitidos) - 1);
			$contrasenia .= $caracteresPermitidos[$indice];
		}

		return $contrasenia;
	}

	public function validarContraseniaSegura($password)
	{
		$mayuscula = false;
		$minuscula = false;
		$numero = false;
		$careSpecial = false;
		$longitudMinima = 8;

		for ($i = 0; $i < strlen($password); $i++) {
			if (ctype_upper($password[$i])) {
				$mayuscula = true;
			} elseif (ctype_lower($password[$i])) {
				$minuscula = true;
			} elseif (ctype_digit($password[$i])) {
				$numero = true;
			} else {
				$careSpecial = true;
			}
		}

		if ($mayuscula && $minuscula && $numero && $careSpecial && strlen($password) >= $longitudMinima) {
			return true;
		}
		return false;
	}

	public function mostrarDatosRegistro()
	{
		// Load PHPMailer library
		$this->load->library('phpmailer_lib');

		// PHPMailer object
		$mail = $this->phpmailer_lib->load();

		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'agrovision147@gmail.com';
		$mail->Password = 'dvsbfbcocxssjsoj';
		$mail->SMTPSecure = 'ssl';
		$mail->Port     = 465;

		$mail->setFrom('agrovision147@gmail.com', 'AGROVISION ACCESOS PARA EL SISTEMA');
		$mail->addReplyTo('agrovision147@gmail.com', 'AGROVISION ACCESOS PARA EL SISTEMA');

		// Add a recipient
		$mail->addAddress($this->session->userdata('correoReceptor'));

		$mail->Subject = 'Bienvenido a AGROVISION - ACCESOS';

		// Set email format to HTML
		$mail->isHTML(true);

		// Email body content
		$mailContent = "<h1>ACCESOS AGROVISION, por favor cambie la contraseña lo mas antes posible</h1>
            <p>Nombre de Usuario: " . $this->session->userdata('nombreUsuarioReceptor') . " </p></hr>
			<p>Password: " . $this->session->userdata('contraseniaReceptor') . " </p></hr>";
		$mail->Body = $mailContent;

		// Send email
		if (!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		}
		$this->load->view('vistaAdministrador/productor/registro_exitoso_view');
	}
	public function modificarProductor()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $_POST['idProductor'];
			$data['iformacionProductor'] = $this->productor_model->recuperarDatosProductor($idProductor);

			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/productor/modificarProductor', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
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
			$data['descripcion'] = $_POST['descripcion'];
			$data['email'] = $_POST['email'];
			$data['rol'] = 'Productor';

			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$this->productor_model->modificarProductor($idProductor, $data);
			redirect('administrador/productor', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function deshabilitarProductor()
	{
		if ($this->session->userdata('login')) {
			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idUsuario'] = $this->session->userdata('idUsuario');
			$idUsuario = $_POST['idProductor'];
			$data['estado'] = '0';

			$this->productor_model->DeshabilitarProductor($idUsuario, $data);
			redirect('administrador/productor', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


























































	/* ---------------------------------------------------------------------------------------------------------------------------------------- */
	/*------------------   CRUD EN LA TABLA EQUIPO ------------------------------------------------------------------------------------------- */
	/* ---------------------------------------------------------------------------------------------------------------------------------------- */
	public function equipo()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->equipo_model->listaEquipos();
			$data['listaEquipos'] = $lista;
			//mostrar formulario(vista) para agregar un  nuevo estudiante
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/equipos/list_equipos', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function agregarNuevoEquipo()
	{
		if ($this->session->userdata('login')) {
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/equipos/agregarNuevoEquipoFormulario');
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function agregarEquipoBDD()
	{
		if ($this->session->userdata('login')) {
			$data['serie'] = $_POST['serie'];
			$data['descripcion'] = $_POST['descripcion'];

			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$this->equipo_model->agregarEquipo($data);
			redirect('administrador/equipo', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function modificarEquipo()
	{
		if ($this->session->userdata('login')) {
			$idEquipo = $_POST['idEquipo'];
			$data['iformacionEquipo'] = $this->equipo_model->recuperarDatosEquipo($idEquipo);

			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/equipos/modificarEquipo', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function modificarEquipoBDD()
	{
		if ($this->session->userdata('login')) {

			$idEquipo = $_POST['idEquipo'];

			$data['serie'] = $_POST['serie'];
			$data['descripcion'] = $_POST['descripcion'];
			$data['fechaActualizacion'] = date('y-m-d H:i:s');

			$data['idUsuario'] = $this->session->userdata('idUsuario');

			$this->equipo_model->modificarEquipo($idEquipo, $data);
			redirect('administrador/equipo', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	public function deshabilitarEquipo()
	{
		if ($this->session->userdata('login')) {
			$data['fechaActualizacion'] = date('y-m-d H:i:s');
			$data['idUsuario'] = $this->session->userdata('idUsuario');
			$idEquipo = $_POST['idEquipo'];
			$data['estado'] = '0';

			$this->equipo_model->DeshabilitarEquipo($idEquipo, $data);
			redirect('administrador/equipo', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}















































































	/* ---------------------------------------------------------------------------------------------------------------------------------------- */
	/*------------------   CRUD EN LA TABLA VENTA ------------------------------------------------------------------------------------------- */
	/* ---------------------------------------------------------------------------------------------------------------------------------------- */
	public function venta()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->venta_model->listaVentas();
			$data['listaVentas'] = $lista;
			//mostrar formulario(vista) para agregar un  nuevo estudiante
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/ventas/list_ventas', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function realizarNuevaVenta()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->productor_model->listaProductores();
			$data['listaProductores'] = $lista;
			$lista = $this->equipo_model->listaEquiposDisponibles();
			$data['listaEquipo'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/ventas/realizarNuevaVenta_formulario', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function agregarVentaBDD()
	{
		if ($this->session->userdata('login')) {
			// Recuperamos los datos enviados para la tabla VENTA
			$datosVenta = array(
				'fecha' => $_POST['fecha'],
				'idProductor' => $_POST['idProductor'],
				'idUsuario' => $this->session->userdata('idUsuario')
			);

			// Recuperamos los datos para la tabla DETALLEVENTA
			$detalleVenta = array(
				'idEquipo' => $_POST['idEquipo'],
				'precioUnitario' => $_POST['precio'],
				'cantidad' => 1 // Puedes ajustar esto según tus necesidades
			);

			$this->venta_model->registrarVenta($datosVenta, $detalleVenta);

			redirect('administrador/venta', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	public function modificarVenta()
	{
		if ($this->session->userdata('login')) {
			$idVenta = $_POST['idVenta'];
			$data['obtenerDetalleVenta'] = $this->venta_model->obtenerDetalleVenta($idVenta);

			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/ventas/modificarVenta', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function modificarVentaBDD()
	{
		if ($this->session->userdata('login')) {
			$idVenta = $_POST['idVenta'];

			// Datos para la tabla 'venta'
			$dataVenta = array(
				'fecha' => $_POST['fecha'],
				'total' => $_POST['precio'],
				'fechaActualizacion' => date('Y-m-d H:i:s'),
				'idUsuario' => $this->session->userdata('idUsuario')
			);

			// Datos para la tabla 'detalleventa'
			$dataDetalleVenta = array(
				'precioUnitario' => $_POST['precio'],
				'cantidad' => 1
			);

			// Llama al método del modelo para modificar la venta
			$this->venta_model->modificarVenta($idVenta, $dataVenta, $dataDetalleVenta);
			redirect('administrador/venta', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	public function cancelarVenta()
	{
		if ($this->session->userdata('login')) {
			$idVenta = $_POST['idVenta'];
			$idUsuario = $this->session->userdata('idUsuario');

			$this->venta_model->cancelarVenta($idVenta, $idUsuario);
			redirect('administrador/venta', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	public function imprimirVenta()
	{
		if ($this->session->userdata('login')) {


			redirect('administrador/venta', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}





























































	public function alquiler()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->alquiler_model->listaAlquiler();
			$data['listaAlquiler'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/alquiler/list_alquiler', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function realizarAlquiler()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->productor_model->listaProductores();
			$data['listaProductores'] = $lista;
			$lista = $this->equipo_model->listaEquiposDisponibles();
			$data['listaEquipo'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/alquiler/registrarAlquiler_formulario', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function agregarAlquilerBDD()
	{
		if ($this->session->userdata('login')) {
			// Recuperamos los datos enviados para la tabla VENTA
			$fechaRealDevolucion = new DateTime($_POST['fechaDevolucion']);
			$fechaRealDevolucion->add(new DateInterval('P15D')); // Agrega 15 días
			$datosAlquiler = array(
				'fechaAlquiler' => $_POST['fechaAlquiler'],
				'fechaDevolucion' => $_POST['fechaDevolucion'],
				'fechaRealDevolucion' => $fechaRealDevolucion->format('Y-m-d'), // Formatea la fecha de nuevo

				'idProductor' => $_POST['idProductor'],
				'idUsuario' => $this->session->userdata('idUsuario')
			);


			// Recuperamos los datos para la tabla DETALLEVENTA
			$detalleAlquiler = array(
				'idEquipo' => $_POST['idEquipo'],
				'precioAlquiler' => $_POST['precio'],
				'cantidad' => 1 // Puedes ajustar esto según tus necesidades
			);

			$this->alquiler_model->registrarAlquiler($datosAlquiler, $detalleAlquiler);

			redirect('administrador/alquiler', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function modificarAlquiler()
	{
		if ($this->session->userdata('login')) {
			$idAlquiler = $_POST['idAlquiler'];
			$data['obtenerDetalleAlquiler'] = $this->alquiler_model->obtenerDetalleAlquiler($idAlquiler);

			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/alquiler/modificarAlquiler', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

	public function modificarAlquilerBDD()
	{
		if ($this->session->userdata('login')) {
			// Obtén los datos del formulario
			$idAlquiler = $_POST['idAlquiler'];
			$idProductor = $_POST['idProductor'];
			$idEquipo = $_POST['idEquipo'];
			$precio = $_POST['precio'];
			$fechaAlquiler = $_POST['fechaAlquiler'];
			$fechaDevolucion = $_POST['fechaDevolucion'];
			$fechaActualizacion = date('y-m-d H:i:s');

			// Calcula la fecha de devolución real sumando 15 días
			$fechaRealDevolucion = date('Y-m-d', strtotime($fechaDevolucion . ' +15 days'));

			// Datos para la tabla Alquiler
			$datosAlquiler = array(
				'fechaAlquiler' => $fechaAlquiler,
				'fechaDevolucion' => $fechaDevolucion,
				'fechaRealDevolucion' => $fechaRealDevolucion,
				'fechaActualizacion' => $fechaActualizacion,
				'total' => $precio,
				'idProductor' => $idProductor,
				'idUsuario' => $this->session->userdata('idUsuario')
			);

			// Datos para la tabla DetalleAlquiler
			$detalleAlquiler = array(
				'precioAlquiler' => $precio,
				'cantidad' => 1 // Puedes ajustar esto según tus necesidades
			);

			$this->alquiler_model->modificarAlquilerYDetalle($idAlquiler, $idEquipo, $datosAlquiler, $detalleAlquiler);
			redirect('administrador/alquiler', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}


	public function cancelarAlquiler()
	{
		if ($this->session->userdata('login')) {
			$idAlquiler = $_POST['idAlquiler'];
			$idUsuario = $this->session->userdata('idUsuario');

			$this->alquiler_model->cancelarAlquiler($idAlquiler, $idUsuario);
			redirect('administrador/alquiler', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}








































































	public function reporte()
	{
		
		if ($this->session->userdata('login')) {
			$lista = $this->productor_model->listaProductores();
			$data['listaProductores'] = $lista;

			$lista = $this->reportes_model->obtenerTotalesPorClasificacion();
			$data['datosClasificacion'] = $lista;
			$lista = $this->reportes_model->obtenerTotalesGenerales();
			$data['obtenerTotalesGenerales'] = $lista;
			$lista = $this->reportes_model->obtenerProductoresActivos();
			$data['obtenerProductoresActivos'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/reportes/list_reportes', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function agregarPruebaDeInserciones()
	{
		if ($this->session->userdata('login')) {
			$lista = $this->productor_model->listaProductores();
			$data['listaProductores'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/reportes/datorPruebaInserciones', $data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
	public function AgregarDatosBDD()
	{
		if ($this->session->userdata('login')) {

			$idEquipo = $_POST['equipo'];
			$idAlquiler = $_POST['alquiler'];
			$idProduccion = $_POST['produccion'];
			$idProductor = $_POST['productor'];
			$pesoInicio = $_POST['pesoInicio'];
			$pesoFinal = $_POST['pesoFinal'];
			$cantidad = $_POST['cantidad'];
			$fechaInicio = $_POST['fechaInicio'];
			$fechaFinal = $_POST['fechaFinal'];

			$this->reportes_model->InsertarRegistrosKardex($idEquipo, $idAlquiler, $idProduccion, $idProductor, $pesoInicio, $pesoFinal, $cantidad, $fechaInicio, $fechaFinal);
			redirect('administrador/reporte', 'refresh');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}
























	


















	












	public function generarGraficos()
	{
		if ($this->session->userdata('login')) {

			$idProductor = $_POST['productor'];
			$idProduccion = $_POST['produccion'];
			$idEquipo = $_POST['equipo'];
			$fechaInicio = $_POST['fechaInicio'];
			$fechaFin = $_POST['fechaFinal'];

			$data['obtenerTotalPorEquipo'] = $this->reportes_model->obtenerTotalPorEquipo($idProductor, $idProduccion, $idEquipo, $fechaInicio, $fechaFin);


			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/reportes/generarGraficos',$data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}






	


















	


















	












	public function web()
	{
		if ($this->session->userdata('login')) {
			$idProductor = $this->session->userdata('idProductor');
			$lista = $this->web_model->listaPublicoWeb($idProductor);
			$data['listaPublicoWeb'] = $lista;
			$this->load->view('vistaAdministrador/extem/1_cabecera');
			$this->load->view('vistaAdministrador/extem/2_menu_Superior');
			$this->load->view('vistaAdministrador/extem/3_menu_Lateral');
			$this->load->view('vistaAdministrador/web/list_web',$data);
			$this->load->view('vistaAdministrador/extem/4_pie');
		} else {
			redirect('usuarios/index', 'refresh');
		}
	}

}
