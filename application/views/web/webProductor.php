<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>AGROVISION</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Facebook Opengraph integration: https://developers.facebook.com/docs/sharing/opengraph -->
    <meta property="og:title" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Twitter Cards integration: https://dev.twitter.com/cards/  -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminlte/dist/css/adminlte.min.css">

    <script src="https://kit.fontawesome.com/85b5a14ce4.js" crossorigin="anonymous"></script>








    <!-- Place your favicon.ico and apple-touch-icon.png in the template root directory -->
    <link href="<?php echo base_url(); ?>adminlte/favicon.ico" rel="shortcut icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo base_url(); ?>adminlte/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="<?php echo base_url(); ?>adminlte/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>adminlte/lib/animate-css/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?php echo base_url(); ?>adminlte/css/style.css" rel="stylesheet">

</head>

<body>
    <div id="preloader"></div>

    <!--==========================
  Hero Section
  ============================-->
    <section id="hero">
        <div class="hero-container" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo base_url(); ?>adminlte/img/productor.jpg'); background-size: cover;">

            <div class="wow fadeIn">
                <div class="hero-logo">
                    <?php
                    foreach ($nombreProductor->result() as $row) {
                    ?>
                        <h1><strong><?php echo $row->nombreProductor ?></strong></h1>
                    <?php
                    }
                    ?>
                </div>
                <h2><strong class="rotating"> Producto Boliviano, Al mejor precio, La mejor calidad, En la mejor tierra</strong></h2>
                <div class="actions">
                    <a href="#about" class="btn-get-started">Mis Productos</a>
                    <a href="#contact" class="btn-services">Contactonos</a>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
  Sección de encabezado
  ============================-->
    <header id="header">
        <div class="container">
            <div id="logo" class="pull-left">
                <a href="#hero"><img src="img/logo.png" alt="" title="" /></img></a>
                <!-- Descomenta abajo si prefieres usar una imagen de texto -->
                <!--<h1><a href="#hero">Encabezado 1</a></h1>-->
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#hero">Inicio</a></li>
                    <li><a href="#about">Mis Productos</a></li>
                    <li><a href="#contact">Contactonos</a></li>
                    <li class="menu-has-children">
                        <a>AGROVISION</a>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>index.php/web">Pagina Principal - AGROVISION</a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/usuarios">Ingresar - SIS</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- #nav-menu-container -->
        </div>
    </header>
    <!-- #header -->

    <!--==========================
  About Section
  ============================-->


    <section id="about">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title"> El Sabor de la Naturaleza en tus Manos</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">"Aprovecha nuestras increíbles promociones en manzanas frescas y deliciosas."</p>
                </div>
            </div>
        </div>

        <div class="container  wow fadeInUp ">

            <?php
            foreach ($listaProductorWeb->result() as $row) {
            ?>
                <div class="card card-solid ">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="col-12">
                                    <img src="<?php echo base_url(); ?>uploads/web/<?php echo $row->foto ?>" class="product-image img-fluid w-75" alt="Product Image">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <h3 class="my-3"><?php echo $row->titulo ?></h3>
                                <p><?php echo $row->descripcion ?></p>

                                <hr>
                                <div class="bg-green py-2 px-3 mt-4">
                                    <h2 class="mb-0 text-center">
                                        <?php echo $row->detalle ?>
                                    </h2>
                                    
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
            <!-- /.card-body -->

        </div>



    </section>


    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="section-title">Contactanos</h3>
                    <div class="section-title-divider"></div>
                    <p class="section-description">¡No esperes más! Contáctanos ahora y descubre lo que podemos hacer por ti. Tu satisfacción es nuestra prioridad. ¡Estamos aquí para ayudarte! 📞📧</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <a href="https://wa.link/eo1t7o">
                        <img src="<?php echo base_url(); ?>adminlte/img/QR.png" alt=""><br>
                        <h1 style="font-size: 20px;">¡Haz clic para contactarte con nosotros!</h1>
                    </a>
                </div>
                <div class="col-md-4"></div>


            </div>
    </section>


    <!--==========================
  Footer
============================-->
    <footer id="footer" style="background-color: rgba(16, 122, 16);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <strong>INSTITUTO TÉCNICO SUPERIOR DE COMERCIO "FEDERICO ALVAREZ PLATA - NOCTURNO"</strong> <br>
                        <strong>SISTEMAS INFORMÁTICOS 2023"</strong>
                    </div>
                    <div class="credits">
                        <!-- Required JavaScript Libraries
            Templates by <a href="https://www.youtube.com/channel/UCDH0DJaVLkCDtl_YN9hhByw?view_as=subscriber">ProOnliPc</a>
             -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- Required JavaScript Libraries -->

    <script src="<?php echo base_url(); ?>adminlte/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/superfish/hoverIntent.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/superfish/superfish.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/morphext/morphext.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/stickyjs/sticky.js"></script>
    <script src="<?php echo base_url(); ?>adminlte/lib/easing/easing.js"></script>

    <!-- Template Specisifc Custom Javascript File -->
    <script src="<?php echo base_url(); ?>adminlte/js/custom.js"></script>

    <script src="<?php echo base_url(); ?>adminlte/contactform/contactform.js"></script>


</body>

</html>