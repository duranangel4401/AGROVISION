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
             <div class="col-md-12">
               <div class="card card-default">
                 <div class="card-header">
                   <a href="<?php echo base_url() ?>index.php/administrador/agregarPruebaDeInserciones">
                     <button class="btn btn-primary">Realizar Inserciones - Kardex <i class="fa-solid fa-chart-bar fa-xl"></i></button>
                   </a>
                 </div>
               </div>
             </div>
           </div>
           <div class="row">
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-dark">
                 <div class="inner text-center">
                   <br>
                   <?php foreach ($obtenerProductoresActivos->result() as $row) {
                    ?>
                     <h3> <?php echo $row->productores ?> <samp>agr.</samp></h3>
                   <?php }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-users fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer">PRODUCTORES ACTIVOS - AGROVISION</a>

               </div>
             </div>

             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                 <div class="inner text-center">
                   <br>
                   <?php foreach ($obtenerTotalesGenerales->result() as $row) {
                    ?>
                     <h3> <?php echo $row->TotalManzanasGeneral ?> <samp>uds.</samp></h3>
                   <?php }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-coins fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer">TOTAL DE MANZANAS REGISTRADAS - AGROVISION</a>

               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                 <div class="inner text-center">
                   <br>
                   <?php foreach ($obtenerTotalesGenerales->result() as $row) {
                    ?>
                     <h3> <?php echo $row->TotalKilosGeneral ?> <samp>kg.</samp></h3>
                   <?php }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-scale-unbalanced-flip fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer">TOTAL DE INGREASO EN KILOS - AGROVISION</a>

               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                 <div class="inner text-center">
                   <br>
                   <?php foreach ($obtenerTotalesGenerales->result() as $row) {
                    ?>
                     <h3> <?php echo $row->TotalGramosGeneral ?> <samp>g.</samp></h3>
                   <?php }
                    ?>
                   <p></p>
                 </div>
                 <div class="icon">
                   <i class="ion"> <i class="fa-solid fa-scale-unbalanced fa-sm"></i></i>
                 </div>
                 <a class="small-box-footer">TOTAL DE INGRESO EN GRAMOS - AGROVISION</a>

               </div>
             </div>
             <!-- ./col -->

             <!-- ./col -->
           </div>
           <hr>
           <!-- Custom tabs (Charts with tabs)-->
           <div class="row">
             <div class="col-md-12">
               <div class="card card-default">
                 <div class="card-header">
                   <h3 class="card-title"><strong>Mostras Datos de ingreso de Manzanas</strong></h3>

                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>

                   </div>
                 </div>
                 <!-- /.card-header -->

                 <div class="card-body">
                   <?php
                    echo form_open_multipart('administrador/generarGraficos');
                    ?>
                   <div class="row">
                     <div class="col-md-4">
                       <label for="nombre">Seleccione al productor:</label>
                       <select name="productor" id="productor" class="form-control form-select form-select-lg" required>
                         <option value="" disabled selected>Seleccione a un Productor</option>
                         <?php foreach ($listaProductores->result() as $row) { ?>
                           <option value="<?php echo $row->id; ?>">
                             <?php echo $row->productor; ?>
                           </option>
                         <?php } ?>
                       </select>
                     </div>
                     <div class="col-md-4">
                       <label for="nombre">Seleccione al producción:</label>
                       <select name="produccion" id="produccion" class="form-control form-select form-select-lg" required></select>
                     </div>
                     <div class="col-md-4">
                       <label for="nombre">Seleccione equipo:</label>
                       <select name="equipo" id="equipo" class="form-control form-select form-select-lg" required></select>
                     </div>
                   </div>

                   <script>
                     $(document).ready(function() {
                       // Cuando se cambia la selección de productor
                       $('#productor').change(function() {
                         var productor_id = $(this).val();

                         // Realizar una solicitud Ajax para obtener las producciones correspondientes
                         $.getJSON('<?php echo base_url() ?>index.php/ajaxController/obtenerProduccion/' + productor_id, function(data) {
                           // Vaciar y llenar el select de producción
                           $('#produccion').empty().append('<option value="" disabled selected>Seleccione una producción</option>');
                           $.each(data, function(key, value) {
                             $('#produccion').append('<option value="' + value.idProduccion + '">' + value.nombreProduccion + '</option>');
                           });

                           // Al seleccionar un productor, también cambia el select de producción, así que dispara su evento change.
                           $('#produccion').trigger('change');
                         });
                       });

                       // Capturar el evento de cambio en el select de producción
                       $('#produccion').change(function() {
                         var produccion_id = $(this).val();
                         var equipo_id = $(this).val();

                         // Realizar una solicitud Ajax para obtener los equipos correspondientes para la producción seleccionada
                         $.getJSON('<?php echo base_url() ?>index.php/ajaxController/obtenerEquiposPorProduccion/' + produccion_id, function(data) {
                           $('#equipo').empty();

                           if (data.length === 0) {
                             // Si no hay equipos disponibles, muestra un mensaje predeterminado
                             $('#equipo').append('<option value="" disabled selected>No hay equipos disponibles</option>');
                           } else {
                             // Si hay equipos disponibles, muestra la opción "Todos los equipos participantes en la Producción"
                             $('#equipo').append('<option value="todo">Todos los equipos participantes en la Producción</option>');

                             // Llena el select de equipos con los equipos obtenidos
                             $.each(data, function(key, value) {
                               $('#equipo').append('<option value="' + value.idEquipo + '">' + value.nombreEquipo + '</option>');
                             });
                           }
                         });
                       });

                       // Inicialmente, al cargar la página, dispara el evento change en el select de productor
                       $('#productor').trigger('change');
                     });
                   </script>

                   <div class="row">
                     <div class="col-md-4">
                       <label for="nombre">Desde la fecha:</label>
                       <input type="date" class="form-control" id="fechaInicio" autocomplete="off" name="fechaInicio" required aria-invalid="true">
                     </div>
                     <div class="col-md-4">
                       <label for="nombre">Hasta la fecha:</label>
                       <input type="date" class="form-control" id="fechaFinal" autocomplete="off" name="fechaFinal" required aria-invalid="true">
                     </div>
                     <div class="col-md-4"><br>
                       <button type="submit" class="btn btn-info btn-block"><strong>Ver Ingreso de Manzanas <i class="fa-solid fa-chart-area fa-xl"></i></strong></button>
                     </div>
                   </div>
                   <!-- /.row -->
                   <?php echo form_close(); ?>
                 </div>
                 <!-- /.card-body -->

               </div>
             </div>
           </div>



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

 <!-- GENERACION DE REPORTES -->
 <script>
   const ctx = document.getElementById('myChart');
   const ctx1 = document.getElementById('myChart1');
   const ctx2 = document.getElementById('myChart3');


   // Obtener los datos de PHP y convertirlos a formato JavaScript
   const datosPHP = <?php echo json_encode($datosClasificacion); ?>;
   // Asegurémonos de que datosPHP sea un arreglo válido
   if (Array.isArray(datosPHP)) {
     // Crear arreglos para labels y data
     const labels = datosPHP.map(item => item.Clasificacion);
     const data = datosPHP.map(item => item.TotalManzanas); // Puedes cambiar a TotalKilos si lo deseas

     new Chart(ctx, {
       type: 'bar',
       data: {
         labels: labels,
         datasets: [{
           label: 'Total Manzanas (Barras)',
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
 </script>