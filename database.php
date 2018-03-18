<?php

$dsn = "mysql:host=localhost;dbname=sitsha_polite_car_sales";
$username = "root";
$password = "";

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>