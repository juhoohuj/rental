<?php
//require 'config.php';


function openDB() {

    $init = parse_ini_file(BASE_DIR."conf.ini");
    $host = $init["host"];
    $db = $init["db"];
    $user = $init["username"];
    $password = $init["pw"];

    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $db = new PDO($dsn, $user, $password);
        //echo "Connected!";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    return $db;
}

function returnError(PDOException $pdoex) {
    header('HTTP/1.1 500 Internal Server Error');
    $error = array('error' => $pdoex->getMessage());
    print json_encode($error);
}
