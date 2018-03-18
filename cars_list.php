<?php
require_once('database.php');

// Get all cars
try{
$query = 'SELECT * FROM cars
            ORDER BY carID';
$statement = $db->prepare($query);
$statement->execute();
$cars = $statement->fetchAll();
$statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
<!DOCTYPE html>
<?php require_once ("header.php"); ?>
        <title>Cars List</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <style>
            #myInput {
                background-image: url('img/searchicon.png');
                background-size: 25px;
                background-position: 10px 10px;
                background-repeat: no-repeat;
                width: 100%; /* Full-width */
                font-size: 16px; /* Increase font-size */
                padding: 12px 20px 12px 40px; /* Add some padding */
                border: 1px solid #ddd; /* Add a grey border */
                margin-bottom: 12px; /* Add some space below the input */
            }
        </style>
    </head>

    <!-- the body section -->
    <body>
        <header><h1>Sales Manager</h1></header>

        <main>

            <h1>Cars List</h1>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for car..." title="Type in a name">
            <table id="myTable">
                <tr>
                    <th></th>
                    <th>Registration</th>
                    <th>Name</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th class="right">Engine</th>
                    <th class="right">Price</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($cars as $car) : ?>
                    <tr>
                        <td><img style="width: 50px; height: 50px;" src="img/<?php echo $car['image']; ?>" alt=""/></td>
                        <td><?php echo $car['carReg']; ?></td>
                        <td><?php echo $car['carName']; ?></td>
                        <td><?php echo $car['make']; ?></td>
                        <td><?php echo $car['model']; ?></td>
                        <td><?php echo $car['year']; ?></td>
                        <td><?php echo number_format($car['engine'], 1) . "L"; ?></td>
                        <td><?php echo "&euro;" . number_format($car['price'], 2); ?></td>
                        

                        <td>                            
                            <form action="delete_car.php" method="post"
                              id="delete_car_form">
                            <input type="hidden" name="car_id"
                                   value="<?php echo $car['carID']; ?>">
                            <input type="hidden" name="salesman_id"
                                   value="<?php echo $car['salesmanID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                            
                        </td>

                        <td><form action="edit_car_form.php" method="post"
                                  id="delete_car_form">
                                <input type="hidden" name="salesman_id"
                                       value="<?php echo $car['salesmanID']; ?>">
                                <input type="hidden" name="car_id"
                                       value="<?php echo $car['carID']; ?>">
                                <input type="submit" value="Edit">
                            </form></td>

                        <td>
                            <?php if ($car['status']=="For Sale") { ?>
                            <form action="mark_sold.php" method="post"
                                  id="delete_car_form">
                                <input type="hidden" name="car_id"
                                       value="<?php echo $car['carID']; ?>">
                                <input type="hidden" name="price"
                                       value="<?php echo $car['price']; ?>">
                                <input type="hidden" name="salesman_id"
                                       value="<?php echo $car['salesmanID']; ?>">
                                <input type="submit" value="Mark as sold">
                            </form>
                            <?php } else { ?>
                            Sold
                            <?php }  ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <br>


        </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> Polite Sitsha Car Showroom, Inc.</p>
        </footer>

        <script>
            function myFunction() {
                var input, filter, table, tr, td, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[2];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
   <?php require_once ("footer.php"); ?>