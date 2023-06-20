<?php      
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "destination_penang";
	$form_nickname = $_POST['form_nickname'];
	$form_placename = $_POST['form_placename'];
	$form_placeaddress = $_POST['form_placeaddress'];
	$form_placereview = $_POST['form_placereview'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	if ($form_nickname == '') {
		echo "<h1><center>Please enter your nickname.</center></h1>";
		echo "<h2><center><a href='../places-reviews.php'>Check your review again</a><center></h2>";
	} else if ($form_placename == '') {
		echo "<h1><center>Please enter the place name.</center></h1>";
		echo "<h2><center><a href='../places-reviews.php'>Check your review again</a><center></h2>";
		} else if ($form_placeaddress == '') {
			echo "<h1><center>Please enter the place address.</center></h1>";
			echo "<h2><center><a href='../places-reviews.php'>Check your review again</a><center></h2>";
			} else if ($form_placereview == '') {
					echo "<h1><center>Your review is empty....</center></h1>";
					echo "<h2><center><a href='../places-reviews.php'>Check your review again</a><center></h2>";
				} else if (!$form_placereview == '') {
					$stmt = $conn->prepare("INSERT INTO places_reviews (nickname, place_name, place_address, place_review) VALUES (?, ?, ?, ?)");
					$stmt->bind_param ("ssss", $form_nickname, $form_placename, $form_placeaddress, $form_placereview);

					if ($stmt->execute()) {
						// Display a success message and the review details
						?>
						<h1><center>Thanks for your Review!</center></h1>
						<h2><center>Your review:</center></h2>
						<h3><center>Nickname: <?php echo $form_nickname; ?></center></h3>
						<h3><center>Place: <?php echo $form_placename; ?></center></h3>
						<h3><center>Address: <?php echo $form_placeaddress; ?></center></h3>
						<h3><center><?php echo $form_placereview; ?></center></h3>
						<h2><center><a href='../places-reviews.php'>Back to Places Reviews</a><center></h2>
						<?php
					} else {
						// Display an error message
						echo "Error: " . $stmt->error;
					}
				}
?>  
