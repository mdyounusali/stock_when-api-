<?php 	

require_once 'core.php';

$brandId = $_POST['debitId'];

$sql = "SELECT debit_id, date, debit_type, amount FROM credit WHERE debit_id = $debitId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);