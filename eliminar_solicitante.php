<?php

include("db.php");

if(isset($_GET['id_solicitante'])) {
  $id_solicitante = $_GET['id_solicitante'];
  $query = "DELETE FROM solicitante WHERE id_solicitante = $id_solicitante";
  $resultado = mysqli_query($conexion, $query);
  if(!$resultado) {
    die("Error en la consulta");
  }

  $_SESSION['message'] = 'Se elimino correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: listar_solicitante.php');
}

?>