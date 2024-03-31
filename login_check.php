<?php
	session_start();
	error_reporting(0);
	include "config.php";
	
	if(isset($_POST["submit"]))
	{
		$name = $_POST['username'];
		$password = $_POST['password'];

		$query="SELECT * FROM user WHERE username=:username AND 
				password=:password";
		$statement = $connection->prepare($query);
		$statement->execute(array(':username'=>$name,':password'=>$password));
		$row = $statement->fetch();
		//echo $row['usertype'];exit();
		$count = $statement->rowCount();
		if($count > 0)
		{
			$_SESSION["username"] = $name;
			$_SESSION["usertype"] = $row['usertype'];
			//echo $_SESSION["username"];exit();
			if($row['usertype']=='student')
			{
				header('location:studenthome.php');
			}
			else if($row['usertype']=='admin')
			{
				header('location:adminhome.php');
			}
		}
		else
		{
			$message = "username or password do not match";
			$_SESSION['loginMessage']=$message;
			header("location:login.php");
		}
		
	}
?>
