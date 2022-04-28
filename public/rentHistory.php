<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."rentals.php";


$rental = getRents();

foreach($rental as $r){
    echo "<li>".$r["startDate"]." - ".$r["endDate"]."  ".$r["CustomerID"]."  ".$r["MovieID"]."<br>";
}

include TEMPLATES_DIR.'foot.php';