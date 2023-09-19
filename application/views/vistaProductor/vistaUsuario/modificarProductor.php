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

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h4><strong>Modificar mis datos - Productor</strong></h4>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="<?php echo base_url() ?>index.php/productor/index">
                                                <button type="reset" class="btn btn-danger">Cancelar Modificación <strong><i class="fa-solid fa-user-large-slash fa-lg"></i></strong></button>
                                            </a>
                                        </div>
                                    </div>

                                    <hr>
                                    <?php
                                    foreach ($datosProductor->result() as $row) {
                                        echo form_open_multipart('productor/modificarProductorBDD');
                                    ?>

                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nombre Completo:</label>
                                            <div class="col-sm-3">
                                                <input type="hidden" value="<?php echo $row->id ?>" id="idProductor" name="idProductor">
                                                <input type="text" value="<?php echo $row->nombres ?>" class="form-control" id="nombres" name="nombres" autocomplete="off" required aria-invalid="true" placeholder="Nombres">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="<?php echo $row->primerApellido ?>" class="form-control" id="primerApellido" name="primerApellido" required aria-invalid="true" placeholder="Apellido Paterno">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" value="<?php echo $row->segundoApellido ?>" class="form-control" id="segundoApellido" name="segundoApellido" required aria-invalid="true" placeholder="Apellido Materno">
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control" id="sexo" name="sexo">
                                                    <?php
                                                    if ($row->sexo == 'F') {
                                                    ?>
                                                        <option value="F" selected>Femenino</option>
                                                        <option value="M">Masculino</option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="F">Femenino</option>
                                                        <option value="M" selected>Masculino</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Fecha Nacimiento:</label>

                                            <div class="col-sm-10">
                                                <input type="date" value="<?php echo $row->fechaNacimiento ?>" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required aria-invalid="true">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Datos Adicionales:</label>
                                            <div class="col-sm-5">
                                                <input type="email" value="<?php echo $row->email ?>" class="form-control" id="email" name="email" autocomplete="off" required aria-invalid="true" placeholder="Introduce tu correo Electronico válido">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" value="<?php echo $row->telefonos ?>" class="form-control" id="telefonos" name="telefonos" required aria-invalid="true" placeholder="Introduce Telefono/Celular">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" value="<?php echo $row->nombreUsuario ?>" class="form-control" id="nombreUsuario" name="nombreUsuario" required aria-invalid="true" placeholder="Nombre de Usuario">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Modificar Datos de Usuario <i class="fa-solid fa-user-gear fa-lg"></i></i></button>
                                            </div>
                                        </div>
                                    <?php echo form_close();
                                    }
                                    ?>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">

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