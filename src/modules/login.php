<?php   
    session_start();
    require('db.php');


   






$FirstName = filter_input(INPUT_POST, "FirstName");
$SurName = filter_input(INPUT_POST, "SurName");

//Tarkistetaan onko muttujia asetettu
if( !isset($FirstName) || !isset($SurName) ){
    echo "Jotain puuttuu";
    exit;
}

//Tarkistetaan, ettei tyhjiä arvoja muuttujissa
if( empty($FirstName) || empty($SurName) ){
    echo "Et voi asettaa tyhjiä arvoja!!";
    exit;
}

try{
    //Suoritetaan parametrien lisääminen tietokantaan.

    $sql = "SELECT * FROM CUSTOMER WHERE FirstName=?";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(1, $FirstName);
    $statement->execute();

   if($statement->rowCount() <=0){
       echo "Käyttäjää ei löytynyt";
        exit;
    }

   $row = $statement->fetch();

   $_SESSION["FirstName"] = $FirstName;
   $_SESSION["SurName"] = $row["SurName"];


}catch(PDOException $e){
    echo "Jokin meni pieleen :)<br>";
    echo $e->getMessage();
}
