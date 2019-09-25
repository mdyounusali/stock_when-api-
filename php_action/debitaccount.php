<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {

	$date	= date('Y-m-d', strtotime($_POST['date']));
	
	$accountpurpose = $_POST['purpose'];
  $amount = $_POST['amount']; 

	$sql = "INSERT INTO debit (date, debit_type, debit_amount) VALUES ('$date', '$accountpurpose','$amount' )";

	if($connect->query($sql) === TRUE) {
	 	header('location: http://localhost/stock/debit.php');
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST