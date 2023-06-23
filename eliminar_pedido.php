<?php

include("db.php");

if(isset($_GET['id_pedido'])) {
  $id_pedido = $_GET['id_pedido'];
  $query = "DELETE FROM pedido WHERE id_pedido = $id_pedido";
  $resultado = mysqli_query($conexion, $query);
  if(!$resultado) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Se elimino correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: listar_pedido.php');
}

?>