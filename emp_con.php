<?php

include 'php_action/db_connect.php';

$data = json_decode(file_get_contents("php://input"));

$request_type = $data->request_type;

// Get all records
if($request_type == 1){

    $stmt = $connect->prepare("SELECT * FROM employee");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if($result->num_rows > 0){
       while($row = $result->fetch_assoc()) {
	   $data[] = array("id"=>$row['id'],"name"=>$row['name'],"desig"=>$row['desig'],"contact"=>$row['contact'],"dep"=>$row['dep'],"salary"=>$row['salary'],"Join_dt"=>$row['Join_dt']); 
        }
    }
    
    $stmt->close();
    echo json_encode($data);
    exit;
}

// Insert record
if($request_type == 2){
    $name = $data->name;
    $Join_dt = $data->dat;
    $desig = $data->deg;
	$contact = $data->con;
	$dep = $data->dep;
	$salary = $data->sal;
    
    // Check username already exists
    $stmt = $connect->prepare("SELECT * FROM employee WHERE name=?");
    $stmt->bind_param('s',$name);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $return_arr = array();
    if($result->num_rows == 0){

        // Insert
        $insertSQL = "INSERT INTO employee(name,desig,contact,dep,salary,Join_dt) values(?,?,?,?,?,?)";
        $stmt = $connect->prepare($insertSQL);
        $stmt->bind_param("ssssss",$name,$desig,$contact,$dep,$salary,$Join_dt);
        $stmt->execute();

        $lastinsert_id = $stmt->insert_id;
        if($lastinsert_id > 0){
            $return_arr[] = array("id"=>$row['id'],"name"=>$row['name'],"desig"=>$row['desig'],"contact"=>$row['contact'],"dep"=>$row['dep'],"salary"=>$row['salary'],"Join_dt"=>$row['Join_dt']);
			
			
        }
		
        $stmt->close();
    }
    
    echo json_encode($return_arr);
    exit;
}

// Delete record
if($request_type == 3){
    $u_id = $data->u_id;

    // Check userid exists
    $stmt = $connect->prepare("SELECT * FROM employee WHERE id=?");
    $stmt->bind_param('i',$u_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    
    if($result->num_rows > 0){

        // Delete
        $deleteSQL = "DELETE FROM employee WHERE id=?";
        $stmt = $connect->prepare($deleteSQL);
        $stmt->bind_param("i",$u_id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        exit;
    }else{
        echo 0;
    }

    exit;
}

?>