<?php 

require_once 'core.php';



	

	

	$sql = "SELECT  *FROM product WHERE product.brand_id = 3";
	$query = $connect->query($sql);
	

	$table = '
		<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th> Ovi Senitary Ltd</th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th> Stock Report </th>
		</tr>
	
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
		<tr>
			<th>Product Name</th>
			<th>Date</th>
			<th>Quantity</th>
			
		</tr>

		<tr>';
		
		$totalAmount = "";
		
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				</tr>';	
			
			$totalAmount +=  $result['quantity'];
		}
		
		
		
		$table .= '
		</tr>

		
		
	<tr>
			<td colspan="3"><center>Total product</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>	
		
		
		
	</table>
	';	

	echo $table;



?>