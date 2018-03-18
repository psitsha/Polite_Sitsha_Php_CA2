<?php
require('database.php');

$salesman_id = filter_input(INPUT_POST, 'salesman_id', FILTER_VALIDATE_INT);

try {$query = 'SELECT *
          FROM salesmen
          WHERE salesmanID = :salesman_id';
$statement = $db->prepare($query);
$statement->bindValue(':salesman_id', $salesman_id);
$statement->execute();
$salesman = $statement->fetch();
$statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
<!DOCTYPE html>
<?php require_once ("header.php"); ?>
        <title>Add A Car</title>
        <link rel="stylesheet" type="text/css" href="main.css">
    
        <header><h1>Sales Manager</h1></header>

        <main>
            <h1>Edit Salesman</h1>
            <form action="edit_salesman.php" method="post"
                  id="add_car_form">

                <!--<label>Salesman ID:</label>-->
                <input type="hidden" name="salesman_id"
                       value="<?php echo $salesman['salesmanID']; ?>">
                <br>

                <label>Name:</label>
                <input type="input" name="name" required pattern="[a-z A-Z ']+"
                       value="<?php echo $salesman['salesmanName']; ?>">
                <br>

                <label>Address:</label>
                <input type="input" name="address" required pattern="[a-z A-Z 0-9,.-]+"
                       value="<?php echo $salesman['salesmanAddress']; ?>">
                <br>

                <label>Email:</label>
                <input type="input" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"
                       value="<?php echo $salesman['salesmanEmail']; ?>">
                <br>

                <label>Phone:</label>
                <input type="input" name="phone" required pattern="[0-9 ()/-]+"
                       value="<?php echo $salesman['salesmanPhone']; ?>">
                <br>           

                <label>PPSN:</label>
                <input type="input" name="ppsn" required pattern="[0-9]+[a-zA-Z]"
                       value="<?php echo $salesman['salesmanPPSN']; ?>">
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