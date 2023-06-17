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
        echo "<h1><center>Your review is empty....</center></h1>";
        echo "<h2><center><a href='admin_page.php'>Please enter the id for review deletion</a><center></h2>";
    } else if (!$review_id == '') {
        $sql = "DELETE FROM places_reviews WHERE id=$review_id";
        
        if ($conn->query($sql) === TRUE) {
            echo "<h3><center>Review ID: $review_id has been deleted successfully</center></h3>";
            echo "<h2><center><a href='admin_page.php'>Back to Reviews Management</a><center></h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>  