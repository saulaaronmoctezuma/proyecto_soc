<?php
include("db.php");

if (isset($_GET['id_ingreso'])) {
  $id_ingreso = $_GET['id_ingreso'];
  $query = "SELECT * FROM ingreso WHERE id_ingreso=$id_ingreso";
  $resultado = mysqli_query($conexion, $query);
  if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_array($resultado);
    $nombre_empresa_trabaja = $row['nombre_empresa_trabaja'];
    $tipo_comprobante_ingreso = $row['tipo_comprobante_ingreso'];
    $salario_bruto_mensual = $row['salario_bruto_mensual'];
    $salario_neto_mensual = $row['salario_neto_mensual'];
    $fecha_inicio_trabajo = $row['fecha_inicio_trabajo'];
    
  }
}

if (isset($_POST['actualizar_ingreso'])) {
  $id_ingreso  = $_GET['id_ingreso'];
  $nombre_empresa_trabaja= $_POST['nombre_empresa_trabaja'];
  $tipo_comprobante_ingreso = $_POST['tipo_comprobante_ingreso'];
  $salario_bruto_mensual = $_POST['salario_bruto_mensual'];
  $salario_neto_mensual= $_POST['salario_neto_mensual'];
  $fecha_inicio_trabajo = $_POST['fecha_inicio_trabajo'];
 

  $query = "UPDATE ingreso SET nombre_empresa_trabaja = '$nombre_empresa_trabaja', tipo_comprobante_ingreso = '$tipo_comprobante_ingreso', salario_bruto_mensual = '$salario_bruto_mensual', salario_neto_mensual = '$salario_neto_mensual', fecha_inicio_trabajo = '$fecha_inicio_trabajo' WHERE id_ingreso = $id_ingreso";

  mysqli_query($conexion, $query);
  $_SESSION['message'] = 'Modificado Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: listar_ingreso.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar_ingreso.php?id_ingreso=<?php echo $_GET['id_ingreso']; ?>" method="POST">
       

      <div class="form-group">
        <label>Nombre de la empresa donde trabaja</label>

        <input name="nombre_empresa_trabaja" type="text" class="form-control" value="<?php echo $nombre_empresa_trabaja; ?>" placeholder="Nombre de la empresa donde trabaja">
        </div>
        <br>

        <div class="form-group">
  <label>Tipo de comprobante de Ingreso</label>
  <select name="tipo_comprobante_ingreso" class="form-control" id="tipo_comprobante_ingreso">
    <option value="">Selecciona una opción</option>
    <option value="Recibo de nomina" <?php if ($tipo_comprobante_ingreso == 'Recibo de nomina') echo 'selected'; ?>>Recibo de nomina</option>
    <option value="Carta de Ingresos" <?php if ($tipo_comprobante_ingreso == 'Carta de Ingresos') echo 'selected'; ?>>Carta de Ingresos</option>
    <option value="Recibo de Honorario" <?php if ($tipo_comprobante_ingreso == 'Recibo de Honorario') echo 'selected'; ?>>Recibo de Honorario</option>
   
  </select>
</div>

<br>

<div class="form-group">
        <label>Salario Bruto Mensual</label>

        <input name="salario_bruto_mensual" min="0" type="text" class="form-control" value="<?php echo $salario_bruto_mensual; ?>" placeholder="Salario Bruto Mensual">
        </div>
        <br>


        <div class="form-group">
        <label>Salario Neto Mensual</label>

        <input name="salario_neto_mensual" min="0"  type="text" class="form-control" value="<?php echo $salario_neto_mensual; ?>" placeholder="Salario Neto Mensual">
        </div>
        <br>

        <div class="form-group">
        <label>Fecha Inicio Trabajo</label>

        <input name="fecha_inicio_trabajo" max="<?php echo date('Y-m-d'); ?>" type="date" class="form-control" value="<?php echo $fecha_inicio_trabajo; ?>">
        </div>
        <br>
    
        <button class="btn btn-success" name="actualizar_ingreso">
          Actualizar
</button>

<input type="button" class="btn btn-warning" onclick="history.back()" name="volver atrás" value="Regresar">
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

