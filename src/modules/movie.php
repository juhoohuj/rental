<?php

function getPeople(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = getPdoConnection();
        // Create SQL query to get all rows from a table
        $sql = "SELECT * FROM person";
        // Execute the query
        $people = $pdo->query($sql);

        return $people->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}

function addPerson($name, $length, $language, $genre){
    require_once MODULES_DIR.'db.php'; // DB connection
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($name) || !isset($length) || !isset($language) || !isset($genre) ){
        throw new Exception("Parametreja puuttuu");
    }
    
    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($name) || empty($length) || empty($language) || empty($genre) ){
        throw new Exception("Cannot set empty values!");
    }
    
    try{
        $pdo = getPdoConnection();
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO movie (name, Length, Language, Genre) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $length);
        $statement->bindParam(3, $language);
        $statement->bindParam(4, $genre);
    
        $statement->execute();
    
        echo "Elokuva: ".$name." lisätty tietokantaan"; 
    }catch(PDOException $e){
        throw $e;
    }
}

function deletePerson($id){
    require_once MODULES_DIR.'db.php'; // DB connection
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($id) ){
        throw new Exception("Missing parameters! Cannot delete person!");
    }
    
    try{
        $pdo = getPdoConnection();
        // Start transaction
        $pdo->beginTransaction();
        // Delete from worktime table
        $sql = "DELETE FROM worktime WHERE person_id = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Delete from person table
        $sql = "DELETE FROM person WHERE ID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        // Commit transaction
        $pdo->commit();
    }catch(PDOException $e){
        // Rollback transaction on error
        $pdo->rollBack();
        throw $e;
    }
}