<?php 

function getMovies(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        // Create SQL query to get all rows from a table
        $sql = "SELECT Name, Length, Language, Genre
        FROM movie
        ORDER BY name;";
        // Execute the query
        $movies = $pdo->query($sql);

        return $movies->fetchAll();
    }catch(PDOException $e){
        throw $e;
    }
}

?>