<?php
define('HOST', 'localhost');
define('DB_USER', 'root');
define('PASS', '');
define('DATABASE', 'carwash');


function connecta()
{

    $mysqli = new mysqli(HOST, DB_USER, PASS, DATABASE);
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
        echo ("The Connection Fail:" . $mysqli->connect_errno);
        return false;
    } else {
        //echo "Conectou";
        return $mysqli;
    }
}

function extExt($name)
{
    $resultado = substr($name, strripos($name, '.'));

    return ($resultado);
}
