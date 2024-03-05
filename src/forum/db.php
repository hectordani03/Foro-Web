<?php
session_start();
    $bdhost = "localhost";
    $bduser = "root";
    $bdpass = "";
    $bdname = "forus";

    $conn=mysqli_connect($bdhost,$bduser, $bdpass, $bdname);

    $db_name = 'mysql:host=localhost;dbname=forus';
    $db_user_name = 'root';
    $db_user_pass = '';
    $conne = new PDO($db_name, $db_user_name, $db_user_pass);

?>