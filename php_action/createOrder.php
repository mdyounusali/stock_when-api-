
<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	

	$orderDate 						= date('Y-m-d', strtotime($_POST['orderDate']));	
  $clientName 					= $_POST['clientName'];
  $clientContact 				= $_POST['clientContact'];
   $rate								= $_POST['rate'];
  $subTotalValue 				= $_POST['subTotalValue'];
  $vatValue 						=	$_POST['vatValue'];
  $totalAmountValue     = $_POST['totalAmountValue'];
  $discount 						= $_POST['discount'];
  $grandTotalValue 			= $_POST['grandTotalValue'];
  $paid 								= $_POST['paid'];
  $dueValue 						= $_POST['dueValue'];
  $paymentType 					= $_POST['paymentType'];
  $paymentStatus 				= $_POST['paymentStatus'];

				
	$sql = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status) VALUES ('$orderDate', '$clientName', '$clientContact', '$subTotalValue', '$vatValue', '$totalAmountValue', '$discount', '$grandTotalValue', '$paid', '$dueValue', $paymentType, $paymentStatus, 1)";
	
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
	}

		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			if ( $_POST['quantity'][$x] < $updateProductQuantityResult[0]+1 ) { 
			$updateQuantity[$x] = $updateProductQuantityResult[0] - $_POST['quantity'][$x];		
			}
				
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' , total = '".$updateQuantity[$x]."' * rr WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);
				
				
				
				// add into order_item
				
				$orderItemSql = "INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 
				VALUES ('$order_id', '".$_POST['productName'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."', 1)";
				$connect->query($orderItemSql);
				
				$orderItemSql1 = "INSERT INTO credit(order_id, date, credit_type, amount) 
				VALUES ('$order_id','$orderDate','sales','$paid' )";
				$connect->query($orderItemSql1);
					
					$orderItemSql2 = "INSERT INTO record( date, client_name, client_contact,total,paid,due) 
				VALUES ('$orderDate','$clientName', '$clientContact','$grandTotalValue', '$paid', '$dueValue' )";
				$connect->query($orderItemSql2);

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}	

					if($updateQuantity[$x]==0){
						$st = 2 ;
						$updateProductTable1 = "UPDATE product SET status = '$st' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable1);
					}
			
		} // while	
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);