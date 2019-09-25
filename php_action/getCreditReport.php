<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT  *FROM credit WHERE date >= '$start_date' AND date <= '$end_date'";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	<tr>
		 <th> 
		    <center> Makkah National Bricks. </center>
			<center> Shapleza,Mathbaria,Pirojpur </center>
		 </th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	<tr>
		 <th> Credit Account Repoert</th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		
		
		<tr>
			<th> Date</th>
			<th>Type</th>
			<th>Amount</th>
			
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['date'].'</center></td>
				<td><center>'.$result['credit_type'].'</center></td>
				<td><center>'.$result['amount'].'</center></td>
				
			</tr>';	
			$totalAmount += $result['amount'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Amount</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>