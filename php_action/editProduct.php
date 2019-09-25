<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
 $productId = $_POST['productId'];
 $productName 		= $_POST['editProductName']; 
 $date 			 =  date('Y-m-d', strtotime($_POST['editdate']));
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $brandName 			= $_POST['editBrandName'];
  $categoryName 	= $_POST['editCategoryName'];
  $productStatus 	= $_POST['editProductStatus'];

				
	$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName', quantity = quantity + '$quantity', rate = '$date', rr =  '$rate',total = quantity  *'$rate',  active = '$productStatus', status = 1 WHERE product_id = $productId ";
	
	
	$sql1 = "INSERT INTO store (date,brand_id, product_name, quantity) 
				VALUES ('$date','$brandName', '$productName','$quantity')";
				
				
	if(($connect->query($sql))&&($connect->query($sql1)) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
