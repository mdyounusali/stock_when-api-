<?php

//fetch_data.php



$query = "SELECT * FROM employee ORDER BY id";
$statement = $connect->prepare($query);
 $data = array();
if($statement->execute())
{
	while($row = $statement->fetch(PDO::FETCH_ASSOC)) 
	{
		$data[] = $row;
	}

	echo json_encode($data);
}

?>