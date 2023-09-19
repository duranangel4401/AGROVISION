 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>ALQUILER DE EQUIPOS DE SELLECCION</strong></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inicio</a></li>
             <li class="breadcrumb-item active">Alquiler</li>
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
                   <h3 class="card-title">Registro de alquiler de equipos - <strong>AGROVISION</strong></h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/administrador/realizarAlquiler">
                     <button class="btn btn-primary">Registrar nuevo alquiler <strong><i class="fa-solid fa-file-invoice-dollar fa-lg"></i></strong></button>
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
                     <th>Productor</th>
                     <th>Numero de Equipo</th>
                     <th>Fecha inicio de Alquiler</th>
                     <th>Fecha devolucion del equipo</th>
                     <th>Precio de Alquiler (Bs.)</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($listaAlquiler->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->productor ?></td>
                       <td><?php echo $row->serie ?></td>
                       <td><?php echo formatearFecha($row->fechaAlquiler); ?></td>
                       <td><?php echo formatearFecha($row->fechaDevolucion); ?></td>
                       <td><?php echo $row->total ?> Bs.</td>

                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('administrador/modificarAlquiler');
                              ?>
                             <input type="hidden" name="idAlquiler" value="<?php echo $row->idAlquiler; ?>">
                             <button type="submit" class="btn btn-success" data-toggle="tooltip" title="Equitar Alquiler"><span class="fa fa-edit"></span>
                             </button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/cancelarAlquiler');
                              ?>
                             <input type="hidden" name="idAlquiler" value="<?php echo $row->idAlquiler; ?>">
                             <button type="submit" class="btn btn-danger" ><span class="fa-solid fa-trash-can"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/imprimirAlquiler');
                              ?>
                             <input type="hidden" name="idAlquiler" value="<?php echo $row->idAlquiler; ?>">
                             <button type="submit" class="btn btn-info"><i class="fa-solid fa-print fa-lg"></i></span></button>
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
                     <th>Productor</th>
                     <th>Numero de Equipo</th>
                     <th>Fecha inicio de Alquiler</th>
                     <th>Fecha devolucion del equipo</th>
                     <th>Precio de Alquiler (Bs.)</th>
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