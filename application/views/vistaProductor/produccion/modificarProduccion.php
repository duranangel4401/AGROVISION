<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1><strong>AGREGAR NUEVA PRODUCCIÓN</strong></h1>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo base_url() ?>index.php/productor/produccion">
                        <button type="reset" class="btn btn-danger">Cancelar Modificación <strong><i class="fa-solid fa-text-slash fa-lg"></i></strong></button>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Por favor, verifique que los datos antes de modificar. <i class="fa-regular fa-thumbs-up fa-lg"></i> </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($datosProduccion->result() as $row) {
                            echo form_open_multipart('productor/modificarProduccionBDD');
                        ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10 form-group">
                                                <label for="nombre">Nombre Producto:</label>
                                                <input type="hidden" value="<?php echo $row->id ?>" class="form-control" id="idProduccion" name="idProduccion">

                                                <input type="text" name="nombre" value="<?php echo $row->nombre ?>" required class="form-control" autocomplete="off">
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10 form-group">
                                                <label for="nombre">Descripción de al Producción/Producto:</label>
                                                <textarea class="form-control w-100 h-100" name="descripcion" id="descripcion" cols="30" rows="4" required><?php echo $row->descripcion ?></textarea>
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 form-group">

                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10 form-group">
                                                <label for="nombre">Fecha Inicio de Producción:</label>
                                                <input type="date" class="form-control" required aria-invalid="true" value="<?php echo $row->fechaInicio ?>" id="fechaInicio" name="fechaInicio">
                                            </div>
                                            <div class="col-md-1"></div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-10 form-group">
                                                <label for="nombre">Fecha de Finalización de Producción:</label>
                                                <input type="date" class="form-control" required aria-invalid="true" value="<?php echo $row->fechaFin ?>" id="fechaFin" name="fechaFin">
                                            </div>
                                            <div class="col-md-1"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-block">Guardar modificación  <i class="fa-solid fa-file-signature fa-xl"></i></button>

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                        <?php echo form_close();
                        }
                        ?>
                    </div>

                </div>
                <div class="col-md-1"></div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>