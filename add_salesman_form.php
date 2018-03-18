<?php
require('database.php');

try {
    $query = 'SELECT *
          FROM salesmen
          ORDER BY salesmanID';
    $statement = $db->prepare($query);
    $statement->execute();
    $salesmen = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>

<!DOCTYPE html>

<link rel="stylesheet" type="text/css" href="main.css">
<<?php require_once ("header.php"); ?>
<header><h1>Sales Manager</h1></header>

<main>
    <h1>Add Salesman</h1>

    <form action="add_salesman.php" method="post"
          id="add_car_form" enctype="multipart/form-data">

        <label>Image:</label>
        <input type='file' name='UploadImage'>
        <br>                

        <label>Name:</label>
        <input type="input" name="name" required pattern="[a-z A-Z ']+">
        <br>

        <label>Address:</label>
        <input type="input" name="address" required pattern="[a-z A-Z 0-9,.-]+">
        <br>

        <label>Email:</label>
        <input type="input" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        <br>

        <label>Phone:</label>
        <input type="input" name="phone" required pattern="[0-9 ()/-]+">
        <br>


        <label>PPSN:</label>
        <input type="input" name="ppsn" required pattern="[0-9]+[a-zA-Z]">
        <br>

        <label>&nbsp;</label>
        <input id="add_car_button" type="submit" value="Add Salesman">
        <br> 

    </form>

</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Polite Sitsha Car Showroom, Inc.</p>
</footer>
<?php require_once ("footer.php"); ?>