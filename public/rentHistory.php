<?php
// Header & connection to "rentals.php", where the function needed is located.
include TEMPLATES_DIR."head.php";
include MODULES_DIR."rentals.php";

// Call for the function from "rentals.php" and display the data on the page in it's correct place.
$rental = getRents();

foreach($rental as $r){
    echo "<li>".$r["startDate"]." - ".$r["endDate"]."  ".$r["FirstName"]."  ".$r["SurName"]."  ".$r["MovieName"];
}

// Footer
include TEMPLATES_DIR.'foot.php';