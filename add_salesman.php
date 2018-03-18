<?php
// Get the salesman data
$TargetPath = filter_input(INPUT_POST, 'image');
$name = filter_input(INPUT_POST, 'name');
$address = filter_input(INPUT_POST, 'address');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
//$commission = filter_input(INPUT_POST, 'commission', FILTER_VALIDATE_FLOAT);
$ppsn = filter_input(INPUT_POST, 'ppsn');


// Validate inputs
if ($name == null || $address == null ||
        $address == null || $email == null||
        $phone == null ||  
//        $commission == null || $commission == FALSE ||
        $ppsn == null ) {
    $error = "Invalid salesman data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');
    
    $UploadedFileName = $_FILES['UploadImage']['name']; 

    // Add the car to the database
    try {
        $query = "INSERT INTO salesmen (image, salesmanName, salesmanAddress, salesmanEmail, salesmanPhone, salesmanPPSN)
              VALUES (:image, :name, :address, :email, :phone, :ppsn)";
    $statement = $db->prepare($query);
    $statement->bindValue(':image', $UploadedFileName);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
//    $statement->bindValue(':commission', $commission);
    $statement->bindValue(':ppsn', $ppsn);    
    $statement->execute();
    $statement->closeCursor();
    } catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}

    // Display the Salesman List page
    include('salesman_list.php');
}
?>