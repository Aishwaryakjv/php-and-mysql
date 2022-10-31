<?php

$conn = mysqli_connect('localhost', 'Aishwarya', 'Aish2003', 'departmental_store');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
