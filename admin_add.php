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
			<div class="col-md-8 mt-4">
				<div class="card">
					<div class="card-header">
						<h3>
							Admin Add
						</h3>
						<a href="admission.php" class="btn btn-primary float-end">Back
						</a>
					</div>
					<div class="card-body">
						<form action="admin_exec.php" method="POST">
							<div class="mb-3">
								<label>Name</label>
								<input type="text" name="name" class="form-control" />
							</div>
							<div class="mb-3">
								<label>Email</label>
								<input type="text" name="email" class="form-control" />
							</div>
							<div class="mb-3">
								<label>PhoneNo</label>
								<input type="text" name="phone" class="form-control" />
							</div>
							<div class="mb-3">
								<label>Message</label>
								<input type="textarea" name="message" class="form-control" />
							</div>
							<div>
								<button type="submit" name="save" class="btn btn-primary">Save</button>
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