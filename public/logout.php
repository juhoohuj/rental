<?php
    include TEMPLATES_DIR.'head.php';
    include MODULES_DIR.'authorization.php';

    if(isset($_SESSION["FirstName"])){
        logout();
        header("Location: logout.php");
    } else {
        echo '<div class="alert alert-success" role="alert">Lopetetaan sessio</div>';
    }

    include TEMPLATES_DIR.'foot.php';
?>