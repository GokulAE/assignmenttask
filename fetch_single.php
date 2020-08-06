<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM musers 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["name"] = $row["name"];
		$output["email"] = $row["email"];
		$output["phone"] = $row["phone"];
		$output["city"] = $row["city"];
		
	}
	echo json_encode($output);
}
?>