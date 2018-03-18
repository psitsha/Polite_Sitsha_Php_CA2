<?php
require('database.php');
try{
$query = 'SELECT *
          FROM salesmen
          ORDER BY salesmanID';
$statement = $db->prepare($query);
$statement->execute();
$salesmen = $statement->fetchAll();  //saving my sql results set in $salesmen
$statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
<!DOCTYPE html>
<?php require_once ("header.php"); ?>
<link href="main.css" rel="stylesheet" type="text/css"/>
<title>Add A Car</title>
        <header><h1>Sales Manager</h1></header>
        
        <main>
            <h1>Add Car</h1>
            <form action="add_car.php" method="post"
                  id="add_car_form" enctype="multipart/form-data">

                <label>Salesman:</label>
                <select name="salesman_id">
                    <?php foreach ($salesmen as $salesman) : ?>
                        <option value="<?php echo $salesman['salesmanID']; ?>">
                            <?php echo $salesman['salesmanName']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>

                <label>Image:</label>
                <input type='file' name='UploadImage'>
                <br>
                
                <label>Registration:</label>
                <input type="input" name="registration" required pattern="[a-zA-Z0-9]+">
                <br>

                <label>Name:</label>
                <input type="input" name="name" required pattern="[a-z A-Z]+">
                <br>

                <label>Make:</label>
                <input type="input" name="make" required pattern="[a-z A-Z0-9]+"/>
                </br>
                
                <label>Model:</label>
                <input type="input" name="model" required pattern="[a-z A-Z0-9]+"/>
                </br>
                
                <label>Year:</label>
                <input type="input" name="year" placeholder="YYYY" required pattern="[0-9]{4}" />
                </br>
                
                <label>Engine:</label>
                <input type="input" name="engine" required pattern="[0-4]{1}([.][0-9]{1})?"/>
                </br>    
                
                <label>Price:</label>
                <input type="input" name="price" required pattern="[0-9]+([.][0-9]{2})?" /></br>

                <label>&nbsp;</label>
                <input type="submit" value="Add Car">
                <br>
            </form>
            
            
           
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Polite Sitsha Car Showroom, Inc.</p>
        </footer>
    <?php require_once ("footer.php"); ?>