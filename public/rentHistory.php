<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."rentals.php";


$rental = getRents();

foreach($rental as $r){
    echo "<li>".$r["startDate"]." - ".$r["endDate"]."  ".$r["FirstName"]."  ".$r["SurName"]."  ".$r["MovieName"];
}

include TEMPLATES_DIR.'foot.php';