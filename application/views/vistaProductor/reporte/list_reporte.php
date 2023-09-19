 <!-- Content Wrapper. Contains page content -->

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">REPORTES</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">

         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">

       <!-- Main row -->
       <div class="row">
         <!-- Left col -->
         <section class="col-lg-12 connectedSortable">
           <div class="row">
             <div class="col-lg-4 col-6">
               <!-- small box -->
               <div class="small-box bg-dark">
                 <div class="inner text-center">
                   <br>
                   <?php
                    foreach ($totalSeleccionadosProductor->result() as $row) {
                    ?>
                     <h3><strong><?php echo $row->totalSelect ?> reg. </strong></h3>
                   <?php
                    }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-file-contract fa-LG"></i></i>
                 </div>
                 <a class="small-box-footer"><strong>TOTAL MANZANAS REGISTRADAS</strong></a>

               </div>
             </div>

             <!-- ./col -->
             <div class="col-lg-4 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                 <div class="inner text-center">
                   <br>
                   <?php
                    foreach ($totalKilosProductor->result() as $row) {
                    ?>
                     <h3><strong><?php echo $row->totalKilos ?> Kilos. </strong></h3>
                   <?php
                    }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-scale-unbalanced-flip fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer"><strong>TOTAL DE INGREASO EN KILOS</strong></a>

               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-4 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                 <div class="inner text-center">
                   <br>
                   <H3><?php echo $totalIngresoBs; ?> <Samp>Bs.</Samp></H3>

                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-scale-unbalanced fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer"><strong>TOTAL EN Bs. REGISTRADOS</strong></a>

               </div>
             </div>
           </div>
           <hr>







           <div class="card">
             <div class="card-header p-2">
               <ul class="nav nav-pills">
                 <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Diagrama Barras</a></li>
                 <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Diagrama Pastel</a></li>
                 <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Lineal</a></li>
               </ul>
             </div><!-- /.card-header -->
             <div class="card-body">
               <div class="tab-content">
                 <div class="tab-pane active" id="activity">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="card card-success">

                         <div class="card-body">
                           <div class="chart" style="height: 500px;">
                             <div class="chartjs-size-monitor">
                               <div class="chartjs-size-monitor-expand">
                                 <div class=""></div>
                               </div>
                               <div class="chartjs-size-monitor-shrink">
                                 <div class=""></div>
                               </div>
                             </div>
                             <canvas id="myChart" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 520px;" width="520" height="500px" class="chartjs-render-monitor"></canvas>
                           </div>
                         </div>
                         <!-- /.card-body -->
                       </div>
                     </div>
                   </div>

                 </div>

                 <!-- /.tab-pane -->
                 <div class="tab-pane" id="timeline">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="card card-danger">

                         <div class="card-body">
                           <div class="chartjs-size-monitor">
                             <div class="chartjs-size-monitor-expand">
                               <div class=""></div>
                             </div>
                             <div class="chartjs-size-monitor-shrink">
                               <div class=""></div>
                             </div>
                           </div>
                           <canvas id="myChart1" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 520px;" width="520" height="500px" class="chartjs-render-monitor"></canvas>
                         </div>
                         <!-- /.card-body -->
                       </div>
                     </div>
                   </div>

                 </div>
                 <!-- /.tab-pane -->

                 <div class="tab-pane" id="settings">
                   <div class="row">
                     <div class="col-md-12">
                       <div class="card card-info">

                         <div class="card-body">
                           <div class="chartjs-size-monitor">
                             <div class="chartjs-size-monitor-expand">
                               <div class=""></div>
                             </div>
                             <div class="chartjs-size-monitor-shrink">
                               <div class=""></div>
                             </div>
                           </div>
                           <canvas id="myChart3" style="min-height: 500px; height: 500px; max-height: 500px; max-width: 100%; display: block; width: 520px;" width="520" height="500px" class="chartjs-render-monitor"></canvas>
                         </div>
                         <!-- /.card-body -->
                       </div>
                     </div>
                   </div>

                 </div>
                 <!-- /.tab-pane -->
               </div>
               <!-- /.tab-content -->
             </div><!-- /.card-body -->
           </div>


           <!-- /.card -->
         </section>
         <!-- /.Left col -->

       </div>
       <!-- /.row (main row) -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>


 <script>
   const ctx = document.getElementById('myChart');
   const ctx1 = document.getElementById('myChart1');
   const ctx2 = document.getElementById('myChart3');


   // Obtener los datos de PHP y convertirlos a formato JavaScript
   const datosPHP = <?php echo json_encode($datosClasificacionProductor); ?>;
   // Asegurémonos de que datosPHP sea un arreglo válido
   if (Array.isArray(datosPHP)) {
     // Crear arreglos para labels y data
     const labels = datosPHP.map(item => item.nombreClasificacion);
     const data = datosPHP.map(item => item.total); // Puedes cambiar a TotalKilos si lo deseas

     new Chart(ctx, {
       type: 'bar',
       data: {
         labels: labels,
         datasets: [{
           label: 'Total de Manzanas Ingresadas',
           data: data,
           backgroundColor: [
             'rgba(255, 99, 132, 0.9)',
             'rgba(255, 159, 64, 0.9)',
             'rgba(255, 205, 86, 0.9)',
             'rgba(75, 192, 192, 0.9)',
             'rgba(54, 162, 235, 0.9)',
             'rgba(153, 102, 255, 0.9)',
             'rgba(201, 203, 207, 0.9)'
           ],
           borderColor: [
             'rgb(255, 99, 132)',
             'rgb(255, 159, 64)',
             'rgb(255, 205, 86)',
             'rgb(75, 192, 192)',
             'rgb(54, 162, 235)',
             'rgb(153, 102, 255)',
             'rgb(201, 203, 207)'
           ],
           borderWidth: 1,

         }]
       },
       options: {
         scales: {
           y: {
             beginAtZero: true
           }
         }
       }
     });

     new Chart(ctx1, {
       type: 'doughnut',
       data: {
         labels: labels,
         datasets: [{
           label: 'Total Manzanas (Pastel)', // Cambia el nombre si es necesario
           data: data,

           borderWidth: 1
         }]
       }
     });

     new Chart(ctx2, {
       type: 'line',
       data: {
         labels: labels,
         datasets: [{
           label: 'Total Manzanas (Barras)',
           data: data,

           borderWidth: 1
         }]
       },
       options: {
         scales: {
           y: {
             beginAtZero: true
           }
         }
       }
     });

   } else {
     console.error("Los datos obtenidos de PHP no son un arreglo válido.");
   }

   // Función para recargar la página cada 5 segundos
   function autoRefresh() {
     setTimeout(function() {
       location.reload();
     }, 5000); // 5000 milisegundos = 5 segundos
   }

   // Llama a la función para iniciar el proceso de recarga automática
   autoRefresh();
 </script>