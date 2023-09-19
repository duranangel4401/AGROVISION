<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1>MODIFICACÍON DE ALQUILER DE EQUIPO DE SELECCIÓN - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo base_url() ?>index.php/administrador/alquiler">
                        <button type="reset" class="btn btn-danger">Cancelar Modificación <strong><i class="fa-solid fa-handshake-slash fa-xl"></i></strong></button>
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
                            <h3 class="card-title">Solo podrá modificar el precio y las fechas del alquiler. <i class="fa-solid fa-triangle-exclamation fa-lg"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($obtenerDetalleAlquiler->result() as $row) {
                            echo form_open_multipart('administrador/modificarAlquilerBDD');
                        ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 form-group">
                                        <label for="nombre">Nombre de Productor/Cliente:</label>
                                        <select name="idProductor" id="idProductor" class="form-control form-select form-select-lg" required>
                                            <option value="" disabled>Productor que alquilo el servicio</option>
                                            <option value="<?php echo $row->idProductor; ?>" selected>
                                                <?php echo $row->nombreProductor; ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Seleccione un equipo para el alquiler:</label>
                                        <select name="idEquipo" id="idEquipo" class="form-control form-select form-select-lg" required>
                                            <option value="" disabled>Equipos en alquiler</option>
                                            <option value="<?php echo $row->idEquipo; ?>" selected>
                                                <?php echo $row->equipo; ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Precio de alquiler:</label>
                                        <input type="number" class="form-control" value="<?php echo $row->precio; ?>" required aria-invalid="true" id="precio" name="precio" autocomplete="off"> <samp>(Bs.)</samp>
                                        <input type="hidden" id="idAlquiler" name="idAlquiler" class="form-control" value="<?php echo $row->idAlquiler; ?>">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Fecha de alquiler:</label>
                                        <input type="date" class="form-control" required aria-invalid="true" id="fechaAlquiler" name="fechaAlquiler" value="<?php echo $row->fechaAlquiler; ?>">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputEmail1">Fecha de devolución:</label>
                                        <input type="date" class="form-control" required aria-invalid="true" id="fechaDevolucion" value="<?php echo $row->fechaDevolucion; ?>" name="fechaDevolucion">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-block">Modificar Alquiler <i class="fa-solid fa-file-signature fa-lg"></i></button>

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                        <?php
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