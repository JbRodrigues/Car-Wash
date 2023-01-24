<?php
define('HOST', 'localhost');
define('DB_USER', 'root');
define('PASS', '');
define('DATABASE', 'carwash');


function connect()
{

    $mysqli = new mysqli(HOST, DB_USER, PASS);
    mysqli_select_db($mysqli, DATABASE);
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
        echo ("Falha na conexão:" . $mysqli->connect_errno);
        return false;
    } else {
        //echo "Conectou";
        return $mysqli;
    }
}
