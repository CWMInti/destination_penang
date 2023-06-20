<?php      
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "destination_penang";
	$review_id = $_POST['review_id'];

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
    if ($review_id == '') {
        ?>
        <h1><center>No ID was entered</center></h1>
        <h2><center><a href='admin_page.php'>Please enter the ID for review deletion</a><center></h2>
        <?php
    } else if (!$review_id == '') {
        $sql = "";
        $stmt = $conn->prepare("DELETE FROM places_reviews WHERE id = ?");
		$stmt->bind_param ("s", $review_id);
        
        if ($stmt->execute()) {
            ?>
            <h3><center>Review ID: <?php echo $review_id; ?> has been deleted</center></h3>
            <h2><center><a href='admin_page.php'>Back to Reviews Management</a><center></h2>
            <?php
        } else {
            echo "Error: " . $stmt->error;
        }
    }
?>  
