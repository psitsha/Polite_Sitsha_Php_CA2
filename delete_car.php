<?php

require_once('database.php');

// Get IDs
$car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);
$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);

// Delete the car from the database
if ($car_id != false && $salesman_id != false) {

    try {
        $query = "DELETE FROM cars
              WHERE carID = :car_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':car_id', $car_id);
        $statement->execute();
        $statement->closeCursor();
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
}

// display the cars List page
include('cars_list.php');
?>