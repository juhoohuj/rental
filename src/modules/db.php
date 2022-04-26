<?php

function getPdoConnection() {
	$db = new PDO('mysql:host=localhost;dbname=rental;charset=utf8','root','');
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	return $db;
}

function returnError(PDOException $pdoex) {
	header('HTTP/1.1 500 Internal Server Error');
	$error = array('error' => $pdoex->getMessage());
	print json_encode($error);
}


