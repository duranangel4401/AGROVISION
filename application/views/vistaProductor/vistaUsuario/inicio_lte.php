<div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><strong>INICIO - PRODUCTOR - AGROVISION 2023</strong></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Usuario</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>adminlte/images/user.png" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><strong><?php echo $this->session->userdata('fullName'); ?></strong></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('tipo'); ?></p>
              <?php
              foreach ($datosProductor->result() as $row) {
              ?>
                <?php
                echo form_open_multipart('productor/modificarProductorDatos');
                ?>
                <input type="hidden" name="idProductor" value="<?php echo $row->id; ?>">
                <button type="submit" class="btn btn-success btn-block"><i class="fa-solid fa-user-pen fa-lg"></i> <b>Editar Datos</b></button>
                <?php echo form_close();
                ?>
              <?php
              }
              ?>
              <hr>
              <a href="<?php echo base_url(); ?>index.php/productor/cambioContrasenia" class="text-info font-size-h6 font-weight-bolder text-hover-primary pt-5">Cambiar mi contraseña.</a>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="profile-username text-center">Federico Alvarez Plata Nocturno</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <img class="img-fluid" src="<?php echo base_url(); ?>adminlte/images/FEDE.jpg" alt="">
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="post">
              <div class="user-block">
                <h5><strong>Imagenes del Prototipo de Selección en Arduino</strong></h5>
              </div>
              <!-- /.user-block -->
              <div class="row mb-3">
                <div class="col-sm-6">
                  <img class="img-fluid" src="<?php echo base_url(); ?>adminlte/images/ima1.jpg" alt="Photo">
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="row">
                    <div class="col-sm-6">
                      <img class="img-fluid mb-3" src="<?php echo base_url(); ?>adminlte/images/ima2.jpeg" alt="Photo">
                      <img class="img-fluid" src="<?php echo base_url(); ?>adminlte/images/ima3.jpeg" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <img class="img-fluid mb-3" src="<?php echo base_url(); ?>adminlte/images/ima4.jpeg" alt="Photo">
                      <img class="img-fluid" src="<?php echo base_url(); ?>adminlte/images/ima5.jpeg" alt="Photo">
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>