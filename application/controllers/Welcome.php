<?php
defined('BASEPATH') OR exit('No direct script access allowed'); // ESTO ES UNA LINEA DE SERGURIDAD, NO ADMITE EJECUCION DIRECTA DE SCRIP

//EL CONTROLADOR EN REALIDAD VA A SER CLASES
//TAL COMO SE LLAMA MI ARCHIVO SE DEBE LLAMAR LA CLASE ejm. class Welcome y el archivo .php se llama Welcome.php
//El nombre de la clase siempre debe ser MAYUSCULA


//TENEMOS LA ARQUITECTURA DE UNA MODELO DE CLASE EN PHP
class Welcome extends CI_Controller { //ESTO ES HERERNCIA, ACCEDEMOS A NUESTRO CONTROLADOR Welcome.php

	//  http://localhost:9094/web2/Proyecto/index.php/welcome/index
	public function index() //ESTO ES UN METODO, ESTE METODO SE LLAMA INDEX
	{
		$this->load->view('welcome_message'); //manejador this VA A CARGAR LA VISTA WELCOME_MESSAGE, elcome_mesasge no lleva extencion 
	}

	//  http://localhost:9094/Proyecto/index.php/Welcome/holaMundo
	public function holaMundo(){
		$this->load->view('saludo');
	}
}
