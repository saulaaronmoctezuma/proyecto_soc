<?php include('db.php') ?>

<?php include('includes/header.php') ?>


<main class="container p-4">
  <div class="row">

  <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Fecha de Nacimiento</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

        <?php
          $query = "SELECT * FROM solicitante";
          $resultado_solicitante = mysqli_query($conexion, $query);    

          while($row = mysqli_fetch_assoc($resultado_solicitante)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido_paterno']; ?></td>
            <td><?php echo $row['apellido_materno']; ?></td>
            <td><?php echo $row['edad']; ?></td>
            <td><?php echo $row['fecha_nacimiento']; ?></td>
            <td>
              <a href="editar_solicitante.php?id_solicitante=<?php echo $row['id_solicitante']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="eliminar_solicitante.php?id_solicitante=<?php echo $row['id_solicitante']?>" class="btn btn-danger">
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



      <?php if (isset($_SESSION['message_error'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type_e']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message_error']?>


        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

     
      <div class="card card-body">
        <form action="guardar_solicitante.php" method="POST">
          <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
          </div>
          <br>
          <div class="form-group">
          <label>Apellido Paterno</label>
           <input type="text" name="apellido_paterno" class="form-control" placeholder="Apellido Paterno" required>
          </div>
          <br>
          <div class="form-group">
          <label>Apellido Materno</label>
           <input type="text" name="apellido_materno" class="form-control" placeholder="Apellido Materno" required>
          </div>
          <br>
          
          <div class="form-group">
          <label>Fecha de Nacimiento</label>
           <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Fecha_nacimiento" required>
          </div>
        <br>
          <div class="form-group">
          <label>Sexo</label>
           <select name="sexo" class="form-control" required>
           <option value="">Selecciona una opción</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
           </select>
          </div>

          <br>


          <div class="form-group">
          <label>Curp</label>
           <input type="text" required name="curp" maxlength="18" class="form-control" placeholder="CURP">
          </div>
          <br>

          <div class="form-group">
          <label>Correo</label>
           <input type="email" required name="correo" class="form-control" placeholder="correo">
          </div>
          <br>

          <div class="form-group">
          <label>Calle</label>
           <input type="text" name="calle" class="form-control" placeholder="Calle">
          </div>
          <br>

          <div class="form-group">
          <label>Colonia</label>
           <input type="text" name="colonia" class="form-control" placeholder="Colonia">
          </div>
          <br>

          <div class="form-group">
          <label>Municipio</label>
           <input type="text" name="municipio" class="form-control" placeholder="Municipio">
          </div>
          <br>

          <div class="form-group">
          <label>Estado</label>
           <input type="text" name="estado" class="form-control" placeholder="Estado">
          </div>
          <br>

          <div class="form-group">
          <label>Codigo Postal</label>
           <input type="number" maxLenght="5" name="cp" class="form-control" placeholder="Codigo Postal">
          </div>
          <br>

          <input type="submit" name="guardar_solicitante" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    
  </div>
</main>




<?php include('includes/footer.php') ?>









