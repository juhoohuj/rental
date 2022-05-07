<?php
 function addPerson($FirstName, $SurName){
    require_once MODULES_DIR.'db.php'; // DB connection
   
    
    //Tarkistetaan onko muttujia asetettu
    if( !isset($FirstName) || !isset($SurName) ){
        throw new Exception("Missing parameters! Cannot ADD person");
        
    }
    
    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if( empty($FirstName) || empty($SurName) ){
        throw new Exception("Missing parameters! Cannot set empty values");
    }
    
    
    try{
        $pdo = openDB();
        //Suoritetaan parametrien lisääminen tietokantaan.
    
        $sql = "INSERT INTO CUSTOMER (FirstName, SurName) VALUES (?, ?)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $FirstName);
        $statement->bindParam(2, $SurName);
        $statement->execute();
    
        echo "Tervetuloa ".$FirstName." ".$SurName.". Sinut on lisätty tietokantaan"; 
    }catch(PDOException $e){
        throw $e;
    }
      
}


function login($FirstName, $SurName)
{
    require_once MODULES_DIR.'db.php';

  /*   $uname = filter_input(INPUT_POST, "uname");
    $password = filter_input(INPUT_POST, "password"); */

    //Tarkistetaan onko muttujia asetettu
    if (!isset($FirstName) || !isset($SurName)) {
        throw new Exception("Missing parameters.cannotlogin");
    }

    //Tarkistetaan, ettei tyhjiä arvoja muuttujissa
    if (empty($FirstName) || empty($SurName)) {
        throw new Exception("cacknot login with empty valuess");

    }

    try {

        $pdo = openDB();
        //Suoritetaan parametrien lisääminen tietokantaan.

        $sql = "SELECT * FROM CUSTOMER WHERE FirstName=? AND SurName=?";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(1, $FirstName);
        $statement->bindParam(2, $SurName);
        $statement->execute();

        if ($statement->rowCount() <= 0) {
            addPerson($FirstName, $SurName);
            throw new Exception("Asiakasta ei löytynyt, lisätään asiakas!");
            
        }

        $row = $statement->fetch();

        $_SESSION["FirstName"] = $row["FirstName"];
        $_SESSION["SurName"] = $row["SurName"];
        $_SESSION["CustomerID"] = $row["CustomerID"];

        header("Location: ../../../rental/public/");



    } catch (PDOException $e) {
        throw $e;
    }
}


function logout()
{
    session_unset();
session_destroy();
}
