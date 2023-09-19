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
    <div class="hero-container" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?php echo base_url(); ?>adminlte/img/manzana2.jpg'); background-size: cover;">

      <div class="wow fadeIn">
        <div class="hero-logo">
          <img class="" src="<?php echo base_url(); ?>adminlte/img/agrovision.png" alt="ProOnliPc">
        </div>
        <h2><strong class="rotating"> Producto Boliviano, Al mejor precio, La mejor calidad, En la mejor tierra</strong></h2>
        <div class="actions">
          <a href="#about" class="btn-get-started">Sobre Nosotros</a>
          <a href="#services" class="btn-services">Productores</a>
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
          <li><a href="#about">Sobre Nosotros</a></li>
          <li><a href="#services">Productores</a></li>
          <li><a href="#testimonials">Equipo</a></li>
          <li><a href="#contact">Contactanos</a></li>
          <li class="menu-has-children"><a>AGROVISION</a>
            <ul>
              <li><a href="<?php echo base_url(); ?>index.php/usuarios">Ingresar</a></li>
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
          <h3 class="section-title">Sobre Nosotros</h3>
          <div class="section-title-divider"></div>
          <p class="section-description">Agrovision es un equipo líder en innovación que se dedica a desarrollar soluciones tecnológicas basadas en Arduino para la selección
            precisa de productos agrícolas, como las manzanas, en función de su peso. </p>
        </div>
      </div>
    </div>
    <div class="container  wow fadeInUp">
      <div class="row">
        <div class="col-md-6" style="background-image: url('<?php echo base_url(); ?>adminlte/img/manzana.jpeg'); background-size: cover; background-repeat: no-repeat;">
        </div>
        <div class="col-md-6">
          <h2 class="about-title">Agrovision: Innovación Agrícola para un Futuro Sostenible</h2>
          <p class="about-text">
            Misión: Transformar la agricultura en Pojo, Cochabamba, con soluciones basadas en Arduino para optimizar la selección y comercialización de manzanas,
            impulsando la eficiencia y calidad en toda la cadena agrícola. Comprometidos en empoderar a los agricultores locales con tecnología accesible, mejorando la seguridad
            alimentaria y el crecimiento económico. Buscamos fusionar tecnología y agricultura para un impacto significativo en la sostenibilidad agrícola en Pojo y más allá.
          </p>
          <p class="about-text">
            Visión: Liderar la transformación agrícola sostenible en Pojo, Cochabamba, como pioneros en tecnología agrícola.
            Inspirar la innovación para mejorar la productividad y el bienestar rural. Expandir nuestro impacto globalmente, promoviendo prácticas
            modernas y sostenibles en la producción y comercialización de alimentos.
          </p>
          <p class="about-text">
            Los valores del proyecto guían su operación: innovación, integridad, empoderamiento, sostenibilidad, colaboración, excelencia, impacto social, adaptabilidad, pasión
            por la innovación y compromiso con la comunidad.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!--==========================
  Services Section
  ============================-->
  <section id="services" style="background: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)), url('<?php echo base_url(); ?>adminlte/img/manzana.jpeg'); background-size: cover;">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Productores</h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><strong>¡Descubre la calidad y frescura que nuestros productores entregan en cada cosecha!</strong> </p>
        </div>
      </div>

      <div class="row">
        <?php
        foreach ($listaProductores->result() as $row) {
        ?>
          <div class="col-md-4">
            <?php
            echo form_open_multipart('web/webProductor');
            ?>
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username"><strong><?php echo $row->productor ?></strong></h3>
                <h5 class="widget-user-desc"><?php echo $row->descripcion ?></h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="<?php echo base_url(); ?>adminlte/img/user1-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-sm-12 border-right">
                    <div class="description-block">
                      <h5 class="description-header"><i class="fa-brands fa-square-whatsapp fa-lg"></i>+591 <?php echo $row->telefonos ?></h5>
                      <span class="description-header"><i class="fa-solid fa-circle-user fa-sm"></i> <?php echo $row->rol ?></span><br>
                      <span class="description-header"><i class="fa-solid fa-envelope fa-sm"></i> <?php echo $row->email ?></span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <input type="hidden" name="idProductor" id="idProductor" value="<?php echo $row->id ?>">
              <button class="btn btn-info" type="submit">Visitar Web</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        <?php
        }
        ?>
      </div>

    </div>
  </section>


  <!--==========================
  Testimonials Section
  ============================-->
  <section id="testimonials">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Equipo de Clasificación</h3>
          <div class="section-title-divider"></div>
          <p class="section-description"><strong>¡Descubre nuestro equipo de clasificación de manzanas de vanguardia! 🍏🍎</strong></p>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="profile">
            <div class="pic"><img src="<?php echo base_url(); ?>adminlte/img/equipo1.jpg" alt=""></div>
            <h4>Sistema de Clasificación de Manzanas por peso</h4>
          </div>
        </div>
        <div class="col-md-9">
          <div class="quote">
          Transformación Agroindustrial Sostenible: Innovación Tecnológica para la Selección y Comercialización Inteligente de Manzanas en la localidad de Pojo - Cochabamba
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-9">
          <div class="quote">
          El proyecto de implementación de un sistema de selección basado en peso surge como una solución estratégica para abordar estas necesidades. 
          Esta tecnología no solo asegura la exportación de manzanas de primera calidad, sino que también optimiza la eficiencia en la producción al 
          reducir el tiempo y esfuerzo requeridos para la selección manual. 
          </div>
        </div>
        <div class="col-md-3">
          <div class="profile">
            <div class="pic"><img src="<?php echo base_url(); ?>adminlte/img/equipo2.jpg" alt=""></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-3">
          <div class="profile">
            <div class="pic"><img src="<?php echo base_url(); ?>adminlte/img/equipo3.jpg" alt=""></div>
          </div>
        </div>
        <div class="col-md-9">
          <div class="quote">
          El sistema permite automatizar y monitorear la clasificación de manzanas en tiempo real permitiendo a los productores estimar sus ganancias en 
          base a la calidad del producto apoyados en dashboards generados a través de la interoperabilidad de un equipo de clasificación y una aplicación web.
          </div>
        </div>
      </div>

    </div>
  </section>

  <!--==========================
  Contact Section
  ============================-->
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

        <!--
        <div class="col-md-3 col-md-push-2">
          <div class="info">
            <div>
              <i class="fa fa-map-marker"></i>
              <p>A108 Adam Street<br>New York, NY 535022</p>
            </div>

            <div>
              <i class="fa fa-envelope"></i>
              <p>info@example.com</p>
            </div>

            <div>
              <i class="fa fa-phone"></i>
              <p>+1 5589 55488 55s</p>
            </div>

          </div>
        </div>

        <div class="col-md-5 col-md-push-2">
          <div class="form">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Por favor ingrese al menos 4 caracteres" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Ingresa un Correo Valido" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Por favor ingrese al menos 8 caracteres del tema" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Por favor escribe algo para nosotros" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>
              <div class="text-center"><button type="submit">Enviar mensaje</button></div>
            </form>
          </div>
        </div>

      </div>
      -->

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