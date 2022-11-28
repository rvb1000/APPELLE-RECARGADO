<?php include ('config.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <!-- FAVICON -->

    <link rel="icon" type="image/png" href="./img/Logo Appelle.svg" sizes="96x96">

    <!-- FONT -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet">
    
     <!-- TITULO -->

    <title><?php echo $Sitename; ?> | REGISTRO </title>
    
    
    <!-- BOOTSTRAP -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS INDEX -->

    <link rel="stylesheet" href="./css/stylesindex.css">

	<!-- CSS REGISTRO -->

	<link rel="stylesheet" href="./css/stylesregistro.css">

  
</head>

<body>

    <!-- NAV -->
    
    <?php include('header.php'); ?>


	<main>
    <?php

    session_start(); //INICIE UNAS SESION
        // comprobamos que los campos admins_nombre y admin_clave no estén vacíos
        if(isset($_SESSION['usuario_id'])){
            echo '<script language="javascript">window.location="usuario.php"</script>';
        } else if(empty($_POST['usuario']) || empty($_POST['clave'])) { // SI TRAE SIN NADA USER O PASS AVISA
            echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
        }else {
            // "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario = $_POST['usuario'];
            $usuario_clave = $_POST['clave'];

            $clave = md5($usuario_clave); //PASA A MD5
            // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
            $Usuarios = mysqli_query($con,"SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave'");
            if($usuario = mysqli_fetch_array($Usuarios)) {

                $_SESSION['usuario_id'] = $usuario['usuario_id']; // creamos la sesion "admin_id" y le asignamos como valor el campo admin_id
                $_SESSION['usuario'] = $usuario['usuario']; 
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['mail'] = $usuario['mail']; 
                $_SESSION['telefono'] = $usuario['telefono']; 
				// ENVIAMOS AL HOME!
			  echo '<script language="javascript">window.location="usuario.php"</script>';
			  header("Location: usuario.php");
			  ?>

			  <?php
            } else {
                echo 'Error, <a href="usuario.php">Reintentar</a>'  . mysqli_connect_error();
            }
        }
?>
	</main>




	<script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>



	
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- JS Propio -->
    <script src="./js/script.js"></script>
</body>
</html>