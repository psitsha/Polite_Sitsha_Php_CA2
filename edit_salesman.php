<?php

//get the salesman data
$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$commission = filter_input(INPUT_POST, 'commission', FILTER_VALIDATE_FLOAT);
$ppsn = filter_input(INPUT_POST, 'ppsn');

//Validate inputs
if ($salesman_id == NULL || $salesman_id == FALSE ||
        empty($name) || empty($address) || 
        empty($email) || empty($phone) ||
        $ppsn == NULL) {
    $error = "Invalid salesman data. Check all fields and try again.";
    include("error.php");
} else {
    //if valid, update the salesman in the database
    require_once ('database.php');
    
    try {$query = 'UPDATE salesmen 
				SET salesmanID = :np_salesman_id, 
					salesmanName = :np_name, 
					salesmanAddress = :np_address, 
					salesmanEmail = :np_email, 
					salesmanPhone = :np_phone,
					salesmanCommission = :np_commission,
					salesmanPPSN = :np_ppsn 
				WHERE salesmanID = :np_salesman_id';

    $statement = $db->prepare($query); //sanitise my input
    $statement->bindValue(':np_salesman_id', $salesman_id);
    $statement->bindValue(':np_name', $name);
    $statement->bindValue(':np_address', $address);
    $statement->bindValue(':np_email', $email);
    $statement->bindValue(':np_phone', $phone);
    $statement->bindValue(':np_commission', $commission);
    $statement->bindValue(':np_ppsn', $ppsn);
    $statement->execute();
    $statement->closeCursor();
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



