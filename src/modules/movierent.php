<?php

function movieDropdown($selectedMovie = -1){
    require_once MODULES_DIR.'db.php';

    $pdo = openDB();
    $sql = "SELECT MovieID, MovieName FROM movie";
    // Execute the query
    $movies = $pdo->query($sql);   

    // Check if any was returned and create 
    if ( $movies->rowCount() > 0 ){

        echo '<label for="movie">Valitse elokuva:</label>
        <select name="MovieID" id="MovieID">';

        // Loop till there are no more rows
        foreach($movies as $row){
            echo'<option value="'. $row["MovieID"] .'"'.($row["MovieID"] == $selectedMovie ? ' selected' : ''). '>' . $row["MovieName"].'</option>';
        }
        echo'</select><br/>';
    }

    else {
        echo "Elokuvia ei löytynyt tietokannasta. Lisää elokuvia tietokantaan";
    }
}

function addMovieRent($CustomerID, $MovieID, $startTime, $endTime) {
    require_once MODULES_DIR.'db.php';

    $CustomerID = $_SESSION["CustomerID"];
    
    if( empty($MovieID) || empty($startTime) || empty($endTime) ){
        throw new Exception("Cannot set empty values!");
    }

    try{
        $pdo = openDB();
        $sql = "INSERT INTO rent (CustomerID, MovieID, startDate, endDate) VALUES (?, ?, ?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $CustomerID);
        $statement->bindParam(2, $MovieID);
        $statement->bindParam(3, $startTime);
        $statement->bindParam(4, $endTime);

        $statement->execute();

    }catch(PDOException $e){
        throw $e;
    }

}