<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d h:i:s A', time () );
$createdOn = $currentTime;

		$statement = $connection->prepare("
			INSERT INTO musers (name, email, phone, city, createdDate) 
			VALUES (:name, :email, :phone,:city, '$createdOn')
		");
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':email'	=>	$_POST["email"],
				':phone'	=>	$_POST["phone"],
				':city'	=>	$_POST["city"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'Y-m-d h:i:s A', time () );
$modifiedOn = $currentTime;

		$statement = $connection->prepare(
			"UPDATE musers 
			SET name = :name, email =:email, phone =:phone, city =:city , modifiedDate ='$modifiedOn'  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':name'	=>	$_POST["name"],
				':email'	=>	$_POST["email"],
				':phone'	=>	$_POST["phone"],
				':city'	=>	$_POST["city"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>