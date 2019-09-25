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
   echo "Successfully connected";
}
$date=$_POST['date'];
$date=date("Y-m-d",strtotime($date));
$sql1 = "INSERT INTO store (Dt,brand_id,product_name, quantity) VALUES ('$date',1,'hldgsdl',3)";
//$sql="INSERT INTO test (Name,Last)values('$_POST[fname]','$_POST[lname]')";
$sql2="insert into test (Name,Last) values ('ali','younus')";
if($connect->query($sql1)===true) {
					echo"1 record added";
				} else {

					echo"no";
					
				}

				









?>