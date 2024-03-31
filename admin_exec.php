<?php
session_start();
error_reporting(0);
include "config.php";

	if(isset($_POST['delete_student']))
	{
		$id = $_POST['delete_student'];

		try
		{
			$query="DELETE FROM admission WHERE id =:id";
			$param = array(':id'=>$id);
			$statement = $connection->prepare($query);
			$result = $statement->execute($param);
			if($result)
			{
				$_SESSION['message'] = 'Delete Successfully';
				header("location:admission.php");
				exit(0);
			}
			else
			{
				$_SESSION['message'] = 'Delete Unsuccessfully';
				header("location:admission.php");
				exit(0);
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessge();
		}
	}

	if(isset($_POST['save']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone'];
		$message = $_POST['message'];

		$query ="INSERT INTO admission(name,email,phone,message) VALUES(:name,:email,:phone,:message)";
		$param = array(':name'=>$name,':email'=>$email,':phone'=>$phone_no,':message'=>$message);

		$statement = $connection->prepare($query);
		$result = $statement->execute($param);

		if($result)
		{
			$_SESSION['message'] = 'Save Successfully';
			header("location:admission.php");
			exit(0);
		}
		else
		{
			$_SESSION['message'] = 'Save Unsuccessfully';
			header("location:admission.php");
			exit(0);
		}

	}

	if(isset($_POST['update']))
	{
		$id = $_POST['admin_id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone_no = $_POST['phone'];
		$message = $_POST['message'];

		$query ="UPDATE admission SET name=:name,email=:email,phone=:phone,message=:message WHERE id=:id";
		$param = array(':name'=>$name,':email'=>$email,':phone'=>$phone_no,':message'=>$message,':id'=>$id);
		$statement = $connection->prepare($query);
		$result = $statement->execute($param);
		if($result)
		{
			$_SESSION['message'] = 'Update Successfully';
			header("location:admission.php");
			exit(0);
		}
		else
		{
			$_SESSION['message'] = 'Update Unsuccessfully';
			header("location:admission.php");
			exit(0);
		}
	}
?>