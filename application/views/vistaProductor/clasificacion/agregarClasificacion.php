<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><strong>AGREGAR NUEVA CLASIFICACIÓN DE PRODUCCION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/productor/clasificacion">
                        <button type="reset" class="btn btn-danger">Cancelar Registro <strong><samp class="fa-regular fa-thumbs-down fa-xl"></samp></strong></button>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ingrese los datos de manera correctamente!. <i class="fa-regular fa-thumbs-up fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('productor/agregarClasificacionBDD');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-4 form-group">
                                    <label for="nombre">Nombre de la Clasificación:</label>
                                    <input type="text" class="form-control" id="nombre" autocomplete="off" name="nombre" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="nombre">Rango Minimo <samp>(Gramos)</samp></label>
                                    <input type="number" class="form-control" id="rangoMinimo" autocomplete="off" name="rangoMinimo" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="nombre">Rango Maximo <samp>(Gramos)</samp></label>
                                    <input type="number" class="form-control" id="rangoMaximo" autocomplete="off" name="rangoMaximo" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-3 form-group"> </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Agregar Clasificación  <i class="fa-solid fa-scale-unbalanced-flip fa-xl"></i></button>
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