<?php
require_once('database.php');

//check if salesman ID is set otherwise display salesman 1 as default
if (!isset($salesman_id)) {
    $salesman_id = filter_input(INPUT_GET, 'salesman_id', FILTER_VALIDATE_INT);
    if ($salesman_id == null || $salesman_id == false) {
        $salesman_id = 1;
    }
}

// Get name for current salesman
try {
    $querySalesman = "SELECT * FROM salesmen 
              WHERE salesmanID = :salesman_id";
    $statement1 = $db->prepare($querySalesman);
    $statement1->bindValue(':salesman_id', $salesman_id);
    $statement1->execute();
    $salesman = $statement1->fetch();
    $statement1->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
$salesman_name = $salesman['salesmanName'];
$salesman_image = $salesman['image'];


// Get all salesmen
try{$queryAllSalesmen = 'SELECT * FROM salesmen
              ORDER BY salesmanID';
$statement2 = $db->prepare($queryAllSalesmen);
$statement2->execute();
$salesmen = $statement2->fetchAll();
$statement2->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}

// Get car for selected salesman
try{
$queryCars = "SELECT * FROM cars
              WHERE salesmanID = :salesman_id
              ORDER BY status, carID";
$statement3 = $db->prepare($queryCars);
$statement3->bindValue(':salesman_id', $salesman_id);
$statement3->execute();
$cars = $statement3->fetchAll();
$statement3->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>

<?php require_once ("header.php"); ?>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" href="css/index.css">
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="js/more.js"></script>
<header><h1>Sales Manager</h1></header>

<main>
    <h1>Cars List</h1>

    <aside>
        <!-- display a list of salesmen -->
        <h2>Salesmen</h2>
        <nav class="vertical-menu">
            <ul>
                <?php foreach ($salesmen as $salesman) : ?>
                    <li><a href=".?salesman_id=<?php echo $salesman['salesmanID']; ?>">
                            <?php echo $salesman['salesmanName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>          
    </aside>

    <section>
        <span class="sales-pic"><!-- display a table of cars -->
            <a href="salesman_list.php"><img style="width: 50px; height: 50px;" src="img/<?php echo $salesman_image; ?>" alt=""/></a>
        </span>
        <h2>&nbsp;&nbsp;<a href="salesman_list.php"><?php echo $salesman_name; ?></a></h2>
        </br>

        <?php
        $flag = TRUE;
        foreach ($cars as $car) :
            if ($car['status'] == 'Sold' && $flag) {
                echo "<br/>";
                $flag = FALSE;
            }
            ?>
            <div class="car-details">
                <div class="car-prof-pic"><img style="width: 190px; height: 160px;" src="img/<?php echo $car['image']; ?>" alt=""/></div>
                <div id="col-fields">
                    <h3>Car Details...</h3>
                    <table>
                        <tr>
                            <td>Registration</td>
                            <td><?php echo $car['carReg']; ?></td>
                        </tr>
                        <tr>
                            <td>Car Name</td>
                            <td><?php echo $car['carName']; ?></td>
                        </tr>
                        <tr>
                            <td>make</td>
                            <td><?php echo $car['make']; ?></td>
                        </tr>
                        <tr>
                            <td>model</td>
                            <td><?php echo $car['model']; ?></td>
                        </tr>
                        <tr>
                            <td>year</td>
                            <td><?php echo $car['year']; ?></td>
                        </tr>
                        <tr>
                            <td>engine</td>
                            <td><?php echo number_format($car['engine'], 1) . "L"; ?></td>
                        </tr>
                        <tr>
                            <td>price</td>
                            <td><?php echo "&euro;" . number_format($car['price'], 2); ?></td>
                        </tr>
                    </table>
                </div>
                <br>
                <?php
                if ($car['status'] == "Sold") {
                    echo "<b>Sold</b></div>";
                } else {
                    ?>
                    <div class="del-edit">
                        <form action="delete_car.php" method="post"
                              id="delete_car_form">
                            <input type="hidden" name="car_id"
                                   value="<?php echo $car['carID']; ?>">
                            <input type="hidden" name="salesman_id"
                                   value="<?php echo $car['salesmanID']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                        <form action="edit_car_form.php" method="post"
                              id="delete_car_form">
                            <input type="hidden" name="car_id"
                                   value="<?php echo $car['carID']; ?>">
                            <input type="hidden" name="salesman_id"
                                   value="<?php echo $car['salesmanID']; ?>">
                            <input type="submit" value="Edit" >
                        </form>
                        <div class="mark-sold">
                           
                        <form action="mark_sold.php" method="post"
                              id="delete_car_form">
                            <input type="hidden" name="car_id"
                                   value="<?php echo $car['carID']; ?>">
                            <input type="hidden" name="salesman_id"
                                   value="<?php echo $car['salesmanID']; ?>">
                            <input type="hidden" name="price"
                                   value="3100.00">
                            <input type="submit" value="Mark as sold">
                        </form></div>

                    </div>
                </div>

        <?php
    }
endforeach;
?>
        <!--</table>-->
<!--                    <p><a href="add_car_form.php">Add Car</a></p>
        <p><a href="cars_list.php">List all Cars</a></p>
        <p><a href="add_salesman_form.php">Add Salesman</a></p>
        <p><a href="salesman_list.php">List All Salesmen</a></p>-->
    </section>
</main>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Polite Sitsha Car Showroom, Inc.</p>
</footer>
<?php require_once ("footer.php"); ?>