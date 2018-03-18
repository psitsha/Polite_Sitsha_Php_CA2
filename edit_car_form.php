<?php
require('database.php');

$car_id = filter_input(INPUT_POST, 'car_id', FILTER_VALIDATE_INT);

try {
    $query = 'SELECT *
          FROM cars
          WHERE carID = :car_id';
$statement = $db->prepare($query);
$statement->bindValue(':car_id', $car_id);
$statement->execute();
$car = $statement->fetch();
$statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
<!DOCTYPE html>
<?php require_once ("header.php"); ?>
        <title>Update Car</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    
        <header><h1>Sales Manager</h1></header>

        <main>
            <h1>Edit Car</h1>
            <form action="edit_car.php" method="post"
                  id="add_car_form">
                <input type="hidden" name="car_id"
                       value="<?php echo $car['carID']; ?>">

                <!--<label>Salesman ID:</label>-->
                <input type="hidden" name="salesman_id"
                       value="<?php echo $car['salesmanID']; ?>">
                <br>

                <label>Registration:</label>
                <input type="input" name="registration"
                       value="<?php echo $car['carReg']; ?>" required pattern="[a-zA-Z0-9]+">
                <br>

                <label>Name:</label>
                <input type="input" name="name"
                       value="<?php echo $car['carName']; ?>" required pattern="[a-z A-Z]+">
                <br>

                <label>Make:</label>
                <input type="input" name="make" 
                       value="<?php echo $car['make']; ?>" required pattern="[a-z A-Z]+">
                <br>

                <label>Model:</label>
                <input type="input" name="model" 
                       value="<?php echo $car['model']; ?>" required pattern="[a-z A-Z0-9]+">
                <br>

                <label>Year:</label>
                <input type="input" name="year" 
                       value="<?php echo $car['year']; ?>" placeholder="YYYY" required pattern="[0-9]{4}" >
                <br>

                <label>Engine:</label>
                <input type="input" name="engine" 
                       value="<?php echo $car['engine']; ?>"  required pattern="[0-4]{1}([.][0-9]{1})?">
                <br>            

                <label>Price:</label>
                <input type="input" name="price"
                       value="<?php echo $car['price']; ?>" required pattern="[0-9]+([.][0-9]{2})?" >
                <br>

                <label>&nbsp;</label>
                <input type="submit" value="Save Changes">
                <br>
            </form>
            
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Polite Sitsha Car Showroom, Inc.</p>
        </footer>
    <?php require_once ("footer.php"); ?>