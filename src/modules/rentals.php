<?php

// A function to fetch data from SQL tables and connect them with inner join method.
function getRents(){
    require_once MODULES_DIR.'db.php';

    try{
        $pdo = openDB();
        $sql = "SELECT CUSTOMER.CustomerID, FirstName, SurName, MOVIE.MovieID, MovieName, RentID, startDate, endDate
        FROM CUSTOMER, MOVIE, RENT
        WHERE CUSTOMER.CustomerID = RENT.CustomerID && MOVIE.MovieID = RENT.MovieID";
        $rental = $pdo->query($sql);

        return $rental->fetchAll();
    }catch(PDOException $error){
        throw $error;
    }
}
