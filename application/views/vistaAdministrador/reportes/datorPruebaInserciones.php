 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">REPORTES</h1>
                 </div><!-- /.col -->
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Dashboard v1</li>
                     </ol>
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
                                     <a href="<?php echo base_url() ?>index.php/administrador/reporte">
                                         <button type="reset" class="btn btn-danger">Cancelar Inserción de Registros <i class="fa-solid fa-chart-bar fa-xl"></i></button>
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- Custom tabs (Charts with tabs)-->
                     <div class="row">
                         <div class="col-md-12">
                             <div class="card card-default">
                                 <div class="card-header">
                                     <h3 class="card-title"><strong>Insercion de Datos en la tabla Kardex</strong></h3>

                                     <div class="card-tools">
                                         <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                             <i class="fas fa-minus"></i>
                                         </button>

                                     </div>
                                 </div>
                                 <!-- /.card-header -->
                                 <div class="card-body">
                                     <?php
                                        echo form_open_multipart('administrador/AgregarDatosBDD');
                                        ?>
                                     <div class="row">
                                         <div class="col-md-3">
                                             <label for="nombre">Seleccione al productor:</label>
                                             <select name="productor" id="productor" class="form-control form-select form-select-lg" required>
                                                 <option value="" disabled selected>Seleccione a un Productor</option>
                                                 <?php
                                                    foreach ($listaProductores->result() as $row) {
                                                    ?>
                                                     <option value="<?php echo $row->id; ?>">
                                                         <?php echo $row->productor; ?>
                                                     </option>
                                                 <?php
                                                    }
                                                    ?>
                                             </select>
                                         </div>
                                         <div class="col-md-3">
                                             <label for="nombre">Seleccione la producción:</label>
                                             <select name="produccion" id="produccion" class="form-control form-select form-select-lg" required></select>
                                         </div>
                                         <div class="col-md-3">
                                             <label for="nombre">Seleccione el Alquiler:</label>
                                             <select name="alquiler" id="alquiler" class="form-control form-select form-select-lg" required>
                                                 <option value="" disabled selected data-productor="" data-idalquiler="">Seleccione un alquiler</option>
                                                 <!-- Opciones de alquiler -->
                                             </select>
                                         </div>
                                         <div class="col-md-3">
                                             <label for="nombre">Seleccione equipo:</label>
                                             <select name="equipo" id="equipo" class="form-control form-select form-select-lg" required>
                                                 <!-- Opciones de equipo se cargarán dinámicamente aquí -->
                                             </select>
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
                                                 });

                                                 // Realizar una solicitud Ajax para obtener los alquileres correspondientes
                                                 $.getJSON('<?php echo base_url() ?>index.php/ajaxController/obtenerAlquileresPorProductor/' + productor_id, function(data) {
                                                     // Vaciar y llenar el select de alquiler
                                                     $('#alquiler').empty().append('<option value="" disabled selected data-productor="' + productor_id + '" data-idalquiler="">Seleccione un alquiler</option>');
                                                     $.each(data, function(key, value) {
                                                         $('#alquiler').append('<option value="' + value.idAlquiler + '">' + value.alquilerDatos + '</option>');
                                                     });
                                                 });

                                                 // Realizar una solicitud Ajax para obtener los equipos correspondientes
                                                 $.getJSON('<?php echo base_url() ?>index.php/ajaxController/productorEquiposAlquilados/' + productor_id, function(data) {
                                                     // Vaciar y llenar el select de equipo
                                                     $('#equipo').empty().append('<option value="" disabled selected>Seleccione un equipo</option>');
                                                     $.each(data, function(key, value) {
                                                         $('#equipo').append('<option value="' + value.idAlquiler + '">' + value.nombreEquipo + '</option>');
                                                     });
                                                 });
                                             });

                                             // Capturar el evento de cambio en el select de alquiler
                                             $('#alquiler').change(function() {
                                                 var productor_id = $(this).find(':selected').data('productor');
                                                 var alquiler_id = $(this).val();

                                                 // Realizar una solicitud Ajax para obtener los equipos correspondientes para el productor y el alquiler seleccionados
                                                 $.getJSON('<?php echo base_url() ?>index.php/ajaxController/productorEquiposAlquilados/' + alquiler_id, function(data) {
                                                     // Vaciar y llenar el select de equipo
                                                     $('#equipo').empty().append('<option value="" disabled selected>Seleccione un equipo</option>');
                                                     $.each(data, function(key, value) {
                                                         $('#equipo').append('<option value="' + value.idEquipo + '">' + value.nombreEquipo + '</option>');
                                                     });
                                                 });
                                             });
                                         });
                                     </script>

                                     <div class="row">
                                         <div class="col-md-2">
                                             <label for="nombre">Desde la fecha:</label>
                                             <input type="date" class="form-control" id="fechaInicio" autocomplete="off" name="fechaInicio" required aria-invalid="true">
                                         </div>
                                         <div class="col-md-2">
                                             <label for="nombre">Hasta la fecha:</label>
                                             <input type="date" class="form-control" id="fechaFinal" autocomplete="off" name="fechaFinal" required aria-invalid="true">
                                         </div>
                                         <div class="col-md-2   ">
                                             <label for="nombre">Rago de peso en <samp>(gramos)</samp> Inicio:</label>
                                             <input type="number" class="form-control" id="pesoInicio" autocomplete="off" name="pesoInicio" required aria-invalid="true">
                                         </div>
                                         <div class="col-md-2">
                                             <label for="nombre">Rago de peso en <samp>(gramos)</samp> Final:</label>
                                             <input type="number" class="form-control" id="pesoFinal" autocomplete="off" name="pesoFinal" required aria-invalid="true">
                                         </div>
                                         <div class="col-md-2">
                                             <label for="nombre">Cantidad de Inserciones a Realizar:</label>
                                             <input type="number" class="form-control" id="cantidad" autocomplete="off" name="cantidad" required aria-invalid="true">
                                         </div>
                                         <div class="col-md-2">
                                             <br>
                                             <button type="submit" class="btn btn-primary btn-block">Insertar Datos</button>
                                         </div>
                                     </div>
                                     <!-- /.row -->
                                     <?php echo form_close(); ?>
                                 </div>
                                 <!-- /.card-body -->

                             </div>
                         </div>
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