<?php

/**
 * Creates a dropdown from database names
 * and sets the selected person by parameter id.
 */
function movieDropdown($selectedId = -1){
    // Get DB connection
    require 'db.php';
    // Create SQL query to get all rows from a table
    $sql = "SELECT MovieID, Name FROM movie";
    // Execute the query
    $movies = $pdo->query($sql);

    // Check if any was returned and create 
    if ( $movies->rowCount() > 0 ){
        echo '<label for="movie">Valitse elokuva:</label>
        <select name="movie" id="movie">';

        // Loop till there are no more rows
        foreach($movies as $row){
            echo '<option value="'
                . $row["MovieID"] .'"'
                .($row["MovieID"] == $selectedId ? ' selected' : ''). '>' 
                . $row["firstname"]
                .'</option>';
        }
        echo "</select><br/>";
    }
}


?>