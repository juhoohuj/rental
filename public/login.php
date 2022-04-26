<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'authorization.php';

$FirstName = filter_input(INPUT_POST, "FirstName");
$SurName = filter_input(INPUT_POST,"SurName");

if(!isset($_SESSION["FirstName"]) && isset($FirstName)) {

    try {
        login($FirstName, $SurName);
        exit;
    } catch (Exception $e) {
        echo '<div class="alert alert-warning" role="alert">'.$e->getMessage().'</div>';

    }

}

if(!isset($_SESSION["FirstName"])){



?>


    <form action="login.php" method="post">
        <label for="FirstName">First Name:</label><br>
        <input type="text" name="FirstName" id="FirstName"><br>
        <label for="SurName">Surname:</label><br>
        <input type="text" name="SurName" id="SurName"><br>
        <input type="submit" class="btn btn-primary" value="Log In">
    </form>

    <?php  }
include TEMPLATES_DIR.'foot.php';