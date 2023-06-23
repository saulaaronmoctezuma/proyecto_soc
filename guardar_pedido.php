<?php

include('db.php');

if (isset($_POST['guardar_pedido'])) {

  $destino = $_POST['destino'];
  $monto_solicitado = $_POST['monto_solicitado'];
  $plazo = $_POST['plazo'];
  $id_usuario = $_POST['id_del_solicitante'];
  
}

  $queryFolio = "SELECT MAX(folio) AS max_folio FROM pedido";
  $resultado_solicitante = mysqli_query($conexion, $queryFolio);
  $row = mysqli_fetch_assoc($resultado_solicitante)  ;
  $max_folio = $row['max_folio'];
  $folio = $max_folio + 1;


  $consultarFolioRegistrado = "SELECT folio FROM pedido WHERE id_solicitante ='".$id_usuario."' and destino = '".$destino."'";
  $resultado_folio_registrado= mysqli_query($conexion, $consultarFolioRegistrado);
  $row = mysqli_fetch_assoc($resultado_folio_registrado);
  $folio_registrado = $row['folio'];


  $consultarDestino = "SELECT COUNT(*) as total FROM pedido WHERE id_solicitante ='".$id_usuario."' and destino = '".$destino."'";
  $resultado_destino = mysqli_query($conexion, $consultarDestino);
  $row = mysqli_fetch_assoc($resultado_destino);

  



  if ($row['total'] > 0) {

    $_SESSION['message'] = 'Ya existe ese registro con el folio numero=  ' . $folio_registrado ;
    $_SESSION['message_type'] = 'success';

}else{

  if( $consultarFolio = "" or $consultarFolio=null){
    $query = "INSERT INTO pedido(destino, monto_solicitado, plazo, id_solicitante,folio) VALUES ('$destino', '$monto_solicitado', '$plazo','$id_usuario ',1)";
    $_SESSION['message'] = 'Felicitaciones se ha generado correctamente con el Folio =  ' . $folio ;
    $_SESSION['message_type'] = 'success';
  }else{
    $query = "INSERT INTO pedido(destino, monto_solicitado, plazo, id_solicitante,folio) VALUES ('$destino', '$monto_solicitado', '$plazo','$id_usuario ',$folio)";
    $_SESSION['message'] = 'Felicitaciones se ha generado correctamente con el Folio =  ' . $folio ;
    $_SESSION['message_type'] = 'success';
  }

   


  $resultado = mysqli_query($conexion, $query);
  if(!$resultado) {
    die("Error al guardar". mysqli_error($conexion));
  }
}

  header('Location: listar_pedido.php');

 

?>