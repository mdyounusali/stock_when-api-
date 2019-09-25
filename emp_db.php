<?php

//insert.php



$connect = new PDO("mysql:host=localhost;dbname=stock", "root", "");

$form_data = json_decode(file_get_contents("php://input"));

$error = '';
$message = '';
$validation_error = '';
$first_name = '';
$last_name = '';

if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM employee WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['name'] = $row['name'];
		$output['desig'] = $row['desig'];
		$output['contact'] = $row['contact'];
		$output['dep'] = $row['dep'];
		$output['salary'] = $row['salary'];
		$output['Join_dt'] = $row['Join_dt'];
	}
}
elseif($form_data->action == "Delete")
{
	$query = "
	DELETE FROM employee WHERE id='".$form_data->id."'
	";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Data Deleted';
	}
}
else
{
	if(empty($form_data->name))
	{
		$error[] = 'Employee Name is Required';
	}
	else
	{
		$first_name = $form_data->name;
	}

	if(empty($form_data->contact))
	{
		$error[] = 'contact is Required';
	}
	else
	{
		$last_name = $form_data->contact;
	}

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{
			$data = array(
				':name'		=>	$name,
				':desig'		=>	$desig,
				':contact'		=>	$contact,
				':dep'		=>	$dep,
				':salary'		=>	$salary,
				':Join_dt'		=>	$Join_dt
			);
			$query = "
			INSERT INTO employee 
				(name, desig,contact,dep,salary,Join_dt) VALUES 
				(:name, :desig,:contact,:dep,:salary,Join_dt)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Inserted';
			}
		}
		if($form_data->action == 'Edit')
		{
			$data = array(
				':name'		=>	$name,
				':desig'		=>	$desig,
				':contact'		=>	$contact,
				':dep'		=>	$dep,
				':salary'		=>	$salary,
				':Join_dt'		=>	$Join_dt
				':id'			=>	$form_data->id
			);
			$query = "
			UPDATE employee 
			SET name = :name, desig = :desig,contact = :contact, dep = :dep,salary = :salary, Join_dt = :Join_dt, 
			WHERE id = :id
			";

			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Edited';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}



echo json_encode($output);

?>