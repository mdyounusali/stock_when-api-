<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$editdate 	= date('Y-m-d', strtotime($_POST['editdate']));
  $purpose = $_POST['editpurpose']; 
  $amount = $_POST['editamount'];

	$sql = "UPDATE credit SET date = '$editdate', credit_type = '$purpose'  amount = '$amount'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST