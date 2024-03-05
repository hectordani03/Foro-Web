<?php
	
	require_once "../../config/app.php";
	require_once "../layouts/inc/session_start.php";
	require_once "../../autoload.php";
	
use app\controllers\userController;

	if(isset($_POST['modulo_usuario'])){

		$insUsuario = new userController();

		if($_POST['modulo_usuario'] == "registrar"){
			echo $insUsuario->register_user();
		}

		// if($_POST['modulo_usuario']=="eliminar"){
		// 	echo $insUsuario->eliminarUsuarioControlador();
		// }

		// if($_POST['modulo_usuario']=="actualizar"){
		// 	echo $insUsuario->actualizarUsuarioControlador();
		// }

		// if($_POST['modulo_usuario']=="eliminarFoto"){
		// 	echo $insUsuario->eliminarFotoUsuarioControlador();
		// }

		// if($_POST['modulo_usuario']=="actualizarFoto"){
		// 	echo $insUsuario->actualizarFotoUsuarioControlador();
		// }

		//Se accede a este archivo
	} else {
		session_destroy();
		header("Location: ".APP_URL."login/");
	}