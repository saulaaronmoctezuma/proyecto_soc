<?php
include("db.php");
$nombre = '';
$apellido_paterno= '';

if  (isset($_GET['id_solicitante'])) {
  $id_solicitante = $_GET['id_solicitante'];
  $query = "SELECT * FROM solicitante WHERE id_solicitante=$id_solicitante";
  $resultado = mysqli_query($conexion, $query);
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $nombre = $row['nombre'];
    $apellido_paterno = $row['apellido_paterno'];
    $apellido_materno = $row['apellido_materno'];
    $edad = $row['edad'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $sexo = $row['sexo'];
    $curp = $row['curp'];
    $correo = $row['correo'];
   $calle = $row['calle'];
    $colonia = $row['colonia'];
    $municipio = $row['municipio'];
    $estado = $row['estado'];
    $cp = $row['cp'];
    
  }
}

if (isset($_POST['acualizar_solicitante'])) {
  $id_solicitante = $_GET['id_solicitante'];
  $nombre= $_POST['nombre'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  $edad = $_POST['edad'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];
  $sexo = $_POST['sexo'];
  $curp = $_POST['curp'];
  $correo = $_POST['correo'];
  $calle = $_POST['fecha_nacimiento'];
  $colonia = $_POST['colonia'];
  $municipio = $_POST['municipio'];
  $estado = $_POST['estado'];
  $cp = $_POST['cp'];



  $query = "UPDATE solicitante set nombre = '$nombre', apellido_paterno = '$apellido_paterno',apellido_materno = '$apellido_materno',edad = '$edad',fecha_nacimiento = '$fecha_nacimiento',sexo = '$sexo',curp = '$curp',correo = '$correo',calle = '$calle',colonia = '$colonia',municipio = '$municipio',estado = '$estado',cp = '$cp' WHERE id_solicitante=$id_solicitante";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Modificado Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: listar_solicitante.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_solicitante.php?id_solicitante=<?php echo $_GET['id_solicitante']; ?>" method="POST">
        <div class="form-group">

        <label>Nombre</label>
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre">
        </div>
<br>

        <div class="form-group">
        <label>Apellido Paterno</label>
        <input name="apellido_paterno" type="text" class="form-control" value="<?php echo $apellido_paterno; ?>" placeholder="Apellido Paterno">
        </div>
        <br>

        <label>Apellido Materno</label>
        <div class="form-group">
        <input name="apellido_materno" type="text" class="form-control" value="<?php echo $apellido_materno; ?>" placeholder="Apellido Materno">
        </div>
        <br>

        <label>Edad</label>
        <div class="form-group">
        <input name="edad" type="text" class="form-control" value="<?php echo $edad; ?>" placeholder="Edad">
        </div>
        <br>

        <label>Fecha nacimineto</label>
        <div class="form-group">
        <input name="fecha_nacimiento" type="date" class="form-control" value="<?php echo $fecha_nacimiento; ?>" placeholder="Edad">
        </div>
        <br>

        <label>Sexo</label>
        <div class="form-group">
        <input name="sexo" type="text" class="form-control" value="<?php echo $sexo; ?>" placeholder="Sexo">
        </div>
        <br>

        <label>CURP</label>
        <div class="form-group">
        <input name="curp" type="text" class="form-control" value="<?php echo $curp; ?>" placeholder="CURP">
        </div>
        <br>


        <label>Correo</label>
        <div class="form-group">
        <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Correo">
        </div>
        <br>

        <label>Calle</label>
        <div class="form-group">
        <input name="calle" type="text" class="form-control" value="<?php echo $calle; ?>" placeholder="Calle">
        </div>
        <br>

        <label>Colonia</label>
        <div class="form-group">
        <input name="colonia" type="text" class="form-control" value="<?php echo $colonia; ?>" placeholder="Colonia">
        </div>
        <br>

        <label>Municipio</label>
        <div class="form-group">
        <input name="municipio" type="text" class="form-control" value="<?php echo $municipio; ?>" placeholder="Municipio">
        </div>
        <br>

        <label>Estado</label>
        <div class="form-group">
        <input name="estado" type="text" class="form-control" value="<?php echo $estado; ?>" placeholder="Estado">
        </div>
        <br>

        <label>CP</label>
        <div class="form-group">
        <input name="cp" type="text" class="form-control" value="<?php echo $cp; ?>" placeholder="CP">
        </div>
        <br>





        <button class="btn btn-success" name="acualizar_solicitante">
          Actualizar
</button>

<input type="button" class="btn btn-warning" onclick="history.back()" name="volver atrás" value="Regresar">
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

<script src="js/solicitante.js?v=0.2"></script>
