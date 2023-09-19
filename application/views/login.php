<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<base href="">
	<meta charset="utf-8" />
	<title>AGROVISION-SIS</title>
	<meta name="description" content="Singin page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Page Custom Styles(used by this page)-->
	<link href="<?php echo base_url(); ?>adminlte/assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
	<!--end::Page Custom Styles-->
	<!--begin::Global Theme Styles(used by all pages)-->
	<link href="<?php echo base_url(); ?>adminlte/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>adminlte/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>adminlte/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Theme Styles-->
	<!--begin::Layout Themes(used by all pages)-->
	<!--end::Layout Themes-->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>adminlte/assets/media/logos/favicon.ico" />
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Login-->
		<div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
			<!--begin::Content-->
			<div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
				<!--begin::Wrapper-->
				<div class="login-content d-flex flex-column pt-lg-0 pt-12">
					<!--begin::Logo-->
					<!--
					<a href="#" class="login-logo pb-xl-20 pb-15">
						<img src="<?php echo base_url(); ?>adminlte/assets/media/logos/logo-4.png" class="max-h-70px" alt="" />
					</a>
					-->
					<!--end::Logo-->
					<!--begin::Signin-->
					<div class="login-form">
						<!--begin::Form-->
						<!--begin::Title-->
						<div class="pb-5 pb-lg-15">
							<h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Iniciar Sesión</h3>
							<?php
							switch ($msg) {
								case '1':
									$mensaje = 'Error de ingreso';
									$clase = "alert alert-danger alert-dismissible";
									break;
								case '2':
									$mensaje = 'Acceso no válido';
									$clase = "alert alert-warning alert-dismissible";
									break;
								case '3':
									$mensaje = 'Gracias por usar el sistema :)';
									$clase = "alert alert-warning alert-dismissible";
									break;
								default:
									$mensaje = 'Ingrese su Usuario y Contraseña para iniciar Secion';
									$clase = "alert alert-info alert-dismissible";
									break;
							}
							?>

							<div class="<?php echo $clase ?>>" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
								</button>
								<strong><?php echo $mensaje ?></strong>
							</div>
						</div>
						<!--begin::Title-->
						<!--begin::Form group-->
						<?php

						echo form_open_multipart('usuarios/validarUsuario', array('id' => 'from1', 'class' => 'needs-validation', 'method' => 'post'));
						?>
						<div class="form-group">
							<label class="font-size-h6 font-weight-bolder text-dark">Nombre Usuario</label>
							<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="text" name="login" autocomplete="off" />
						</div>
						<!--end::Form group-->
						<!--begin::Form group-->
						<div class="form-group">
							<div class="d-flex justify-content-between mt-n5">
								<label class="font-size-h6 font-weight-bolder text-dark pt-5">Contraseña</label>
							</div>
							<input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password" name="password" autocomplete="off" />
							<!--<a href="<?php echo base_url(); ?>index.php/usuarios/recovery" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Olvidaste tu contraseña ?</a> -->

						</div>
						<!--end::Form group-->
						<!--begin::Action-->
						<div class="pb-lg-0 pb-5">
							<button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Ingresar</button>
							<a href="<?php echo base_url(); ?>index.php/web" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">Volver a la Pagina Web</a>

						</div>

						<!--end::Action-->
						<?php
						echo form_close();
						?>

						<!--end::Form-->
					</div>
					<!--end::Signin-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--begin::Content-->
			<!--begin::Aside-->
			<div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
				<div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(<?php echo base_url(); ?>adminlte/assets/media/svg/illustrations/login-visual-4.svg);">
					<!--begin::Aside title-->
					<h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">BIENVENIDO
						<br /> AL SISTEMA
						<br />AGROVISION
					</h3>
					<!--end::Aside title-->
				</div>
			</div>
			<!--end::Aside-->
		</div>
		<!--end::Login-->
	</div>
	<!--end::Main-->
	<script>
		var HOST_URL = "#";
	</script>
	<!--begin::Global Config(global config for global JS scripts)-->
	<script>
		var KTAppSettings = {
			"breakpoints": {
				"sm": 576,
				"md": 768,
				"lg": 992,
				"xl": 1200,
				"xxl": 1200
			},
			"colors": {
				"theme": {
					"base": {
						"white": "#ffffff",
						"primary": "#663259",
						"secondary": "#E5EAEE",
						"success": "#1BC5BD",
						"info": "#8950FC",
						"warning": "#FFA800",
						"danger": "#F64E60",
						"light": "#F3F6F9",
						"dark": "#212121"
					},
					"light": {
						"white": "#ffffff",
						"primary": "#F4E1F0",
						"secondary": "#ECF0F3",
						"success": "#C9F7F5",
						"info": "#EEE5FF",
						"warning": "#FFF4DE",
						"danger": "#FFE2E5",
						"light": "#F3F6F9",
						"dark": "#D6D6E0"
					},
					"inverse": {
						"white": "#ffffff",
						"primary": "#ffffff",
						"secondary": "#212121",
						"success": "#ffffff",
						"info": "#ffffff",
						"warning": "#ffffff",
						"danger": "#ffffff",
						"light": "#464E5F",
						"dark": "#ffffff"
					}
				},
				"gray": {
					"gray-100": "#F3F6F9",
					"gray-200": "#ECF0F3",
					"gray-300": "#E5EAEE",
					"gray-400": "#D6D6E0",
					"gray-500": "#B5B5C3",
					"gray-600": "#80808F",
					"gray-700": "#464E5F",
					"gray-800": "#1B283F",
					"gray-900": "#212121"
				}
			},
			"font-family": "Poppins"
		};
	</script>
	<!--end::Global Config-->
	<!--begin::Global Theme Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>adminlte/assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>adminlte/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?php echo base_url(); ?>adminlte/assets/js/scripts.bundle.js"></script>
	<!--end::Global Theme Bundle-->
	<!--begin::Page Scripts(used by this page)-->
	<script src="<?php echo base_url(); ?>adminlte/assets/js/pages/custom/login/login-4.js"></script>
	<!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>