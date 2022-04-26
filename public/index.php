<?php

    include TEMPLATES_DIR.'head.php' ;

    if(isset($_SESSION["FirstName"])) {
        echo "<h1>Tervetuloa ".$_SESSION["FirstName"]." ".$_SESSION["SurName"]."!</h1>";
    } else {
        echo "<h1>Kirjaudu asiakkaan nimellä</h1>" ;
    }

    include TEMPLATES_DIR.'foot.php';
