<?php
// Get ID
$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);

// Validate inputs
if ($salesman_id == null || $salesman_id == false) {
    $error = "Invalid salesman ID.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the car to the database  
    try{
        $query = 'DELETE FROM salesmen 
              WHERE salesmanID = :salesman_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':salesman_id', $salesman_id);
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
