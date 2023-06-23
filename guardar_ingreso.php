<?php

include('db.php');

if (isset($_POST['guardar_ingreso'])) {

  $nombre_empresa_trabaja = $_POST['nombre_empresa_trabaja'];
  $tipo_comprobante_ingreso = $_POST['tipo_comprobante_ingreso'];
  $salario_bruto_mensual = $_POST['salario_bruto_mensual'];
  $salario_neto_mensual = $_POST['salario_neto_mensual'];
  $fecha_inicio_trabajo = $_POST['fecha_inicio_trabajo'];
  $id_usuario = $_POST['id_del_solicitante'];
  
}



    $query = "INSERT INTO ingreso(nombre_empresa_trabaja, tipo_comprobante_ingreso, salario_bruto_mensual, id_solicitante,salario_neto_mensual,fecha_inicio_trabajo) VALUES ('$nombre_empresa_trabaja', '$tipo_comprobante_ingreso', '$salario_bruto_mensual','$id_usuario ',$salario_neto_mensual,$fecha_inicio_trabajo)";
    $_SESSION['message'] = 'Se ha guardadao correctamente ';
    $_SESSION['message_type'] = 'success';
  

   


  $resultado = mysqli_query($conexion, $query);
  if(!$resultado) {
    die("Error al guardar". mysqli_error($conexion));
  }


  header('Location: listar_ingreso.php');

 








?>