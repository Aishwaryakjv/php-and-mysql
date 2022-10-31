 
<?php 

include('config/db_connect.php');

if(isset($_POST['delete'])){

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM products WHERE Product_id = $id_to_delete";

    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    } else {
        echo 'query error: '. mysqli_error($conn);
    }

}

// check GET request id param
if(isset($_GET['id'])){
		
    // escape sql chars
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM products WHERE Product_id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $products = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}

?>

<!DOCTYPE html>
<html>

<?php include('template/header.php'); ?>

<div class="container center">
    <?php if($products): ?>
        <h4><?php echo $products['Product_name']; ?></h4>
        <p>Category: <?php echo $products['Category']; ?></p>
        <p>Quantity: <?php echo $products['Qty']; ?></p>
        <p>Cost: <?php echo $products['Price']; ?></p>

        <!-- DELETE FORM -->
			<form action="details.php" method="POST">
				<input type="hidden" name="id_to_delete" value="<?php echo $products['Product_id']; ?>">
				<input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
			</form>

    <?php else: ?>
        <h5>No such product exists.</h5>
    <?php endif ?>
</div>

<?php include('template/footer.php'); ?>

</html>
