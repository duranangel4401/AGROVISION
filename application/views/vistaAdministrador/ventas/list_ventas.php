 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>VENTAS</strong></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inicio</a></li>
             <li class="breadcrumb-item active">Ventas</li>
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
                   <h3 class="card-title">Registro de Ventas - <strong>AGROVISION</strong></h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/administrador/realizarNuevaVenta">
                     <button class="btn btn-primary">Realizar Nueva Ventas <strong><i class="fa-solid fa-money-check-dollar fa-lg"></i></strong></button>
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
                     <th>Nombre del Comprador</th>
                     <th>Numero del Equipo</th>
                     <th>Total (Bs.)</th>
                     <th>Fecha de Venta</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($listaVentas->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->comprador ?></td>
                       <td><?php echo $row->serie ?></td>
                       <td><?php echo $row->total ?> Bs.</td>
                       <td><?php echo formatearFecha($row->fechaVenta); ?></td>

                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('administrador/modificarVenta');
                              ?>
                             <input type="hidden" name="idVenta" value="<?php echo $row->idVenta; ?>">
                             <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/cancelarVenta');
                              ?>
                             <input type="hidden" name="idVenta" value="<?php echo $row->idVenta; ?>">
                             <button type="submit" class="btn btn-danger"><i class="fa-solid fa-rectangle-xmark fa-lg"></i></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/imprimirVenta');
                              ?>
                             <input type="hidden" name="idVenta" value="<?php echo $row->idVenta; ?>">
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
                     <th>Nombre del Comprador</th>
                     <th>Numero de Equipo</th>
                     <th>Total (Bs.)</th>
                     <th>Fecha de Venta</th>
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