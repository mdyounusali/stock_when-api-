
<?php 

$localhost = "127.0.0.1";
$username = "root";
$password = "syounus";
$dbname = "stock";

// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}


if($_POST) {
	
	$brandName 	= $_POST['brandName'];
	$startDate = $_POST['startDate'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");
	
	

	//$sql = "SELECT * FROM store WHERE date >= '$start_date' AND date <= '$end_date' AND brand_id = '$brandName'";
	//$sql = "SELECT * FROM store INNER JOIN brands ON brands.brand_id = store.brand_id WHERE date >= '$start_date' AND date <= '$end_date'  AND brands.brand_id ='$brandName'";
	$sql="select Dt,product_name,quantity from store where Dt between '$start_date'  and '$end_date' and brand_id='$brandName'";

	$query = $connect->query($sql);

	$table = '
		<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	<tr>
		 <th> Ovi Senitary Ltd</th>
		</tr>
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
	<tr>
		 <th> Product Entry Repoert</th>
		</tr>
	
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Date</th>
			
			<th>Product Name</th>
			<th>Quantity</th>
		</tr>

		<tr>';
		
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['Dt'].'</center></td>
				
				<td><center>'.$result['product_name'].'</center></td>
				
				<td><center>'.$result['quantity'].'</center></td>
			</tr>';	
			$totalAmount += $result['quantity'];
		}
		$table .= '
		</tr>

		<tr>
			<td colspan="3"><center>Total Product</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
	</table>
	';	

	echo $table;

}

?>
