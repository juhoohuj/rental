<?php

include MODULES_DIR.'db.php';
include TEMPLATES_DIR.'head.php';
include MODULES_DIR. 'movierent.php';


if(!isset($_SESSION["FirstName"]) || !isset($_SESSION["SurName"])) {
    echo "Vuokraus vaatii kirjautumisen";
    return;
} else {

    $FirstName = $_SESSION["SurName"];
    $SurName = $_SESSION["FirstName"];
    $CustomerID = $_SESSION["CustomerID"];

    $MovieID = filter_input(INPUT_POST, "MovieID");
    $startTime = filter_input(INPUT_POST, "startTime");
    $endTime = filter_input(INPUT_POST, "endTime");

    try{
        addMovieRent($CustomerID, $MovieID, $startTime, $endTime);
        echo '<div class="alert alert-success" role="alert">Vuokraus lisätty tietokantaan</div>';
    }catch(Exception $e){
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }

    echo "Vuokraajan ID: ", $CustomerID;
    echo "</br>Vuokraajan nimi: ", $_SESSION["FirstName"], " ", $_SESSION["SurName"];

    echo '<form action="movieRental.php" method="post">';
    movieDropdown();
    echo '<label for="startTime">Start time:</label><br>
        <input type="datetime-local" name="startTime" id="startTime"><br>
        <label for="endTime">End time:</label><br>
        <input type="datetime-local" name="endTime" id="endTime"><br>
        <input type="submit" class="btn btn-primary" value="Lisää vuokraus">
    </form>';
}

  include TEMPLATES_DIR.'foot.php'; ?>