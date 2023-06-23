<?php include('db.php') ?>

<?php include('includes/header.php') ?>


<main class="container p-4">
  <div class="row">
    
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Folio</th>
            <th>Nombre Completo</th>
            <th>Destino</th>
            <th>Fecha de registro</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

        <?php
          $query = "SELECT * FROM solicitante s inner join pedido p on s.id_solicitante=p.id_solicitante";
          $resultado_pedido = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($resultado_pedido)) { ?>
          <tr>
            <td><?php echo $row['folio']; ?></td>
            <td><?php echo $row['nombre'] .' '. $row['apellido_paterno'] .' '.$row['apellido_materno']; ?></td>
            <td><?php echo $row['destino']; ?></td>
            <td><?php echo $row['fecha_registro']; ?></td>
           
            <td>
              <a href="editar_pedido.php?id_pedido=<?php echo $row['id_pedido']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar_pedido.php?id_pedido=<?php echo $row['id_pedido']?>" class="btn btn-danger">
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

     <h3> Seleccione un Solicitante</h3> 
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

<br>
        <input type="submit" class="btn btn-success btn-block" onclick="return validarEdad();" value="Validar">
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


       
        <form id="form_pedido"  action="guardar_pedido.php" method="POST">
          
        
        <input id="id_del_solicitante" name="id_del_solicitante" type="hidden">


        
    
        <div class="form-group">
        <label>Destino</label>
        <select name="destino" required class="form-control" >
           <option value="">Selecciona una opción</option>
            <option value="Casa">Casa</option>
            <option value="Auto">Auto</option>
            <option value="Prestamo">Prestamo</option>
            <option value="Tarjeta">Tarjeta</option>
           </select>
          </div>
          </div>
          <br>
          <div class="form-group">

          <label>Monto</label>
           <input type="number" required min="0" name="monto_solicitado" id="monto_solicitado" class="form-control" placeholder="Monto solicitado">
          </div>
          <br>
          <div class="form-group">

          <label>Plazo</label>
          <select name="plazo" required id="plazo" class="form-control">
           <option  value="">Selecciona una opción</option>
            <option value="1 año">1 año</option>
            <option value="2 años">2 años</option>
            <option value="3 años">3 años</option>
            <option value="4 años">4 años</option>
            <option value="5 años">5 años</option>
            <option value="6 años">6 años</option>
            <option value="7 años">7 años</option>
            <option value="8 años">8 años</option>
            <option value="9 años">9 años</option>
            <option value="10 años">10 años</option>
           </select>
          </div>
          <br>

<input type="submit" onclick="return validarMonto();" name="guardar_pedido" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</main>




<?php include('includes/footer.php') ?>


<script src="js/solicitante.js?v=0.2"></script>






