<?php

include("db.php");

if(isset($_GET['id_ingreso'])) {
  $id_ingreso= $_GET['id_ingreso'];
  $query = "DELETE FROM ingreso WHERE id_ingreso = $id_ingreso";
  $resultado = mysqli_query($conexion, $query);
  if(!$resultado) {
    die("Error en la consulta.");
  }

  $_SESSION['message'] = 'Se elimino correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: listar_ingreso.php');
}

?>