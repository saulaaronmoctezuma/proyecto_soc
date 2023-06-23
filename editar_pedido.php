<?php
include("db.php");


if  (isset($_GET['id_pedido'])) {
  $id_pedido = $_GET['id_pedido'];
  $query = "SELECT * FROM pedido WHERE id_pedido=$id_pedido";
  $resultado = mysqli_query($conexion, $query);
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $destino = $row['destino'];
    $monto_solicitado = $row['monto_solicitado'];
    $plazo = $row['plazo'];
  }
}

if (isset($_POST['acualizar_pedido'])) {
  $id_pedido = $_GET['id_pedido'];
  $destino= $_POST['destino'];
  $monto_solicitado = $_POST['monto_solicitado'];
  $plazo = $_POST['plazo'];

  $query = "UPDATE pedido set destino = '$destino', monto_solicitado = '$monto_solicitado', plazo = '$plazo' WHERE id_pedido=$id_pedido";
  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Modificado Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: listar_pedido.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_pedido.php?id_pedido=<?php echo $_GET['id_pedido']; ?>" method="POST">
       

        <div class="form-group">
  <label>Destino</label>
  <select required name="destino" class="form-control" id="destino">
    <option value="">Selecciona una opción</option>
    <option value="Casa" <?php if ($destino == 'Casa') echo 'selected'; ?>>Casa</option>
    <option value="Auto" <?php if ($destino == 'Auto') echo 'selected'; ?>>Auto</option>
    <option value="Prestamo" <?php if ($destino == 'Prestamo') echo 'selected'; ?>>Préstamo</option>
    <option value="Tarjeta" <?php if ($destino == 'Tarjeta') echo 'selected'; ?>>Tarjeta</option>
  </select>
</div>



<br>
        <div class="form-group">
        <label>Monto Solicitado</label>

        <input required name="monto_solicitado" id="monto_solicitado" type="number" class="form-control" value="<?php echo $monto_solicitado; ?>" placeholder="Monto Solicitado">
        </div>
        <br>
        <div class="form-group">
  <label>Plazo</label>
  <select name="plazo" required class="form-control">
    <option value="">Selecciona una opción</option>
    <option value="1 año" <?php if ($plazo == "1 año") echo "selected"; ?>>1 año</option>
    <option value="2 años" <?php if ($plazo == "2 años") echo "selected"; ?>>2 años</option>
    <option value="3 años" <?php if ($plazo == "3 años") echo "selected"; ?>>3 años</option>
    <option value="4 años" <?php if ($plazo == "4 años") echo "selected"; ?>>4 años</option>
    <option value="5 años" <?php if ($plazo == "5 años") echo "selected"; ?>>5 años</option>
    <option value="6 años" <?php if ($plazo == "6 años") echo "selected"; ?>>6 años</option>
    <option value="7 años" <?php if ($plazo == "7 años") echo "selected"; ?>>7 años</option>
    <option value="8 años" <?php if ($plazo == "8 años") echo "selected"; ?>>8 años</option>
    <option value="9 años" <?php if ($plazo == "9 años") echo "selected"; ?>>9 años</option>
    <option value="10 años" <?php if ($plazo == "10 años") echo "selected"; ?>>10 años</option>
  </select>
</div>
<br>
        <button class="btn btn-success" onclick="return validarMonto();"  name="acualizar_pedido">
          Actualizar
</button>

<input type="button" class="btn btn-warning" onclick="history.back()" name="volver atrás" value="Regresar">
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

<script src="js/solicitante.js?v=0.3"></script>
