<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT debit.debit_amount FROM debit WHERE date >= '$start_date' AND date <= '$end_date'";
	$query = $connect->query($sql);
	$sql1 = "SELECT credit.amount FROM credit WHERE date >= '$start_date' AND date <= '$end_date'";
	$query1 = $connect->query($sql1);

	$table = '
		<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th>
		   <center> Makkah National Bricks. </center>
		   <center> Shapleza,Mathbaria,Pirojpur </center>
		 </th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th> Balance Report</th>
		</tr>
	
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
		<tr>
			
			
		</tr>

		<tr>';
		
		$totalAmount = "";
		$totalAmount1 = "";
		$totalAmount2 = "";
		/*while ($result1 = $query1->fetch_assoc()) {
			if($result = $query->fetch_assoc()){
			$table .= '<tr>
				
				
				
				
				</tr>';	
			$totalAmount += $result['debit_amount'];
			$totalAmount1 += $result1['amount'];
			$totalAmount2 = $totalAmount1 - $totalAmount;
		}
		}*/
		 $totalAmount1 ="";
         while ($result = $query1->fetch_assoc()) {
    $totalAmount1 += $result['amount'];
         }
		  $totalAmount ="";
         while ($result1 = $query->fetch_assoc()) {
    $totalAmount += $result1['debit_amount'];
         }
		 
		 $totalAmount2=$totalAmount1-$totalAmount;
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Credit Amount  Total </center></td>
			<td><center>'.$totalAmount1.'</center></td>
		</tr>
		
		<tr>
			<td colspan="3"><center>Debit Amount Total</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
		
		
		
		<tr>
			<td colspan="3"><center> Balance Amount</center></td>
			<td><center>'.$totalAmount2.'</center></td>
		</tr
	</table>
	';	

	echo $table;

}

?>