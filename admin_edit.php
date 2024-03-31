<?php
	session_start();
	error_reporting(0);
	include "config.php";

	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query="SELECT * FROM admission WHERE id = :id";
		$param = array(':id'=>$id);
		$statement = $connection->prepare($query);
		$statement->execute($param);
		$row = $statement->fetch();
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width,initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<title>Admin Edit</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
						<h3>
							Admin Edit
						</h3>
						<a href="admission.php" class="btn btn-primary float-end">Back
						</a>
					</div>
					<div class="card-body">
						
						<form action="admin_exec.php" method="POST">
							<input type="hidden" name="admin_id" value="<?=$row['id'] ?>">
							<div class="mb-3">
								<label>Name</label>
								<input type="text" name="name" value="<?=$row['name'] ?>" class="form-control" />
							</div>
							<div class="mb-3">
								<label>Email</label>
								<input type="text" name="email" value="<?=$row['name'] ?>" class="form-control" />
							</div>
							<div class="mb-3">
								<label>PhoneNo</label>
								<input type="text" name="phone" value="<?=$row['phone'] ?>" class="form-control" />
							</div>
							<div class="mb-3">
								<label>Message</label>
								<input type="textarea" name="message" value="<?=$row['message'] ?>" class="form-control" />
							</div>
							<div>
								<button type="submit" name="update" class="btn btn-primary">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>