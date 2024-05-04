<?php
const APP_NAME = "For-Us";
const APP_SESSION_NAME = "ForUs";

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);

define('IS_LOCAL', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']) ? true : false);
define('URL', IS_LOCAL ? 'http://forus.com/' : 'REMOTE URL');
define('URL_AD', 'http://forus.com/admin/');

define('DB_HOST', IS_LOCAL ? 'localhost' : 'REMOTE HOST');
define('DB_USER', IS_LOCAL ? 'root' : 'REMOTE USER');
define('DB_PASS', IS_LOCAL ? '' : 'REMOTE PASSWORD');
define('DB_NAME', IS_LOCAL ? 'forus' : 'REMOTE DBNAME');

define('CLASSES', ROOT . 'app/classes' . DS);
define('CLASSES_PATH', ROOT . 'app/..' . DS);

define('VIEWS', ROOT . 'app/views/' . DS);
define('USER_VIEWS', VIEWS . 'user' . DS);
define('ADMIN_VIEWS', VIEWS . 'admin' . DS);

define('CSS', URL . 'css' . DS);
define('JS', URL . 'js' . DS);

define('RESOURCES', URL . 'resources' . '/');
define('REQUEST', RESOURCES . 'requestControllers' . DS);
define('ASSETS', RESOURCES . 'assets' . '/');
define('VIDEO', ASSETS . 'video' . '/');
define('IMG', ASSETS . 'img' . '/');
define('GIFT', IMG . 'gift' . '/');
define('LOGO', IMG . 'logo' . '/');
define('LOGIN_IMG', IMG . 'login' . '/');
define('POSTS_IMG', IMG . 'post' . '/');
define('PROF_IMG', IMG . 'profile' . '/');


define('FUNCTIONS', __DIR__ . '/functions' . DS);
define('TEMPLATES', VIEWS . 'templates' . DS);
define('LAYOUTS', TEMPLATES . 'layouts' . DS);
define('LAYOUTS_US', LAYOUTS . 'user' . DS);
define('LAYOUTS_AD', LAYOUTS . 'admin' . DS);
