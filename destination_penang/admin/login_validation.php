<?php      
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "destination_penang";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $admin_username = $_POST['admin_username'];  
    $admin_password = $_POST['admin_password'];  
	$cookie_name = "adminlogin";
      
	$stmt = $conn->prepare("SELECT * FROM admin_accounts where admin_username = ? and admin_password = ?");
	$stmt->bind_param ("ss", $admin_username, $admin_password);
	$stmt->execute ();
	$result = $stmt->get_result ();
	$row = $result->fetch_array ();
	$count = mysqli_num_rows($result);
	  
	if($count == 1){  
		echo "<h1><center> Login successful </center></h1>";
		echo "<h2><center><a href='admin_page.php'>Proceed</a><center></h2>";
		setcookie($cookie_name, $admin_username, time() + (86400 * 30), "/");
	}  
	else{  
		echo "<h1><center> Login failed. Invalid username or password. </center></h1>";
		echo "<h2><center><a href='admin_login.php'>Back to Admin Login</a><center></h2>";
	}

	$stmt->close();
	$conn->close();
?>  
