<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><strong>MODIFICAR DATOS - CLASIFICACIÓN DE PRODUCCION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/productor/clasificacion">
                        <button type="reset" class="btn btn-danger">Cancelar Modificación <strong><i class="fa-solid fa-file-excel fa-lg"></i></strong></button>
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
                            <h3 class="card-title">Verifique los datos antes de modificar los datos. <i class="fa-solid fa-certificate fa-lg"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($datosClasificacion->result() as $row) {
                            echo form_open_multipart('productor/modificarClasificacionBDD');
                        ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-4 form-group">
                                        <label for="nombre">Nombre de la Clasificación:</label>
                                        <input type="hidden" value="<?php echo $row->id ?>" id="idClasificacion" name="idClasificacion" >

                                        <input type="text" class="form-control" value="<?php echo $row->nombre ?>" id="nombre" autocomplete="off" name="nombre" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="nombre">Rango Minimo <samp>(Gramos)</samp></label>
                                        <input type="number" class="form-control" value="<?php echo $row->rangoMinimo ?>" id="rangoMinimo" autocomplete="off" name="rangoMinimo" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="nombre">Rango Maximo <samp>(Gramos)</samp></label>
                                        <input type="number" class="form-control" id="rangoMaximo" value="<?php echo $row->rangoMaximo ?>" autocomplete="off" name="rangoMaximo" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 form-group"> </div>
                                    <div class="col-md-6 form-group">
                                        <button type="submit" class="btn btn-success btn-block">Modificar Clasificación <i class="fa-solid fa-file-signature fa-lg"></i></button>
                                    </div>
                                    <div class="col-md-3 form-group"> </div>

                                </div>
                            </div>
                            <!-- /.card-body -->


                        <?php echo form_close();
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-2"></div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>