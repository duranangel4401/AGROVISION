<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1><strong>AGREGAR NUEVA PRODUCCIÓN</strong></h1>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo base_url() ?>index.php/productor/web">
                        <button type="reset" class="btn btn-danger">Cancelar publicacion <strong><i class="fa-solid fa-calendar-minus fa-lg"></i></strong></button>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Por favor Verifique los datos, antes de subir a la web. <i class="fa-regular fa-thumbs-up fa-lg"></i> </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('web/subirPublicacionBDD');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nombre">Título de la Publicación:</label>
                                    <input type="text" name="titulo" id="titulo" required class="form-control" autocomplete="off" placeholder="Ingrese el Titulo de la prublicación">
                                </div>
                                <div class="col-md-5">
                                    <label for="nombre">Descripción:</label>
                                    <textarea type="text" name="descripcion" id="descripcion" required class="form-control" autocomplete="off" placeholder="Ingrese una pequeña descripcion de lo que ofrece"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label for="nombre">Detalle <samp>(precio)</samp>:</label>
                                    <input type="text" name="detalle" id="detalle" required class="form-control" autocomplete="off" placeholder="ejm.: Kilo de Manzanas: 35 Bs.">
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <br>
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary btn-block">Publicar en Web <i class="fa-solid fa-upload fa-lg"></i></button>
                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                            <?php echo form_close(); ?>
                        </div>

                    </div>
                    <div class="col-md-1"></div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <hr>
            <div style="display: flex; justify-content: center; align-items: center;">
                <h3><strong>Vista en Web - Productor</strong></h3>
            </div>
            <div class="row text-center">

                <div class="col-md-12 text-center">
                    <img src="<?php echo base_url(); ?>adminlte/img/MUESTRA.jpg" width="60%" alt="">
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>