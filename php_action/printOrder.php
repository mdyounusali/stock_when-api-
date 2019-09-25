<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2]; 
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
$discount = $orderData[6];
$grandTotal = $orderData[7];
$paid = $orderData[8];
$due = $orderData[9];


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '
 
 <table border="1" cellspacing="0" cellpadding="20" width="100%" ">
	<thead>
		<tr >
			<th colspan="5">

			    <img src="logo/logo.jpg" style="float:left;width:150px;height:110px" >
				<p style="position: absolute; top:0%; left:35%; font-family:sans-sarif; font-size:22px"> Makkah National Bricks </p></br>
				<p style="position: absolute; top:2%; left:35%; font-family:sans-sarif; font-size:22px"> Shapleza,Mathbaria,Pirojpur </p>
				<p style="position: absolute; top:4%; left:35%; font-family:sans-sarif; font-size:18px"> mnbsmp@gmail.com </p>
				<p style="position: absolute; top:6%; left:40%; font-family:sans-sarif; font-size:18px"> 01751688477</p>
				<p style="position: absolute; bottom:10%; right:0%; font-family:sans-sarif; font-size:22px">.........................................<br/> Authorized Signature </p>
				<p style="position: absolute; bottom:10%; left:0%; font-family:sans-sarif; font-size:22px">.........................................<br/> Customer Signature </p>
				
				
						
			</th>
				
		</tr>		
	</thead>
</table>
 
 <table border="1" cellspacing="0" cellpadding="20" width="100%">
	<thead>
		<tr >
			<th>
			
				Order Date : '.$orderDate.'
			<center>	Client Name : '.$clientName.'</center>
				Contact : '.$clientContact.'
					
			</th>
				
		</tr>		
	</thead>
</table>
<table border="0" width="100%;" cellpadding="5" style="border:1px solid black;border-top-style:1px solid black;border-bottom-style:1px solid black;">

	<tbody >
		<tr>
			<th>S.no</th>
			<th>Product</th>
			<th>Rate</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<th>'.$x.'</th>
				<th>'.$row[4].'</th>
				<th>'.$row[1].'</th>
				<th>'.$row[2].'</th>
				<th>'.$row[3].'</th>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<tr>
			<th></th>
		</tr>

		<tr>
			<th></th>
		</tr>

		<tr>
			<th style="position:relative;left:60%;bottom:62%; font-family:sans-sarif; font-size:17px">Sub Amount</th>
			<th style="position:relative;left:50%;bottom:62%; font-family:sans-sarif; font-size:17px">'.$subTotal.'</th>			
		</tr>

		

		<tr>
			<th style="position:relative;left:60%;bottom:60%; font-family:sans-sarif; font-size:17px">Total Amount</th>
			<th style="position:relative;left:50%; bottom:60%;font-family:sans-sarif; font-size:17px">'.$totalAmount.'</th>			
		</tr>	

		<tr>
			<th style="position:relative;left:60%;bottom:58%; font-family:sans-sarif; font-size:17px">Discount</th>
			<th style="position:relative;left:50%; bottom:58%;font-family:sans-sarif; font-size:17px">'.$discount.'</th>			
		</tr>

		<tr>
			<th style="position:relative;left:60%;bottom:56%; font-family:sans-sarif; font-size:17px">Grand Total</th>
			<th style="position:relative;left:50%; bottom:56%;font-family:sans-sarif; font-size:17px">'.$grandTotal.'</th>			
		</tr>

		<tr>
			<th style="position:relative;left:60%;bottom:54%; font-family:sans-sarif; font-size:17px">Paid Amount</th>
			<th style="position:relative;left:50%; bottom:54%;font-family:sans-sarif; font-size:17px">'.$paid.'</th>			
		</tr>

		<tr>
			<th style="position:relative;left:60%;bottom:52%; font-family:sans-sarif; font-size:17px">Due Amount</th>
			<th style="position:relative;left:50%; bottom:52%;font-family:sans-sarif; font-size:17px">'.$due.'</th>			
		</tr>
	</tbody>
</table>
 ';


$connect->close();

echo $table;

echo '<img src="logo/logo.jpg" style="position:absolute;left:2%;top:7%;width:1100px;height:1100px;color:#fff;opacity:0.2;"/>';

