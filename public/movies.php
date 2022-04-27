<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."movies.php";

// Get all people from database
$movie = getMovies();
// Print person list
echo "<ul>";
foreach($movie as $m){
    echo "<li>".$m["Name"]." ".$m["Length"]." ".$m["Language"]." ".$m["Genre"]. '<a href="movies.php?id=' . $m["MovieID"] . '" class="btn btn-primary">Delete</a> </li>';
}
echo "</ul>";

include TEMPLATES_DIR.'foot.php';