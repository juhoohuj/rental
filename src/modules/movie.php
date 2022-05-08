<?php

function getMovies(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        // Create SQL query to get all rows from a table
        $sql = "SELECT *
        FROM MOVIE
        ORDER BY MovieName;";
        // Execute the query
        $movies = $pdo->query($sql);

        return $movies->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}

function addMovie($name, $length, $language, $genre){
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
        $pdo = openDB();
        //Tarkistetaan löytyykö elokuva jo tietokannasta.
        $sql = "select MovieName from movie where MovieName = ? LIMIT 1";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $name);
        $statement->execute();
        $row = $statement->fetch();

        if (!$row) {
        //Suoritetaan parametrien lisääminen tietokantaan.
        $sql = "INSERT INTO MOVIE (MovieName, Length, Language, Genre) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $name);
        $statement->bindParam(2, $length);
        $statement->bindParam(3, $language);
        $statement->bindParam(4, $genre);
    
        $statement->execute();
        } else {
            throw new Exception("$name löytyy jo tietokannasta!");
        }

    }catch(PDOException $e){
        throw $e;
    }
}
function deleteMovie($id){
    require_once MODULES_DIR.'db.php'; // DB connection
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($id) ){
        throw new Exception("Missing parameters! Cannot delete person!");
    }
    
    try{
        $pdo = openDB();
        // Start transaction
        $pdo->beginTransaction();
        // Delete from movie table
        $sql = "DELETE FROM MOVIE WHERE MovieID = ?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $id);        
        $statement->execute();
        $pdo->commit();
    }catch(PDOException $e){
        // Rollback transaction on error
        $pdo->rollBack();
        throw $e;
    }
}