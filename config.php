<?php
$localhost= $_SERVER["HTTP_HOST"];

if ($localhost == 'localhost'){

    $host_db = "localhost"; // Host de la BD
    $usuario_db = "root"; // Usuario de la BD
    $clave_db = ""; // Contraseña de la BD
    $nombre_db = "appelle"; // Nombre de la BD
    //conectamos y seleccionamos db

	$email = 'info@reggio.com.ar';

	$Sitename = 'asdasd';
	$ruta = 'http://localhost/appelle';
  $telefonoWeb = '22123123';

} else {
	$host_db = "192.168.0.63"; // Host de la BD
    $usuario_db = "reggiouser"; // Usuario de la BD
    $clave_db = "wa5PFPAMysM8"; // Contraseña de la BD
    $nombre_db = "reggiodb"; // Nombre de la BD

	$email = 'info@pulsart.com.ar';

	$Sitename = 'APPELLE';
	$ruta = 'https://gruporeggio.com';
	$rutaarchivo = $_SERVER['DOCUMENT_ROOT'].'/archivos/';
}


	$con = mysqli_connect($host_db,$usuario_db,$clave_db,$nombre_db);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
