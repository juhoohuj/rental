<?php
include TEMPLATES_DIR."head.php";
include MODULES_DIR."rentals.php";


$rental = getRents();
$movieName = getMovieName();
$customerName = getCustomerName();

foreach($rental as $r){
    echo "<li>".$r["startDate"]." - ".$r["endDate"];
}

foreach($movieName as $mn){
    echo $mn["Name"];
}

foreach($customerName as $cn){
    echo $cn["FirstName"]." ".$cn["SurName"];
}

include TEMPLATES_DIR.'foot.php';