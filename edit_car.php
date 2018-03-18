<?php
//get the car data 
$car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);
$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);
$registration = filter_input(INPUT_POST, 'registration');
$name = filter_input(INPUT_POST, 'name');
$make = filter_input(INPUT_POST, 'make');
$model = filter_input(INPUT_POST, 'model');
$year = filter_input(INPUT_POST, 'year');
$engine = filter_input(INPUT_POST, 'engine', FILTER_VALIDATE_FLOAT);
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

//Validate inputs
if ($car_id == NULL || $car_id == FALSE ||
         $salesman_id == NULL || $salesman_id == FALSE ||
         empty($registration) || empty($name) ||
         empty($make) || empty($model) ||
         empty($year) || 
        $engine == null || $engine == FALSE ||        
        $price == NULL || $price == FALSE){
    $error = "Invalid car data. Check all fields and try again.";
    include("error.php");
}else{
    //if valid, update the car in the database
    require_once ("database.php");
    try{
        $query = 'UPDATE cars 
				SET salesmanID = :np_salesman_id, 
					carReg = :np_carReg, 
					carName = :np_carName, 
					make = :np_make, 
					model = :np_model,
					year = :np_year,					
					engine = :np_engine, 
					price = :np_price 
				WHERE carID = :np_car_id';

$statement = $db -> prepare($query); //sanitise my input
$statement -> bindValue(':np_salesman_id', $salesman_id);
$statement -> bindValue(':np_carReg', $registration);
$statement -> bindValue(':np_carName', $name);
$statement -> bindValue(':np_make', $make);
$statement -> bindValue(':np_model', $model);
$statement -> bindValue(':np_year', $year);
$statement -> bindValue(':np_engine', $engine);
$statement -> bindValue(':np_price', $price);
$statement -> bindValue(':np_car_id', $car_id);
$statement -> execute();
$statement -> closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}

//pass control to index.php
//Display the Cars list page
include ("index.php");
    
}
    



?>



