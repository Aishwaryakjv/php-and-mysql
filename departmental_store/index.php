<?php 

	// connect to the database
	// $conn = mysqli_connect('localhost', 'Aishwarya', 'Aish2003', 'departmental_store');

	// // check connection
	// if(!$conn){
	// 	echo 'Connection error: '. mysqli_connect_error();
	// }

    include('config/db_connect.php');

    // write query for all customers
	$sql = 'SELECT Product_id, Product_name, Price, Category, Qty FROM products';

	// get the result set (set of rows)
	$result = mysqli_query($conn, $sql);

	// fetch the resulting rows as an array
	$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

	// free the $result from memory (good practise)
	mysqli_free_result($result);

	// close connection
	mysqli_close($conn);

	//print_r($products);

?>
<!DOCTYPE html>
<html>
	
    <?php include('template/header.php'); ?>

    <h4 class="center grey-text">Popular Products!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($products as $products){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($products['Product_name']); ?></h6>
							<div><?php echo htmlspecialchars($products['Category']); ?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $products['Product_id'] ?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('template/footer.php'); ?>

</html>
