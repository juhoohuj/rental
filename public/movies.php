<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."movie.php";

$id = filter_input(INPUT_GET, "id");
//if id exists delete
if(isset($id)){
    try{
        deleteMovie($id);
        echo '<div class="alert alert-success" role="alert">Movie deleted!!</div>';
    }catch(Exception $e){
        echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
    }
    
}

// Get all movies from database
$movie = getMovies();
// Print movies in a list
echo "<ul>";
foreach($movie as $m){
    echo "<li>".$m["Name"]." ".$m["Length"]." ".$m["Language"]." ".$m["Genre"]. '<a href="movies.php?id=' . $m["MovieID"] . '" class="btn btn-primary">Delete</a> </li>';
}
echo "</ul>";

include TEMPLATES_DIR.'foot.php';