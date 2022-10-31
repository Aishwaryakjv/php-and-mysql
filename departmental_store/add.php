<?php 

	include('config/db_connect.php');

    $name = $price = $category = $qty ='';
	$errors = array('name' => '', 'price' => '', 'category' => '', 'qty' => '');
    // if(isset($_GET['submit'])){
	// 	echo $_GET['name'] . '<br />';
	// 	echo $_GET['number'] . '<br />';
	// 	echo $_GET['address'] . '<br />';
	// }
	if(isset($_POST['submit'])){
		// echo htmlspecialchars ($_POST['name']) . '<br />';
		// echo htmlspecialchars ($_POST['number']) . '<br />';
        // echo htmlspecialchars ($_POST['address']) . '<br />';

        if(empty($_POST['name'])){ 
			$errors['name']= '*required <br />';
	    } else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name']= 'Name must be letters and spaces only' . '<br/>';
			} }
        //else{
		// 	echo htmlspecialchars($_POST['name']) . '<br />';
		// }

		if(empty($_POST['price'])){
			$errors['price']= '*required <br />';
		} else{ 
            $price= $_POST['price'];
            if(!preg_match('/^[0-9]+$/', $price)){
                $errors['price']= 'Invalid! <br />';
            }
                
			    //echo htmlspecialchars($_POST['number']) . '<br />';
		}

		if(empty($_POST['category'])){
			$errors['category']= '*required <br />';
		} else{
            $category = $_POST['category'];
            if(!preg_match('/^[a-zA-Z\s]+$/', $category)){
				$errors['category']= 'Only letters and spaces is alllowed' . '<br/>';
			}
			//echo htmlspecialchars($_POST['address']) . '<br />';
		} 

        if(empty($_POST['qty'])){ 
			$errors['qty']= '*required <br />';
	    } else{
			$qty = $_POST['qty'];
			if(!preg_match('/^[0-9\s]+$/', $qty)){
				$errors['qty']= 'Only numbers are allowed' . '<br/>';
			}
        }


        if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			//echo 'form is valid';
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$category = mysqli_real_escape_string($conn, $_POST['category']);
			$price = mysqli_real_escape_string($conn, $_POST['price']);
			$qty = mysqli_real_escape_string($conn, $_POST['qty']);

			// create sql
			$sql = "INSERT INTO products(product_name,category,qty,price) VALUES('$name','$category','$qty', '$price')";


			//header('Location: index.php');
			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}

	}

?>

<!DOCTYPE html>
<html>
	
	<?php include('template/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Product</h4>
		<form class="white" action="add.php" method="POST">
			<label>Product Name </label>
			<input type="text" name="name" value="<?php echo htmlspecialchars($name) ?>">
			<div class="red-text"><?php echo $errors['name']; ?></div>
			<label>Category</label>
			<input type="text" name="category" value="<?php echo htmlspecialchars($category) ?>">
            <div class="red-text"><?php echo $errors['category']; ?></div>
            <label>Quantity Available</label>
			<input type="text" name="qty" value="<?php echo htmlspecialchars($qty) ?>">
			<div class="red-text"><?php echo $errors['qty']; ?></div>
            <label>Price</label>
			<input type="text" name="price" value="<?php echo htmlspecialchars($price) ?>">
            <div class="red-text"><?php echo $errors['price']; ?></div>
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('template/footer.php'); ?>

</html>

       
