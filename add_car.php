<?php

// Get the car data
//get the values from the form
$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);

$TargetPath = filter_input(INPUT_POST, 'image');
$registration = filter_input(INPUT_POST, 'registration');
$name = filter_input(INPUT_POST, 'name');
$make = filter_input(INPUT_POST, 'make');
$model = filter_input(INPUT_POST, 'model');
$year = filter_input(INPUT_POST, 'year');
$engine = filter_input(INPUT_POST, 'engine', FILTER_VALIDATE_FLOAT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($salesman_id == NULL || $salesman_id == FALSE ||
        $registration == null || $name == null ||
        $make == null || $model == null ||
        $year == null ||
        $engine == null || $engine == FALSE ||
        $price == NULL || $price == FALSE) {
    $error = "Invalid car data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');


    $UploadedFileName = $_FILES['UploadImage']['name'];     
    try {
        $query = "INSERT INTO cars
                 (salesmanID, image, carReg, carName, make, model, year, engine, price)
              VALUES
                 (:salesman_id, :image, :registration, :name, :make, :model, :year, :engine, :price)";
            $statement = $db->prepare($query);
            $statement->bindValue(':salesman_id', $salesman_id);
            $statement->bindValue(':image', $UploadedFileName);
            $statement->bindValue(':registration', $registration);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':make', $make);
            $statement->bindValue(':model', $model);
            $statement->bindValue(':year', $year);
            $statement->bindValue(':engine', $engine);
            $statement->bindValue(':price', $price);
            $statement->execute();
            $statement->closeCursor();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }

    // Display the Cars List page
    include('index.php');
}
?>