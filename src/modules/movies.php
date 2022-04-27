<?php 

function getMovies(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        // Create SQL query to get all rows from a table
        $sql = "SELECT Name, Length, Language, Genre, MovieID
        FROM movie
        ORDER BY name;";
        // Execute the query
        $movies = $pdo->query($sql);

        return $movies->fetchAll();
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
        // Delete from worktime table
        $sql = "DELETE FROM movie WHERE MovieID = ?";
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

?>