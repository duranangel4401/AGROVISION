 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper" style="background-image: url('<?php echo base_url(); ?>adminlte/images/fondo.jpg'); background-size: cover;">

   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1><strong>PRODUCTOR</strong></h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Inicio</a></li>
             <li class="breadcrumb-item active">Productor</li>
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
                   <h3 class="card-title">Lista de productores - SIS</h3>

                 </div>
                 <div class="col-sm-4">
                   <a href="<?php echo base_url() ?>index.php/administrador/agregarNuevoProductor">
                     <button class="btn btn-primary">Agregar Nueva Productor <strong><samp class="fa-solid fa-user-plus"></samp></strong></button>
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
                     <th>Nombre Compelto</th>
                     <th>Correo Electronico</th>
                     <th>Telefono/Celular</th>
                     <th>Descripción</th>
                     <th>Rol</th>
                     <th>Nombre de Usuario</th>
                     <th>Acciones</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $indice = 1;
                    foreach ($listaProductores->result() as $row) {
                    ?>
                     <tr>
                       <td><?php echo $indice ?></td>
                       <td><?php echo $row->productor ?></td>
                       <td><?php echo $row->email ?></td>
                       <td><?php echo $row->telefonos ?></td>
                       <td><?php echo $row->descripcion ?></td>
                       <td><?php echo $row->rol ?></td>
                       <td><?php echo $row->nombreUsuario ?></td>

                       <td>
                         <div style="display: flex; justify-content: center; align-items: center;">
                           <div>
                             <?php
                              echo form_open_multipart('administrador/modificarProductor');
                              ?>
                             <input type="hidden" name="idProductor" value="<?php echo $row->id; ?>">
                             <button type="submit" class="btn btn-success"><span class="fa fa-edit"></span></button>
                             <?php echo form_close();
                              ?>
                           </div>
                           <div>
                             <?php
                              echo form_open_multipart('administrador/deshabilitarProductor');
                              ?>
                             <input type="hidden" name="idProductor" value="<?php echo $row->id; ?>">
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
                     <th>Nombre Compelto</th>
                     <th>Correo Electronico</th>
                     <th>Telefono/Celular</th>
                     <th>Descripción</th>
                     <th>Rol</th>
                     <th>Nombre de Usuario</th>
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