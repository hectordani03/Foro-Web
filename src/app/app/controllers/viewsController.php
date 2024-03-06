<?php

namespace app\controllers;

use app\models\viewsModel;

class viewsController extends viewsModel {

    // if empty, redirect login; else get name from url and process with getModelViews
    public function getViewsController($view) {
        if ($view != "") {
            $answer = $this->getModelViews($view);
        } else {
            $answer = "login";
        }
        return $answer;
    }

    // if empty SESSION, redirect login
    public function logoutController() {
        
        session_start();

        // Obtener los parámetros de la cookie de sesión
        $params = session_get_cookie_params();
        
        // Borrar la cookie de sesión configurándola para que expire en el pasado
        setcookie(session_name(), '', time() - 1, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        
        // Destruir la sesión
        session_destroy();

        // header("Location: http://localhost/For-Us/src/forum/login.php");
        
    }
}