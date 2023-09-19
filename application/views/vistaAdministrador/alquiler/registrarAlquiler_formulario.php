<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>FORMULARIO DE ALQUILER DE EQUIPO DE SELECCIÓN - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo base_url() ?>index.php/administrador/alquiler">
                        <button type="reset" class="btn btn-danger">Cancelar Alquiler <strong><i class="fa-solid fa-handshake-slash fa-xl"></i></strong></button>
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
                            <h3 class="card-title">Por favor, llene los datos para el registro del alquiler de manera correcta. <i class="fa-solid fa-retweet fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('administrador/agregarAlquilerBDD');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nombre de Productor/Cliente:</label>
                                    <select name="idProductor" id="idProductor" class="form-control form-select form-select-lg" required>
                                        <option value="" disabled selected>Seleccione a un cliente</option>

                                        <?php
                                        foreach ($listaProductores->result() as $row) {
                                        ?>

                                            <option value="<?php echo $row->id; ?>">
                                                <?php echo $row->productor; ?>
                                            </option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group"></div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Seleccione un equipo para el alquiler:</label>
                                    <select name="idEquipo" id="idEquipo" class="form-control form-select form-select-lg" required>
                                        <option value="" disabled selected>Equipos disponibles</option>

                                        <?php
                                        foreach ($listaEquipo->result() as $row1) {
                                        ?>

                                            <option value="<?php echo $row1->id; ?>">
                                                <?php echo $row1->serie . ' - ' . $row1->descripcion; ?>

                                            </option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group"></div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Precio de alquiler:</label>
                                    <input type="number" class="form-control" required aria-invalid="true" id="precio" name="precio" autocomplete="off"> <samp>(Bs.)</samp>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group"></div>
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Fecha de alquiler:</label>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fechaAlquiler" name="fechaAlquiler" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="exampleInputEmail1">Fecha de devolución:</label>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fechaDevolucion" name="fechaDevolucion" >
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">Registrar Alquiler  <i class="fa-solid fa-handshake fa-xl"></i></button>

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
    </section>
    <!-- /.content -->
</div>