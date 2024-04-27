<?php

namespace app\classes;

class View
{
    public static function render($view, $data = [])
    {
        $d = as_object($data);
        require_once VIEWS . $view . '.view.php';
        exit();
    }
}
