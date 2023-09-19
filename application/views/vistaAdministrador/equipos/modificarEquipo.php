<div class="content-wrapper" style="min-height: 1474.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MODIFICAR DATOS DEL EQUIPO - <strong>AGROVISION</strong></h1>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo base_url() ?>index.php/administrador/equipo">
                        <button type="reset" class="btn btn-danger">Cancelar Modificación <strong><samp class="fa-regular fa-thumbs-down fa-xl"></samp></strong></button>
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
                            <h3 class="card-title">Verifique los datos del equipo antes de modificar. <i class="fa-regular fa-thumbs-up fa-xl"></i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        foreach ($iformacionEquipo->result() as $row) {
                            echo form_open_multipart('administrador/modificarEquipoBDD');
                        ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="hidden" value="<?php echo $row->id ?>" class="form-control" id="idEquipo" name="idEquipo">

                                        <label for="nombre"># Serie del Equipo:</label>
                                        <input type="text" value="<?php echo $row->serie ?>" class="form-control" id="serie" name="serie" required aria-invalid="true" placeholder="Ingrese Numero de Serie del Equipo">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="exampleInputEmail1">Descripción:</label><br>
                                        <textarea class="form-control w-100 h-100" name="descripcion" id="descripcion" required cols="30" rows="10"><?php echo $row->descripcion ?></textarea>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3 form-group"> </div>
                                    <div class="col-md-6 form-group">
                                        <button type="submit" class="btn btn-success btn-block">Modificar Datos</button>
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