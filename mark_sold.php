<?php 
require_once('database.php');

if (isset($_POST) && isset($_POST['car_id']) && isset($_POST['salesman_id'])) {
    #do some validation here
    $car_id = $_POST['car_id'];
    $sql="UPDATE cars SET status = 'Sold' where carID={$car_id}";
    $updated = $db->query($sql);
    if ($updated) {
		
        #display success message		
		echo "suceess";
        
    } else {
        # display the error message		
		echo "failed to update";
    }
    
    header('Location: index.php?salesman_id=' . $_POST['salesman_id']);
}
?>

