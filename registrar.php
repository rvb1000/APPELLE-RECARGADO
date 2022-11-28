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

			// "limpiamos" los campos del formulario de posibles códigos maliciosos
            $usuario = $_POST['usuario'];
			$nombre = $_POST['nombre'];
			$password = $_POST['password'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];

            // comprobamos que el usuario ingresado no haya sido registrado antes
            $sql = mysqli_query($con,"SELECT * FROM usuarios WHERE mail='".$correo."'");
            if(mysqli_num_rows($sql) > 0) {
                echo "Ya se encuentra un usuario utilizando este mismo mail. Si no recuerda su contraseña puede tecuperarla aquí. O puede <a href='javascript:history.back();'>Reintentar</a>";
            } else {
                $clave = md5($password); // encriptamos la contraseña ingresada con md5

				// ingresamos los datos a la BD
                $reg = mysqli_query($con,
								"INSERT INTO usuarios (
								usuario,
								clave,
								nombre,
								mail,
								telefono
								) VALUES (
								'$usuario',
                                '$clave',
                                '$nombre',
                                '$correo',
                                '$telefono'
								)");


                                    echo '<p>Registro satifactorio</p>';
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