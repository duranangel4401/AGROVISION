<?php
defined('BASEPATH') or exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

// http://localhost:9094/web2/SIS_TECNOSTREAMING/Proyecto/index.php/clienteStream

class Usuarios extends CI_Controller
{ //ESTO ES HERERNCIA, ACCEDEMOS A NUESTRO CONTROLADOR Welcome.php

    public function index()
    {
        $data['msg'] = $this->uri->segment(3);

        if ($this->session->userdata('login')) {
            redirect('usuarios/panel', 'refresh');
        } else {
            $data['msg'] = $this->uri->segment(3);
            $this->load->view('login', $data);
        }
    }
    public function validarUsuario()
    {
        // RECUPERAMOS LOS DATOS DE NUESTRO DATOS
        $login = $_POST['login'];
        $password = md5($_POST['password']);

        $consulta = $this->usuario_model->validarAdmin($login, $password);

            if ($consulta->num_rows() > 0) {
            foreach ($consulta->result() as $row) {
                //mientas la secion este abierta se puede llamar desde cualquier parte del proyecto
                $this->session->set_userdata('idUsuario', $row->id);
                $this->session->set_userdata('login', $row->nombreUsuario);
                $this->session->set_userdata('tipo', $row->rol);
                $this->session->set_userdata('fullName', $row->fullName);


                redirect('usuarios/panel', 'refresh');
            }
        } else {
            $consulta2 = $this->usuario_model->validarProductor($login, $password);
            if ($consulta2->num_rows() > 0) {
                foreach ($consulta2->result() as $row) {
                    //mientas la secion este abierta se puede llamar desde cualquier parte del proyecto
                    $this->session->set_userdata('idProductor', $row->id);
                    $this->session->set_userdata('login', $row->nombreUsuario);
                    $this->session->set_userdata('tipo', $row->rol);
                    $this->session->set_userdata('fullName', $row->fullName);
                    $this->session->set_userdata('descripcion', $row->descripcion);
                    $this->session->set_userdata('email', $row->email);
                    $this->session->set_userdata('telefonos', $row->telefonos);

                    redirect('usuarios/panel', 'refresh');
                }
            } else {
                redirect('usuarios/index/1', 'refresh');
            }
        }
    }
    // A ESTE METODO LLEGA TODOS LOS USUARIOS CORRECTAMENTE AUTENTICADOS
    public function panel()
    {
        if ($this->session->userdata('login')) {
            $tipo = $this->session->userdata('tipo');
            if ($tipo == 'Administrador') {
                redirect('administrador/index', 'refresh');
            } else {
                redirect('productor/index', 'refresh');
            }
        } else {
            redirect('usuarios/index/2', 'refresh');
        }
    }
    // METODO QUE SE UTILIZARA CUANDO EL USUARIO CIERRE CESSION
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuarios/index/3', 'refresh');
    }

    // RESTABLECER LA CONTRASEÑA
    public function recovery()
    {
        $this->load->view('recovery');
    }


















    ////////////////////////////////////////////////////////////////
    /////////////////   CRUD     ///////////////////////////////////
    ///////////////////////////////////////////////////////////////

    public function agregarProductorBDD()
    {
        if ($this->session->userdata('login')) {
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['sexo'] = $_POST['sexo'];
            $data['telefono'] = $_POST['telefonos'];
            $data['email'] = $_POST['email'];
            $data['rol'] = 'Administrador';
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

            $this->usuario_model->agregarUsuario($data);
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
        $consulta = $this->usuario_model->verificarNameUser($nombreUsuario);

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
        $this->load->view('vistaAdministrador/vistaUsuario/registro_exitoso_view');
    }



    public function modificarUsuario()
    {
        if ($this->session->userdata('login')) {
            $idUsuario = $_POST['idUsuario'];
            $data['datosUsuario'] = $this->usuario_model->recuperarDatosUsuario($idUsuario);

            $this->load->view('vistaAdministrador/extem/1_cabecera');
            $this->load->view('vistaAdministrador/extem/2_menu_Superior');
            $this->load->view('vistaAdministrador/extem/3_menu_Lateral');
            $this->load->view('vistaAdministrador/vistaUsuario/modificarUsuario', $data);
            $this->load->view('vistaAdministrador/extem/4_pie');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    public function modificarUsuarioBDD()
    {
        if ($this->session->userdata('login')) {

            $idUsuario = $_POST['idUsuario'];
            $data['nombres'] = $_POST['nombres'];
            $data['primerApellido'] = $_POST['primerApellido'];
            $data['segundoApellido'] = $_POST['segundoApellido'];
            $data['fechaNacimiento'] = $_POST['fechaNacimiento'];
            $data['sexo'] = $_POST['sexo'];
            $data['telefono'] = $_POST['telefonos'];
            $data['email'] = $_POST['email'];
            $data['nombreUsuario'] = $_POST['nombreUsuario'];

            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');

            $this->usuario_model->modificarUsuario($idUsuario, $data);
            redirect('administrador/index', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
    public function deshabilitarUsuario()
    {
        if ($this->session->userdata('login')) {
            $data['fechaActualizacion'] = date('y-m-d H:i:s');
            $data['idUsuario'] = $this->session->userdata('idUsuario');
            $idUsuario = $_POST['idUsuario'];
            $data['estado'] = '0';

            $this->usuario_model->deshabilitarUsuario($idUsuario, $data);
            redirect('administrador/index', 'refresh');
        } else {
            redirect('usuarios/index', 'refresh');
        }
    }
}
