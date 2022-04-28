<?php
include TEMPLATES_DIR.'head.php';
include MODULES_DIR.'movie.php';

    //Filtteroidaan POST-inputit (ei käytetä string-filtteriä, koska deprekoitunut)
    //Jos parametria ei löydy, funktio palauttaa null
    $name = filter_input(INPUT_POST, "name");
    $length = filter_input(INPUT_POST, "length");
    $language = filter_input(INPUT_POST, "language");
    $genre = filter_input(INPUT_POST, "genre");

    if(isset($name)){
        try{
            addMovie($name, $length, $language, $genre);
            echo '<div class="alert alert-success" role="alert">Elokuva lisätty</div>';
        }catch(Exception $e){
            echo '<div class="alert alert-danger" role="alert">'.$e->getMessage().'</div>';
        }
        
    }

?>
    <form action="addMovie.php" method="post">
        <label for="name">Nimi:</label><br>
        <input type="text" name="name" id="name"><br>
        <label for="length">Pituus:</label><br>
        <input type="time" step="1" name="length" id="length"><br>
        <label for="language">Kieli:</label><br>
        <input type="text" name="language" id="language"><br>
        <label for="genre">Genre:</label><br>
        <input type="text" name="genre" id="genre"><br>
        <input type="submit" class="btn btn-primary" value="Lisää elokuva">
    </form>
    
<?php   include TEMPLATES_DIR.'foot.php'; ?>