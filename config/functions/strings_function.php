<?php

function sanitizeString($string)
{
    $string = filter_var($string, FILTER_SANITIZE_SPECIAL_CHARS);
    $blacklist = ["<script>", "</script>", "<script src", "<script type=", "SELECT * FROM", "SELECT ", " SELECT ", "DELETE FROM", "INSERT INTO", "DROP TABLE", "DROP DATABASE", "TRUNCATE TABLE", "SHOW TABLES", "SHOW DATABASES", "<?php", "?>", "--", "^", "<", ">", "==", "=", ";", "::"];
    $string = trim($string);
    $string = stripslashes($string);

    foreach ($blacklist as $str) {
        $string = str_ireplace($str, "", $string);
    }

    $string = trim($string);
    $string = stripslashes($string);
    return $string;
}

function filterString($filter, $string)
{
    
    if (preg_match("/^" . $filter . "$/", $string)) {
        return false;
    } else {

        return true;
    }
}

function validateEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}