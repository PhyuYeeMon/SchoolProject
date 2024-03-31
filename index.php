<?php
	session_start();
	error_reporting(0);
	session_destroy();

	if($_SESSION['message'])
	{
		$message =$_SESSION['message'];
		echo "<script type='text/javascript'>
		alert('$message');
		</script>";
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student Management System</title>
	<link href="style/style.css" rel="stylesheet" type="text/css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<nav>
		<label class="logo">W-School</label>
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Admission</a></li>
			<li><a href="login.php" class="btn btn-success">Login</a></li>
		</ul>
	</nav>
	<div class="section1">
		<label class="img_text">We Teach Students With Care</label>
		<img class="main_img" src="images/school1.jpg">
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img class="welcome_img" src="images/school2.jpg">
			</div>
			<div class="col-md-8">
				<h1> Welcome to W-School</h1>
				<p>The school is divided into 4 blocks – Nursery which has 2 classrooms and a large Outdoor Play area. Foundation Stage and Key Stage One which has 6 classrooms. Key Stage 2 which has 6 classrooms. A central block houses the Offices, Staffroom, Assembly Hall, Dinner Hall and Kitchen. There is a Library and a Computer Suite complete. There are also three mobiles in the grounds and 2 large playgrounds complete with colourful markings and the school has its own all-weather pitch.Ballyoran Primary School has long been known locally for its welcoming, friendly atmosphere and its happy, caring, safe and stimulating learning environment. It has a strong pastoral ethos and all the schools’ stakeholders are highly valued. A high standard of discipline is expected from all pupils and the school promotes positive behaviour management through a programme of rules, rewards and consequences.</p>
			</div>
		</div>
	</div>
	<center>
		<h1>Our Teacher</h1>
	</center>
	<div class="container">
		<div class="col-md-4">
			<img class="teacher" src="images/Teacher1.jpg">
			<p></p>
		</div>
		<div class="col-md-4">
			<img class="teacher" src="images/Teacher2.jpg">
			<p></p>
		</div>
		<div class="col-md-4">
			<img class="teacher" src="images/Teacher3.jpg">
			<p></p>
		</div>
	</div>

	<center>
		<h1>Our Courses</h1>
	</center>
	<div class="container">
		<div class="col-md-4">
			<img class="teacher" src="images/course1.png">
			<p>Web Developer</p>
		</div>
		<div class="col-md-4">
			<img class="teacher" src="images/Graphics.jpg">
			<p>Graphic Design</p>
		</div>
		<div class="col-md-4">
			<img class="teacher" src="images/Marketing.jpg">
			<p>Marketing</p>
		</div>
	</div>
	<center>
		<h1 class="adm">Admission Forms</h1>
	</center>
	<div align="center" class="admission">
		<form action="data_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">Name</label>
				<input class="input_deg" type="text" name="name">
			</div>
			<div class="adm_int">
				<label class="label_text">Email</label>
				<input class="input_deg" type="text" name="email">
			</div>
			<div class="adm_int">
				<label class="label_text">Phone</label>
				<input class="input_deg" type="text" name="phone">
			</div>
			<div class="adm_int">
				<label class="label_text">Message</label>
				<textarea class="input_txt" name="message"></textarea>
			</div>
			<div>
				
				<input class="btn btn-primary" id="submit" type="submit" value="apply" name="apply">
			</div>
		</form>
	</div>
	<footer>
		<h3 class="footer_text">All @copyright reserved by web tech knowledge</h2>
	</footer>
</body>
</html>