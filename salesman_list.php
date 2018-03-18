<?php
require_once('database.php');

// Get all salesmen
try {
    $query = 'SELECT * FROM salesmen
            ORDER BY salesmanID';
    $statement = $db->prepare($query);
//$statement->bindValue(':salesman_id', $salesman_id);
    $statement->execute();
    $salesmen = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
?>
<?php require_once ("header.php"); ?>
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

<header><h1>Sales Manager</h1></header>

<main>

    <h1>Salesman List</h1>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Find salesman..." title="Type in a name">
    <table id="myTable">
        <tr>
            <th>Profile Pic</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
            <th>PPSN</th>
            <th class="right">Commission</th>

            <th>&nbsp;</th>
        </tr>
        <?php
        foreach ($salesmen as $salesman) :
            // Get salesmen Commision
            try {
                $query = 'SELECT .1 * sum(price) as commission FROM cars where  salesmanID= :salesman_id and status = "Sold"';
                //echo $query;
                $statement2 = $db->prepare($query);
                $statement2->bindValue(':salesman_id', $salesman["salesmanID"]);
                $statement2->execute();
                $salesmenC = $statement2->fetch();
                $statement->closeCursor();
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('database_error.php');
                exit();
            }

//'SELECT .1 * sum(price) as commission FROM cars where  salesmanID= :salesman_id and status<>"For Sale"';                    
// update salesmen SET salesmanCommission = (SELECT .1 * sum(price) as commission FROM `cars` where salesmanID=2 and status<>"For Sale") where salesmanID=2
            ?>
            <tr>
                <td><a href="index.php?salesman_id=<?php echo $salesman['salesmanID'] ?>"><img style="width: 50px; height: 50px;" src="img/<?php echo $salesman['image']; ?>" alt=""/></a></td>
                <td><?php echo $salesman['salesmanName']; ?></td>
                <td><?php echo $salesman['salesmanAddress']; ?></td>
                <td><?php echo $salesman['salesmanEmail']; ?></td>
                <td><?php echo $salesman['salesmanPhone']; ?></td>
                <td><?php echo $salesman['salesmanPPSN']; ?></td>
                <td><?php echo "&euro;" . number_format($salesmenC['commission'], 2); ?></td>
                <td>
                    <form action="delete_salesman.php" method="post"
                          id="delete_car_form">
                        <input type="hidden" name="salesman_id"
                               value="<?php echo $salesman['salesmanID']; ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>

                <td><form action="edit_salesman_form.php" method="post"
                          id="delete_car_form">
                        <input type="hidden" name="salesman_id"
                               value="<?php echo $salesman['salesmanID']; ?>">
<!--                        <input type="hidden" name="car_id"
                               value="<?php echo $salesman['carID']; ?>">-->
                        <input type="submit" value="Edit">
                    </form></td>
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
            td = tr[i].getElementsByTagName("td")[1];
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