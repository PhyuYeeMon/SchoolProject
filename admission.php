<?php
	//require_once('adminhome.php');
	session_start();
	error_reporting(0);
	include "config.php";
	if(!isset($_SESSION['username']))
	{
		header("location:login.php");
	}
	else if($_SESSION['usertype']=='student')
	{
		header("location:login.php");
	}

	$start = 0;
	$page_size = 5;
	$query ="SELECT * FROM admission";
	$statement = $connection->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();//PDO::FETCH_ASSOC
	//$result = $statement->fetchAll(PDO::FETCH_OBJ);
	$count = $statement->rowCount();
	$page_number = ceil($count / $page_size);
	if(isset($_GET['page-nr']))
	{
		$page = $_GET['page-nr'] - 1;
		$start = $page * $page_size;
	}

	$query ="SELECT * FROM admission LIMIT $start,$page_size";
	$statement = $connection->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewpoint" content="width=device-width,initial-scale=1.0">
	<link href="style/admission_style.css" rel="stylesheet" type="text/css">
	<title>Admin Dashboard</title>

	<?php
		include 'style/admin_css.php';
	?> 
</head>
<body>
	<?php
		include 'admin_sidebar.php';
	?> 
	
	<div class="content">
		<h1>Applied For Admission</h1>

		<div class="row">
			<div class="col-md-12 mt-4">
				<?php if(isset($_SESSION['message'])) : ?>
					<h5 class="alert alert-success"><?= $_SESSION['message']; ?>
					</h5>
				<?php 
					unset($_SESSION['message']);
					endif
				?>
				<div class="card">
					<div class="card-header" height="10%">
						<h1>
							<a href="admin_add.php" class="btn btn-primary float-end" style="font-size: 16px;">Add Admin
							</a>
						</h1>
					</div>
					<div class="card-body">
						<table class="table table bordered table-striped">
							<thead>
								<tr>
									<th style="padding: 20px; font-size: 15px;">Name</th>
									<th style="padding: 20px; font-size: 15px;">Email</th>
									<th style="padding: 20px; font-size: 15px;">Phone</th>
									<th style="padding: 20px; font-size: 15px;">Message</th>
									<th style="padding: 20px; font-size: 15px;"  colspan="2">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									if($result)
									{
										foreach($result as $row)
										{ 
								?>
								<tr>
									<td style="padding: 20px; font-size: 14px;">
										<?= $row['name'] ?></td>
									<td style="padding: 20px; font-size: 14px;">
										<?= $row['email'] ?></td>
									<td style="padding: 20px; font-size: 14px;">
										<?= $row['phone'] ?></td>
									<td style="padding: 20px; font-size: 14px;">
										<?= $row['message'] ?></td>
									
									<td colspan="2" style="padding: 20px;">
										<form action="admin_exec.php" method="POST">
											<a href="admin_edit.php?id=<?=
													$row['id'];?>" class="btn btn-primary" style="font-size: 16px;">Edit
											</a>
											<button type="submit" 
												name="delete_student" 
												value="<?= $row['id'];?>" class="btn btn-danger" style="font-size: 16px;">Delete
										</form>
									</td>
								</tr>

								<?php
										}
									}
									else
									{ 
								?>
									<tr>
										<td>
											<td colspan="4">No Record Found
										</td>
									</tr>
								<?php
									}
								?>
								
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
		<div class="page-info">
			<?php
				if(!isset($_GET['page-nr']))
				{
					$page = 1;
				}
				else
				{
					$page = $_GET['page-nr'];
				}
			?>
			Showing <?php echo $page ?> of <?=$page_number ?> pages

			<div class="pagi">
				<div class="pagination">
					<a href="?page-nr=1">First</a>
					<?php
						if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1)
						{
					?>
						<a href="?page-nr=<?php echo $_GET['page-nr'] - 1 ?>">Previous</a>
					<?php
						}
						else
						{
					?>
						<a>Previous</a>
					<?php
						}
					?>
					<div class="page-numbers">
						<?php
							for($i = 1;$i<=$page_number;$i++)
							{
						?>
								<a href="?page-nr=<?php echo $i?>"><?php echo $i?></a>
						<?php
							}
						?>
					</div>
					<?php
						if(isset($_GET['page-nr']))
						{
					?>
						<a href="?page-nr=2">Next</a>
					<?php
						}
						else
						{
							if($_GET['page-nr'] >= $page_number)
							{
					?>
								<a>Next</a>
					<?php		
							}
							else
							{
					?>
						<a href="?page-nr=<?php echo $_GET['page-nr'] + 1 ?>">Next</a>
					<?php
							}
						}
					?>
					
					<a href="?page-nr=<?php echo $page_number?>">Last</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>