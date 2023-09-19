<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Tecno-Stream</title>
    <meta name="description" content="Login page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <link href="<?php echo base_url(); ?>adminlte/assets/login-2.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url(); ?>adminlte/assets/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>adminlte/assets/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>adminlte/assets/style.bundle.css" rel="stylesheet" type="text/css" />

    <!-- ICONO QUE SE MUESTRA EN EL PESTAÑA DE NAVEGACION -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>adminlte/assets/favicon.ico" />
</head>


<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled sidebar-enabled page-loading">
    <div class="d-flex flex-column flex-root">
        <div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
                        <a href="#" class="mb-15 text-center">

                            <!-- ICONO QUE SE MUESTRA EN EL FORMULARIO -->
                            <img src="<?php echo base_url(); ?>adminlte/assets/logo-letter-1.png" class="max-h-75px" alt="" />
                        </a>
                        <div class="login-form login-signin">
                            <div class="text-center mb-10 mb-lg-20">
                                <h2 class="font-weight-bold">Ingrese Token Valida</h2>

                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Ingrese el codigo que se le envio a su Email</strong>
                                </div>

                            </div>

                            <?php
                            echo form_open_multipart('usuarios/validarUsuario', array('id' => 'from1', 'class' => 'needs-validation', 'method' => 'post'));
                            ?>
                            
                            <div class="form-group py-3 border-top m-0">
                                <input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" name="token" id="token" placeholder="Ingrese Token" required="" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-3">
                                <div class="checkbox-inline">
                                </div>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-2">
                                <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Iniciar Seción</button>

                                <button type="reset" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2"><a href="<?php echo base_url(); ?>index.php/usuarios" style="text-decoration: none; color: inherit;">Cancelar</a></button>

                            </div>
                            <?php
                            echo form_close();
                            ?>
                        </div>
                    </div>

                    <div class="d-flex flex-column-auto justify-content-between mt-15">
                        <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2023 Jhimy Fuentes Rojas</div>
                        <div class="d-flex order-1 order-sm-2 my-2">
                            <a href="#" class="text-muted text-hover-primary ml-4">Contactanos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url(<?php echo base_url(); ?>adminlte/assets/bg-5.jpg);">
                <div class="d-flex flex-column-fluid flex-lg-center">
                    <div class="d-flex flex-column justify-content-center">
                        <h3 class="display-3 font-weight-bold my-7 text-white">No olvides revisar tu Correo Electrónico</h3>
                        <p class="font-weight-bold font-size-lg text-white opacity-80">Estamos encantados de recibirte en nuestro sistema de gestión
                            <br />¡Gracias por confiar en nosotros!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
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
    <script src="<?php echo base_url(); ?>adminlte/assets/plugins.bundle.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/assets/prismjs.bundle.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/assets/scripts.bundle.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/assets/login-general.js"></script>
</body>

</html>