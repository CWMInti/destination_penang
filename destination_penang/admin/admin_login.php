<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login for Destination Penang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">​
	<script src="session_script.js"></script>
</head>

<body onload="checkCookie1()">
	<div class="container">
		<div class="page">
				<div class="row justify-content-center">
					<div class="col-auto">
						<h2 class="h2">Admin Log In</h2><br>
						
						<form action = "login_validation.php" onsubmit = "return validate()" method = "POST">
							<label for="admin_username">Username:</label><br>
							<input type="text" id="admin_username" name="admin_username"><br>
							
							<label for="admin_password">Password:</label><br>
							<input type="admin_password" id="admin_password" name="admin_password"><br><br>
							
							<input type="submit" id="loginbtn" value="submit">
						</form>
					</div>
				</div>
		</div>
	</div>
	
</body>
</html>