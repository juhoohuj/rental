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