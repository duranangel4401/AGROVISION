 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>PRODUCCIÓN</strong></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inicio</a></li>
             <li class="breadcrumb-item active">Produccion</li>
           </ol>
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
                 <div class="col-sm-8">
                   <h3 class="card-title">Lista de producción</h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/productor/agregarNuevaProduccion">
                     <button class="btn btn-primary">Agregar Nueva Producción <strong><i class="fa-solid fa-apple-whole fa-lg"></i></strong></button>
                   </a>
                 </div>
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
                   <?php
                    $indice = 1;
                    foreach ($listaProduccion->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->nombreProduccion ?></td>
                       <td><?php echo $row->descripcion ?></td>
                       <td><?php echo formatearFecha($row->fechaInicio); ?></td>
                       <td><?php echo formatearFecha($row->fechaFin); ?></td>
                       <td>
                        <!--
                         <?php
                          echo form_open_multipart('productor/gestionarProduccionClasificacion');
                          ?>
                         <input type="hidden" name="idProductor" value="<?php echo $row->idProductor; ?>">

                         <input type="hidden" name="idProduccion" value="<?php echo $row->idProduccion; ?>">
                         <button type="submit" class="btn btn-Default">Clasificaciones</button>
                         <?php echo form_close();
                          ?>
                          -->
                          Clasificación
                       </td>
                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('productor/modificarProduccion');
                              ?>
                             <input type="hidden" name="idProduccion" value="<?php echo $row->idProduccion; ?>">
                             <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('productor/deshabilitarProduccion');
                              ?>
                             <input type="hidden" name="idProduccion" value="<?php echo $row->idProduccion; ?>">
                             <button type="submit" class="btn btn-danger"><span class="fa-solid fa-trash-can"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>

                         </div>
                       </td>
                     </tr>

                   <?php
                      $indice++;
                    }
                    ?>
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