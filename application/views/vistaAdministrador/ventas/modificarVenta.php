<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MODIFICAR VENTA DE EQUIPO DE SELECCIÓN - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/venta">
                        <button type="reset" class="btn btn-danger">Cancelar Modificacion <strong><i class="fa-solid fa-folder-minus fa-lg"></i></strong></button>
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
                            <h3 class="card-title">Solo podras modificar el precio y la fecha de venta. <i class="fa-solid fa-circle-exclamation fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('administrador/modificarVentaBDD');

                        foreach ($obtenerDetalleVenta->result() as $row) {
                        ?>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 form-group">
                                        <label for="nombre">Nombre de Productor/Comprador:</label>
                                        <select name="idProductor" id="idProductor" class="form-control form-select form-select-lg" required>
                                            <option disabled> Cliente - Productor</option>
                                            <option selected value="<?php echo $row->idProductor; ?>">
                                                <?php echo $row->productor; ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Seleccione un equipo para la venta:</label>
                                        <select selected name="idEquipo" id="idEquipo" class="form-control form-select form-select-lg" required>
                                        <option disabled> Producto que adquirido</option>

                                            <option value="<?php echo $row->idEquipo; ?>">
                                                <?php echo $row->equipo; ?>
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Precio unidad del equipo:</label>
                                        <input type="number" class="form-control" required aria-invalid="true" id="precio" value="<?php echo $row->total; ?>" name="precio" autocomplete="off"> <samp>(Bs.)</samp>
                                        <input type="hidden" class="form-control" required aria-invalid="true" id="precio" value="<?php echo $row->idVenta; ?>" name="idVenta" autocomplete="off"> <samp>(Bs.)</samp>

                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group"></div>
                                    <div class="col-md-6">
                                        <label for="exampleInputEmail1">Fecha de venta:</label>

                                        <input type="date" class="form-control" required aria-invalid="true" id="fecha" value="<?php echo $row->fecha; ?>" name="fecha" autocomplete="off">

                                    </div>
                                    <div class="col-md-3"></div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="row">
                                <div class="col-md-4">

                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success btn-block">Modificar Venta <i class="fa-solid fa-file-signature fa-xl"></i></button>

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