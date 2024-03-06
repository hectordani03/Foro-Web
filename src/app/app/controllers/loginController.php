<?php

namespace app\controllers;

use app\models\mainModel;

class loginController extends mainModel {
	
		public function logoutController() {

			session_start();

			// Obtener los parámetros de la cookie de sesión
			$params = session_get_cookie_params();
			
			// Borrar la cookie de sesión configurándola para que expire en el pasado
			setcookie(session_name(), '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
			
			// Destruir la sesión
			session_destroy();
			
		    if(headers_sent()) {
                echo "<script> window.location.href='http://localhost/For-Us/src/forum/login.php'; </script>";
            } else {
                header("Location: http://localhost/For-Us/src/forum/login.php");
            }
			
		}
	}