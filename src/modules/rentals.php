<?php

function getRents(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        $sql = "SELECT customer.CustomerID, FirstName, SurName, movie.MovieID, MovieName, RentID, startDate, endDate
        FROM customer, movie, rent
        WHERE customer.CustomerID = rent.CustomerID && movie.MovieID = rent.MovieID";
        $rental = $pdo->query($sql);

        return $rental->fetchAll();
    }catch(PDOException $error){
        throw $error;
    }
}
