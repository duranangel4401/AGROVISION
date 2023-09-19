<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MODIFICAR DATOS DEL PRODUCTOR</h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/productor">
                        <button type="reset" class="btn btn-danger">Cancelar la Modificacion<strong><samp class="fa-solid fa-user-large-slash"></samp></strong></button>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Por favor llene los datos de manera correcta. <i class="fa-solid fa-file-circle-check"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($iformacionProductor->result() as $row) {
                            echo form_open_multipart('administrador/modificarProductorBDD');
                        ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <input type="hidden" value="<?php echo $row->id ?>" class="form-control" id="idProductor" name="idProductor">

                                        <label for="nombre">Nombres:</label>
                                        <input type="text" value="<?php echo $row->nombres ?>" class="form-control" id="nombres" name="nombres" required aria-invalid="true" placeholder="Ingrese nombre del productor">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Apellido Paterno:</label>
                                        <input type="text" value="<?php echo $row->primerApellido ?>" class="form-control" required aria-invalid="true" id="primerApellido" name="primerApellido" placeholder="Ingrese apellido paterno">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Apellido Materno:</label>
                                        <input type="text" value="<?php echo $row->segundoApellido ?>" class="form-control" id="segundoApellido" name="segundoApellido" placeholder="Ingrese apellido Materno">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Fecha Nacimiento:</label>
                                        <input type="date" value="<?php echo $row->fechaNacimiento ?>" class="form-control" required aria-invalid="true" id="fechaNacimiento" name="fechaNacimiento">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 form-group">
                                        <label for="nombre">Sexo:</label>
                                        <select class="form-control" id="sexo" name="sexo">
                                            <?php
                                            if ($row->sexo == 'F') {
                                            ?>
                                                <option value="F" selected>Femenino</option>
                                                <option value="M">Masculino</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="F">Femenino</option>
                                                <option value="M" selected>Masculino</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Teléfono/Celular:</label>
                                        <input type="number" value="<?php echo $row->telefonos ?>" class="form-control" required aria-invalid="true" id="telefonos" name="telefonos" placeholder="Añada telefono o celular del productor">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Correo Electrónico:</label>
                                        <input type="email" value="<?php echo $row->email ?>" class="form-control" required aria-invalid="true" id="email" name="email" placeholder="Ingrese email del productor">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="exampleInputEmail1">Descripción:</label>
                                        <input type="text" value="<?php echo $row->descripcion ?>" class="form-control" required aria-invalid="true" id="descripcion" name="descripcion" placeholder="Añada una descripción del productor">
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="row">
                                <div class="col-md-3 form-group">
                                </div>
                                <div class="col-md-6 form-group">
                                    <button type="submit" class="btn btn-success btn-block">Modificar Datos Productor  <i class="fa-solid fa-user-tag fa-lg"></i></button>
                                </div>
                                <div class="col-md-3 form-group"></div>
                            </div>
                        <?php echo form_close();
                        }
                        ?>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>