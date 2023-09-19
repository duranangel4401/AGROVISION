  <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><strong>INICIO - ADMINISTRADOR - AGROVISION 2023</strong></h1>
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
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>adminlte/images/perfil.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><strong><?php echo $this->session->userdata('fullName'); ?></strong></h3>

                <p class="text-muted text-center"><?php echo $this->session->userdata('tipo'); ?></p>

                <?php
                foreach ($listaUsuariosLogeado->result() as $row) {
                ?>
                  <?php
                  echo form_open_multipart('usuarios/modificarUsuario');
                  ?>
                  <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                  <button type="submit" class="btn btn-success btn-block"><i class="fa-solid fa-user-pen fa-lg"></i> <b>Editar Datos</b></button>
                  <?php echo form_close();
                  ?>
                <?php
                }
                ?>

                <hr>
                <a href="<?php echo base_url(); ?>index.php/administrador/cambioContrasenia" class="text-info font-size-h6 font-weight-bolder text-hover-primary pt-5">Cambiar mi contraseña.</a>
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
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Lista de Usuarios</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Insertar un nuevo usuario</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table id="example2" class="table table-bordered table-hover " style="text-align: center;">
                        <thead>
                          <tr style="background-color: #E5E5E5;">
                            <th>N°</th>
                            <th>Nombre Compelto</th>
                            <th>Correo Electronico</th>
                            <th>Telefono/Celular</th>
                            <th>Rol</th>
                            <th>Nombre de Usuario</th>
                            <th>Fecha Registro</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $indice = 1;
                          foreach ($listaUsuarios->result() as $row) {
                          ?>
                            <tr>
                              <td><?php echo $indice ?></td>
                              <td><?php echo $row->nombreCompleto ?></td>
                              <td><?php echo $row->email ?></td>
                              <td><?php echo $row->telefono ?></td>
                              <td><?php echo $row->rol ?></td>
                              <td><?php echo $row->nombreUsuario ?></td>
                              <td><?php echo formatearFecha($row->fechaRegistro); ?></td>

                              <td>
                                <div style="display: flex; justify-content: center; align-items: center;">
                                  <div>
                                    <?php
                                    echo form_open_multipart('usuarios/modificarUsuario');
                                    ?>
                                    <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                                    <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                                    <?php echo form_close();
                                    ?>
                                  </div>
                                  <div>
                                    <?php
                                    echo form_open_multipart('usuarios/deshabilitarUsuario');
                                    ?>
                                    <input type="hidden" name="idUsuario" value="<?php echo $row->id; ?>">
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-person-circle-xmark fa-lg"></i></button>
                                    <?php echo form_close();
                                    ?>
                                  </div>

                                </div>
                              </td>
                            </tr>
                          <?php
                            $indice++;
                          }
                          ?>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #E5E5E5;">
                            <th>N°</th>
                            <th>Nombre Compelto</th>
                            <th>Correo Electronico</th>
                            <th>Telefono/Celular</th>
                            <th>Descripción</th>
                            <th>Rol</th>
                            <th>Nombre de Usuario</th>
                            <th>Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.post -->


                    <!-- Post -->
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
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <div class="row">
                      <div class="col-md-9">
                        <h4><strong>Formulario para registrar un nuevo usuario Administrador</strong></h4>
                      </div>
                      <div class="col-md-3">
                        <a href="<?php echo base_url() ?>index.php/administrador/index">
                          <button type="reset" class="btn btn-danger">Cancelar Registro <strong><samp class="fa-regular fa-thumbs-down fa-xl"></samp></strong></button>
                        </a>
                      </div>
                    </div>

                    <hr>
                    <?php
                    echo form_open_multipart('usuarios/agregarProductorBDD');
                    ?>

                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Nombre Completo:</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="nombres" name="nombres" autocomplete="off" required aria-invalid="true" placeholder="Nombres">
                      </div>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" required aria-invalid="true" placeholder="Apellido Paterno">
                      </div>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Apellido Materno">
                      </div>
                      <div class="col-sm-2">
                        <select class="form-control" name="sexo" id="sexo">
                          <option value="F">Femenino</option>
                          <option value="M">Masculino</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>

                      <div class="col-sm-10">
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required aria-invalid="true">
                      </div>

                    </div>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Datos Adicionales:</label>
                      <div class="col-sm-5">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" required aria-invalid="true" placeholder="Introduce tu correo Electronico válido">
                      </div>
                      <div class="col-sm-5">
                        <input type="number" class="form-control" id="telefonos" name="telefonos" required aria-invalid="true" placeholder="Introduce Telefono/Celular">
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Agregar Usuario <i class="fa-solid fa-user-plus fa-lg"></i></button>
                      </div>
                    </div>
                    <?php echo form_close(); ?>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
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