<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #481515;  background-image: url('<?php echo base_url(); ?>adminlte/lateral2.png'); background-size: cover;">

  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>index.php/web" target="_blank" class="brand-link">
    <img src="<?php echo base_url(); ?>adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><STRong>AGROVISION</STRong> </span>
  </a>


  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url(); ?>adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('fullName'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/administrador" class="nav-link ">
            <i class="fa-solid fa-id-card-clip fa-2xl"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>
        <li class="nav-item navy">
          <a href="<?php echo base_url(); ?>index.php/administrador/productor " class="nav-link">
            <i class="fa-sharp fa-solid fa-users fa-2xl"></i>
            <p>
              Productor
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/administrador/equipo" class="nav-link">
            <i class="fa-brands fa-stack-overflow fa-2xl"></i>
            <p>
              Equipo
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/administrador/venta" class="nav-link">
            <i class="fa-solid fa-money-bill fa-2xl"></i>
            <p>
              Venta
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/administrador/alquiler" class="nav-link">
          <i class="fa-solid fa-retweet fa-2xl"></i>
            <p>
              Alquiler
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/administrador/reporte" class="nav-link">
            <i class="fa-solid fa-file-signature fa-2xl"></i>
            <p>
              Reportes
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>