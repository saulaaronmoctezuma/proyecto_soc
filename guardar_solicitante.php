<?php

include('db.php');

if (isset($_POST['guardar_solicitante'])) {

  $fechaActual = date('Y-m-d');
 

  $nombre = $_POST['nombre'];
  $apellido_paterno = $_POST['apellido_paterno'];
  $apellido_materno = $_POST['apellido_materno'];
  
  $fecha_nacimiento = $_POST['fecha_nacimiento']; 
   $edad = date_diff(date_create($fecha_nacimiento), date_create($fechaActual))->y;
  
  $sexo = $_POST['sexo'];
  $curp = $_POST['curp'];
  $correo = $_POST['correo'];
  $calle = $_POST['calle'];
  $colonia = $_POST['colonia'];
  $municipio = $_POST['municipio'];
  $estado = $_POST['estado'];
  $cp = $_POST['cp'];

  $validadSiExiste = "SELECT * FROM solicitante WHERE curp = '$curp' OR correo = '$correo'";
  $resultadoExiste = mysqli_query($conexion, $validadSiExiste);

  if (mysqli_num_rows($resultadoExiste) > 0) {
   
    $_SESSION['message'] = 'Ya esta registrada su curp o correo';
    $_SESSION['message_type_e'] = 'danger';
    header('Location: listar_solitante.php');
}

else {

  $query = "INSERT INTO solicitante(nombre, apellido_paterno, apellido_materno, edad,fecha_nacimiento,sexo, curp, correo, calle, colonia,municipio, estado, cp) VALUES ('$nombre', '$apellido_paterno', '$apellido_materno', '$edad', '$fecha_nacimiento', '$sexo','$curp', '$correo','$calle','$colonia', '$municipio', '$estado','$cp')";


  $resultado = mysqli_query($conexion, $query);
  $resultadoExiste = "";
    
}

  if(!$resultado or $resultadoExiste) {
    die("Error al guardar");
  }

  $_SESSION['message'] = 'Se guardo correctamente';
  $_SESSION['message_type'] = 'success';


  

 

}

?>