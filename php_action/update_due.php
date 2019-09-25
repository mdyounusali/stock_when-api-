<?php 

require_once 'core.php';



	

	

	$sql = "SELECT orders.client_name,orders.client_contact,orders.due FROM orders WHERE due != 0";
	$query = $connect->query($sql);
	

	$table = '
		<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th> Ovi Senitary Ltd</th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th>  Due Report </th>
		</tr>
	
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
		<tr>
			<th>Client Name</th>
			<th>Client Contact</th>
			<th>Due Amount</th>
			
		</tr>

		<tr>';
		
		
		$totalAmount = "";
		
		while ($result = $query->fetch_assoc()) {
			
			$table .= '<tr>
				
				
				<td><center>'.$result['client_name'].'</center></td>
				<td><center>'.$result['client_contact'].'</center></td>
				<td><center>'.$result['due'].'</center></td>
				
				</tr>';	
			$totalAmount += $result['due'];
			
			
		}
		
		$table .= '
		</tr>
		
		<tr>
			<td colspan="3"><center>Total Due Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>	
		

		
		
		
		
		
		
	</table>
	';	

	echo $table;



?>