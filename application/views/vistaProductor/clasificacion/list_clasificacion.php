 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>CLASIFICACIÓN</strong></h1>
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
                   <h3 class="card-title">Lista de Clasificación</h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/productor/agregarNuevaClasificacion">
                     <button class="btn btn-primary">Agregar Nueva Clasificación <strong><i class="fa-solid fa-scale-balanced fa-xl"></i></strong></button>
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
                     <th>Nombre Clasificación</th>
                     <th>Rango Minimo <samp>(Gramos)</samp></th>
                     <th>Rango Maximo <samp>(Gramos)</samp></th>
                     <th>Fecha Registro</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($listaClasificacion->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->nombreClasificacion ?></td>
                       <td><?php echo $row->rangoMinimo ?></td>
                       <td><?php echo $row->rangoMaximo ?></td>
                       <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('productor/modificarClasificacion');
                              ?>
                             <input type="hidden" name="idClasificacion" value="<?php echo $row->idClasificacion; ?>">
                             <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('productor/deshabilitarClasificacion');
                              ?>
                             <input type="hidden" name="idClasificacion" value="<?php echo $row->idClasificacion; ?>">
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
                   <tr style="background-color: #E5E5E5;">
                     <th>N°</th>
                     <th>Nombre Clasificación</th>
                     <th>Rango Minimo (gramos))</th>
                     <th>Rango Maximo (gramos)</th>
                     <th>Fecha Registro</th>
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