<?php
    include('config.php'); // incluímos los datos de acceso a la BD
    session_start();
    // comprobamos que se haya iniciado la sesión
    if(isset($_SESSION['usuario_nombre'])) {
        session_destroy();
        header("Location: login.php");
    }else {
        echo "Operación incorrecta.";
		header("Location: login.php");
    }
?>