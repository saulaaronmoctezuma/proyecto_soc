<?php include('db.php') ?>

<?php include('includes/header.php') ?>


<main class="container p-4">
  <div class="row">
   
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre Empresa</th>
            <th>Nombre Completo</th>
            <th>Tipo de Comprobante de Ingreso</th>
            <th>Salario bruto mensual</th>
            <th>Salario neto mensual</th>
            
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

        <?php
          $query = "SELECT * FROM solicitante s inner join ingreso i on s.id_solicitante=i.id_solicitante order by fecha_registro";
          $resultado_pedido = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($resultado_pedido)) { ?>
          <tr>
            <td><?php echo $row['nombre_empresa_trabaja']; ?></td>
            <td><?php echo $row['nombre'] .' '. $row['apellido_paterno'] .' '.$row['apellido_materno']; ?></td>
            <td><?php echo $row['tipo_comprobante_ingreso']; ?></td>
            <td><?php echo $row['salario_bruto_mensual']; ?></td>
            <td><?php echo $row['salario_neto_mensual']; ?></td>
           
            <td>
              <a href="editar_ingreso.php?id_ingreso=<?php echo $row['id_ingreso']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar_ingreso.php?id_ingreso=<?php echo $row['id_ingreso']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
         
        </tbody>
      </table>
    </div>



    <div class="col-md-4">
     

     <?php if (isset($_SESSION['message'])) { ?>
     <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
       <?= $_SESSION['message']?>


       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <?php session_unset(); } ?>


    
     
     <div class="card card-body">

    
   <form method="POST" action="">
       
       <label>Solicitante</label>
<select name="nombre" class="form-control" id="nombre" >
 <option value="">Selecciona una opción</option>
 <?php
 $query = "SELECT * FROM solicitante";
 $resultado_sol = mysqli_query($conexion, $query);

 while ($row = mysqli_fetch_assoc($resultado_sol)) {
   ?>
   <option value="<?php echo $row['id_solicitante']; ?>">
     <?php echo $row['nombre']; ?>
   </option>
 <?php
 } ?>
</select>


      
   </form>






      
       <div class="form-group">
         
         <div class="form-group">


<select name="id_solicitant" style="display: none;" class="form-control" id="id_solicitant">
 <option value="">Selecciona una opción</option>
 <?php
 $query = "SELECT * FROM solicitante s  ";
 $resultado_sol = mysqli_query($conexion, $query);

 while ($row = mysqli_fetch_assoc($resultado_sol)) {
   ?>
   <option value="<?php echo $row['id_solicitante']; ?>"><?php echo $row['edad']; ?></option>
 <?php
 } ?>
</select>
        
 





   
         </div>
         <br>


      
       <form id="form_ingreso"  action="guardar_ingreso.php" method="POST">
         
       
       <input id="id_del_solicitante" name="id_del_solicitante" type="hidden">


       <div class="form-group">

         <label>Nombre de la empresa donde trabaja</label>
         <input type="text" required name="nombre_empresa_trabaja" id="nombre_empresa_trabaja" class="form-control" placeholder="Nombre de la empresa">
         </div>
         <br>
   
       <div class="form-group">
       <label>Tipo de comprobante de Ingresos</label>
       <select name="tipo_comprobante_ingreso" required class="form-control" id="tipo_comprobante_ingreso">
          <option value="">Selecciona una opción</option>
           <option value="Recibo de nomina">Recibo de nomina</option>
           <option value="Carta de Ingresos">Carta de Ingresos</option>
           <option value="Recibo de Honorario">Recibo de Honorario</option>
           
          </select>
         </div>
         </div>
         <br>


         <div class="form-group">

         <label>Salario Bruto Mensual</label>
         <input type="text" required name="salario_bruto_mensual" id="salario_bruto_mensual" class="form-control" placeholder="Salario Bruto Mensual">
         </div>
         <br>

         <div class="form-group">

         <label>Salario Neto Mensual</label>
         <input type="text" required name="salario_neto_mensual" id="salario_neto_mensual" class="form-control" placeholder="Salario Neto Mensual">
         </div>
         <br>

         <div class="form-group">

         <label>Fecha de Inicio de trabajo</label>
         <input type="date" required name="fecha_inicio_trabajo" id="fecha_inicio_trabajo" ="<?php echo date('Y-m-d'); ?>" class="form-control" >
         </div>
         <br>
        
         

<input type="submit" name="guardar_ingreso" class="btn btn-success btn-block" value="Guardar">
       </form>
     </div>
   </div>
  </div>
</main>




<?php include('includes/footer.php') ?>







