<?php

include TEMPLATES_DIR.'head.php';
include MODULES_DIR. 'movie_dropdown.php';




if(!isset($_SESSION["FirstName"]) || !isset($_SESSION["SurName"])) {
    echo "Vuokraus vaatii kirjautumisen";
} else {


echo "Vuokraajan nimi: ", $_SESSION["FirstName"], " ", $_SESSION["SurName"];




    echo '<form action="movieRental.php" method="post">';
    movieDropdown();

    echo'<label for="startTime">Start time:</label><br>
        <input type="datetime-local" name="startTime" id="startTime"><br>
        <label for="endTime">End time:</label><br>
        <input type="datetime-local" name="endTime" id="endTime"><br>
        <input type="submit" class="btn btn-primary" value="Lisää vuokraus">
    </form>';
}

  include TEMPLATES_DIR.'foot.php'; ?>