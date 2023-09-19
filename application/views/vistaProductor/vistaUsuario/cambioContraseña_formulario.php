<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>CAMBIO DE CONTRASEÑA - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/productor/index">
                        <button type="reset" class="btn btn-danger">Cancelar Cambio de contraseña<strong><samp class="fa-regular fa-thumbs-down fa-xl"></samp></strong></button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Por favor, asegurece de que los datos coincidad!. <i class="fa-solid fa-triangle-exclamation fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('productor/verificarDatosContrasenia');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ingrese su contraseña Actual:</label>
                                    <input type="password" class="form-control" id="contraseniaActual" autocomplete="off" name="contraseniaActual" required aria-invalid="true" placeholder="Contraseña Actual">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Ingrese la contraseña nueva:</label>
                                    <input type="password" class="form-control" id="contraseniaNueva" autocomplete="off" name="contraseniaNueva" required aria-invalid="true" placeholder="Ingrese la contrase nueva">
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Reingrese la contraseña nueva:</label>
                                    <input type="password" class="form-control" id="repeContraseniaNueva" autocomplete="off" name="repeContraseniaNueva" required aria-invalid="true" placeholder="Reingrese la contrase nueva">
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-3 form-group"> </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" class="btn btn-success btn-block">Modificar Contraseña  <i class="fa-solid fa-key fa-lg"></i></button>
                                </div>
                                <div class="col-md-3 form-group"> </div>

                            </div>
                        </div>
                        <!-- /.card-body -->


                        <?php echo form_close(); ?>
                    </div>

                </div>
                <div class="col-md-2"></div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>