<?php 

require_once 'core.php';



	

	$n = 3;

	$sql = "UPDATE orders SET payment_status = 3, WHERE orders.due = 0 AND order_id = 1";
	
	if($connect->query($sql) === TRUE) {
		header('location: http://localhost/stock/dashboard.php');
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}


?>