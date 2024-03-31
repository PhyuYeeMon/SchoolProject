<?php
	session_start();
	error_reporting(0);
	include "config.php";

	if(isset($_POST['apply']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$message = $_POST['message'];

		$query="INSERT INTO admission(name,email,phone,message) VALUES(:name,:email,:phone,:message)";

		$param = array(':name'=>$name,':email'=>$email,':phone'=>$phone,':message'=>$message);

		$statement = $connection->prepare($query);
		$result = $statement->execute($param);

		if($result)
		{
			$_SESSION['message']="your application sent successful";
			header("location:index.php");
		}
		else
		{
			echo "Apply Failed";
		}

	}
?>
