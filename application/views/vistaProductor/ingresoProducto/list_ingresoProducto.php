 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>INGRESOS GRAL.</strong></h1>
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
                   <h3 class="card-title">Detalle General de Ingresos</h3>

                 </div>
                 <div class="col-sm-4">

                 </div>
               </div>
             </div>
             <!-- /.card-header -->
             <div class="card-body">
               <table id="example2" class="table table-bordered table-hover" style="text-align: center;">
                 <thead>
                   <tr style="background-color: #E5E5E5;">
                     <th>N°</th>
                     <th>Nombre Clasificación</th>
                     <th>Total <samp>(Kilos)</samp></th>
                     <th>Presio por Kilo</th>
                     <th>Total Ingresos <samp>(Bs.)</samp></th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($obtenerTotalKilosBs as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->nombreClasificacion ?></td>
                       <td><?php echo $row->TOTALkILOS ?></td>
                       <td><?php echo $row->costo ?></td>

                       <td><?php echo $row->TOTALbs ?></td>
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
                     <th>Total <samp>(Kilos)</samp></th>
                     <th>Presio por Kilo</th>
                     <th>Total Ingresos <samp>(Bs.)</samp></th>
                   </tr>
                 </tfoot>
                 </table>
             </div>
             <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                 <div class="small-box bg-default">
                   <div class="inner text-center">
                     <br>
                     <H3><?php echo $totalIngresoBs; ?> <Samp>Bs.</Samp></H3>

                   </div>
                   <div class="icon">
                     <i class="ion"> <i class="fa-solid fa-hand-holding-dollar fa-lg"></i></i></i>
                   </div>
                   <a class="small-box-footer" style="color: black;"><strong>TOTAL EN Bs. REGISTRADOS</strong></a>

                 </div>
               </div>

               <div class="col-md-4"></div>

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