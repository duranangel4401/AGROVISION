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
        <img src="<?php echo base_url(); ?>adminlte/images/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $this->session->userdata('fullName'); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/productor" class="nav-link ">
            <i class="fa-solid fa-id-card-clip fa-2xl"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>
        <li class="nav-item navy">
          <a href="<?php echo base_url(); ?>index.php/productor/clasificacion " class="nav-link">
          <i class="fa-solid fa-scale-balanced fa-2xl"></i>
                      <p>
              Clasificación
            </p>
          </a>
        </li>
        <li class="nav-item navy">
          <a href="<?php echo base_url(); ?>index.php/productor/produccion" class="nav-link">
            <i class="fa-solid fa-apple-whole fa-2xl"></i>
            <p>
              Producción
            </p>
          </a>
        </li>
        

        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/productor/ingresoProducto" class="nav-link">
          <i class="fa-solid fa-arrow-up-right-dots fa-2xl"></i>
            <p>
              Ingreso Producto
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/productor/reporte" class="nav-link">
          <i class="fa-solid fa-file-signature fa-2xl"></i>
            <p>
              Reportes
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>index.php/productor/web" class="nav-link">
            <i class="fa-regular fa-window-maximize fa-2xl"></i>
            <p>
              Web
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>