<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>AGREGAR NUEVO PRODUCTOR</h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/productor">
                        <button type="reset" class="btn btn-danger">Cancelar Registro<strong><samp class="fa-solid fa-user-large-slash"></samp></strong></button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Por favor llene los datos de manera correcta. <i class="fa-solid fa-file-circle-check"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('administrador/agregarProductorBDD');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="nombre">Nombres:</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" required aria-invalid="true" placeholder="Ingrese nombre del productor">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Apellido Paterno:</label>
                                    <input type="text" class="form-control" required aria-invalid="true" id="primerApellido" name="primerApellido" placeholder="Ingrese apellido paterno">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Ingrese apellido Materno">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Fecha Nacimiento:</label>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fechaNacimiento" name="fechaNacimiento">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label for="nombre">Sexo:</label>
                                    <select class="form-control" id="sexo" name="sexo">
                                        <option value="F">Femenino</option>
                                        <option value="M" selected>Masculino</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Teléfono/Celular:</label>
                                    <input type="number" class="form-control" required aria-invalid="true" id="telefonos" name="telefonos" placeholder="Añada telefono o celular del productor">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Correo Electrónico:</label>
                                    <input type="email" class="form-control" required aria-invalid="true" id="email" name="email" placeholder="Ingrese email del productor">
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="exampleInputEmail1">Descripción:</label>
                                    <input type="text" class="form-control" required aria-invalid="true" id="descripcion" name="descripcion" placeholder="Añada una descripción del productor">
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="row">
                            <div class="col-md-3 form-group">
                            </div>
                            <div class="col-md-6 form-group">
                                <button type="submit" class="btn btn-primary btn-block">Agregar Productor   <i class="fa-solid fa-user-plus fa-xl"></i></button>
                            </div>
                            <div class="col-md-3 form-group"></div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>