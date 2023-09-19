 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>EQUIPOS</strong></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inicio</a></li>
             <li class="breadcrumb-item active">Equipos</li>
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
                   <h3 class="card-title">Lista de equipos <strong>AGROVISION</strong></h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/administrador/agregarNuevoEquipo">
                     <button class="btn btn-primary">Agregar Nueva Equipo <strong>+</strong></button>
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
                     <th>Serie</th>
                     <th>Descripción</th>
                     <th>Fecha Registro</th>
                     <th>Disponibilidad del Equipo</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($listaEquipos->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->serie ?></td>
                       <td><?php echo $row->descripcion ?></td>
                       <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                       <td>
                         <?php
                          if ($row->disponible == 1 && $row->vendido == 0 && $row->alquiler == 0) {
                          ?>
                           <h1 class="badge badge-success" style="font-size: 18px;"> <?php echo mensajeDisponivilidad($row->disponible, $row->vendido, $row->alquiler); ?> </h1>
                           <?php
                          } else {
                            if ($row->disponible == 1 && $row->vendido == 1 && $row->alquiler == 0) {
                            ?>
                             <h1 class="badge badge-info" style="font-size: 18px;"><?php echo mensajeDisponivilidad($row->disponible, $row->vendido, $row->alquiler); ?></h1>
                             <?php
                            } else {
                              if ($row->disponible == 1 && $row->vendido == 0 && $row->alquiler == 1) {
                              ?>
                               <h1 class="badge badge-warning" style="font-size: 18px;"><?php echo mensajeDisponivilidad($row->disponible, $row->vendido, $row->alquiler); ?></h1>
                             <?php
                              } else {
                              ?>
                               <h1 class="badge badge-danger" style="font-size: 18px;"><?php echo mensajeDisponivilidad($row->disponible, $row->vendido, $row->alquiler); ?></h1>
                         <?php
                              }
                            }
                          }
                          ?>

                       </td>
                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('administrador/modificarEquipo');
                              ?>
                             <input type="hidden" name="idEquipo" value="<?php echo $row->id; ?>">
                             <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/deshabilitarEquipo');
                              ?>
                             <input type="hidden" name="idEquipo" value="<?php echo $row->id; ?>">
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
                     <th>Serie</th>
                     <th>Descripción</th>
                     <th>Fecha Registro</th>
                     <th>Disponibilidad del Equipo</th>
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