<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>REALIZAR VENTA DE EQUIPO DE SELECCIÓN - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/venta">
                        <button type="reset" class="btn btn-danger">Cancelar Venta <strong><samp class="fa-solid fa-ban fa-xl"></samp></strong></button>
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
                            <h3 class="card-title">Por favor, llene los datos para el registro de la venta de manera correcta. <i class="fa-solid fa-money-bill-transfer fa-lg"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        echo form_open_multipart('administrador/agregarVentaBDD');
                        ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6 form-group">
                                    <label for="nombre">Nombre de Productor/Comprador:</label>
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
                                    <label for="exampleInputEmail1">Seleccione un equipo para la venta:</label>
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
                                    <label for="exampleInputEmail1">Precio unidad del equipo:</label>
                                    <input type="number" class="form-control" required aria-invalid="true" id="precio" name="precio" autocomplete="off"> <samp>(Bs.)</samp>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group"></div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Fecha de venta:</label>
                                    <input type="date" class="form-control" required aria-invalid="true" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                                <div class="col-md-3"></div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="row">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">Realizar Venta  <samp class="fa-solid fa-money-bill-trend-up fa-lg"></samp></button>

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