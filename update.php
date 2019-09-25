<?php require_once 'includes/header.php'; ?>
<?php require_once 'php_action/db_connect.php';?>

<?php require_once 'php_action/core.php';?>

<?php require_once 'includes/header.php'; ?>

<?php 





	

	

	$sql = "SELECT orders.client_name,orders.client_contact,orders.due FROM orders WHERE due != 0";
	$query = $connect->query($sql);
	

	$table = '
		
	<table border="1" cellspacing="0" cellpadding="0" style="width:90%;">
	<tr>
		 <th colspan="3">
		   <center> Makkah National Bricks. </center>
		   <center> Shapleza,Mathbaria,Pirojpur </center>
		 </th>
	</tr>
	<tr>
		 <th colspan="3">
                <center> Due Report </center>		 
		 </th>
		</tr>
		<tr>
			<th><center>Client Name</center></th>
			<th><center>Client Contact</center></th>
			<th><center>Due Amount</center></th>
			
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
			<td colspan="2"><center><h4>Total Due Amount</h4></center></td>
			<td><center><h4>'.$totalAmount.'</h4></center></td>
		</tr>	
		
		

		
		
		
		
		
		
	</table>
	';	

	echo $table;
    echo "<br/>";
    echo "<br/>";
    echo "<br/>";


?>




	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/updatedue.js"></script>

<?php require_once 'includes/footer.php'; ?>
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>




<?php require_once 'includes/footer.php'; ?>
