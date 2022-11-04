<?php 

include('config/db_connect.php');

    //$id = mysqli_real_escape_string($conn, $_GET['id']);
    // write query for all customers
	$sql = 'SELECT * FROM products';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);


    // if(count($_POST)>0) {
    //     mysqli_query($conn,"UPDATE products set qty='" . $_POST['qty'] . "' WHERE Product_id='" . $_POST['id_to_update'] . "'");
    //     $message = "Record Modified Successfully";
    //     }

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);


// if(isset($_POST['update'])){

//     header('Location: index.php');

//     $id_to_update = mysqli_real_escape_string($conn, $_POST['id_to_update']);
 
//     $sql = "UPDATE products SET qty=5 WHERE Product_id = $id_to_update";
    
//     if(mysqli_query($conn, $sql)){
//         header('Location: index.php');
//     } else {
//         echo 'query error: '. mysqli_error($conn);
//     }

// }



?>

<?php include('template/header.php'); ?>


<!DOCTYPE html>
<html>




<div><?php echo htmlspecialchars($products['Product_name']); ?></div>
<!-- <div class="container center">
    <h1>hello</h1>
</div> -->


<?php include('template/footer.php'); ?>

</html>
