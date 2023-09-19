 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-12">
                     <?php
                        foreach ($nombreProduccion->result() as $row) {
                        ?>
                         <h1><strong><?php echo $row->nombreProduccion ?></strong></h1>
                     <?php
                        }
                        ?>
                 </div>

             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <div class="row">
                                 <?php
                                    echo form_open_multipart('administrador/agregarAlquilerBDD');
                                    ?>
                                 <div class="col-sm-4">
                                 <label for="exampleInputEmail1">Clasificaciones del Productor: </label>
                                     <select name="idClasificacion" id="idClasificacion" class="form-control form-select form-select-lg" required>
                                         <option value="" disabled selected>Clasificaciones disponibles</option>

                                         
                                     </select>

                                 </div>
                                 <div class="col-sm-4">

                                 </div>
                                 <div class="col-sm-4">

                                 </div>
                                 <?php echo form_close(); ?>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <table id="example2" class="table table-bordered table-hover " style="text-align: center;">
                                 <thead>
                                     <tr style="background-color: #E5E5E5;">
                                         <th>N°</th>
                                         <th>Nombre</th>
                                         <th>Descripcion(s)</th>
                                         <th>Fecha Inicio</th>
                                         <th>Fecha Fin</th>
                                         <th>Asignacion - <samp>Clasificación</samp></th>
                                         <th>Acciones</th>
                                     </tr>
                                 </thead>
                                 <tbody>

                                 </tbody>
                                 <tfoot>
                                     <tr>
                                         <th>N°</th>
                                         <th>Nombre</th>
                                         <th>Descripcion(s)</th>
                                         <th>Fecha Inicio</th>
                                         <th>Fecha Fin</th>
                                         <th>Asignacion - <samp>Clasificación</samp></th>

                                         <th>Acciones</th>
                                     </tr>
                                 </tfoot>
                             </table>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
                 <!-- /.col -->
             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>