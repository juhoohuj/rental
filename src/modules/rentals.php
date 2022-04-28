<?php

function getRents(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        $sql = "SELECT *
        FROM rent";
        $rental = $pdo->query($sql);

        return $rental->fetchAll();
    }catch(PDOException $error){
        throw $error;
    }
}

function getMovieName(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        $sql = "SELECT Name
        FROM movie";
        $rental = $pdo->query($sql);

        return $rental->fetchAll();
    }catch(PDOException $error){
        throw $error;
    }
}

function getCustomerName(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        $sql = "SELECT FirstName, SurName
        FROM customer";
        $rental = $pdo->query($sql);

        return $rental->fetchAll();
    }catch(PDOException $error){
        throw $error;
    }
}
