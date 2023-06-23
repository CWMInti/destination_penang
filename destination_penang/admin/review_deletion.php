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
	
    $stmt1 = $conn->prepare("SELECT * FROM places_reviews where id = ?");
	$stmt1->bind_param ("s", $review_id);
	$stmt1->execute ();
	$result = $stmt1->get_result ();
	$row = $result->fetch_array ();
	$count = mysqli_num_rows($result);
	  
	if ($review_id == '') {
        ?>
        <h2><center>No ID was entered</center></h2>
        <h2><center><a href='admin_page.php'>Please enter the ID for review deletion</a><center></h2>
        <?php
    } else if($count == 1){  
        if (!$review_id == '') {
           $stmt = $conn->prepare("DELETE FROM places_reviews WHERE id = ?");
           $stmt->bind_param ("s", $review_id);
           
           if ($stmt->execute()) {
               ?>
               <h2><center>Review ID: <?php echo $review_id; ?> has been deleted</center></h2>
               <h2><center><a href='admin_page.php'>Back to Reviews Management</a><center></h2>
               <?php
           } else {
               echo "Error: " . $stmt->error;
           }
       }
   } else {
       ?>
       <h2><center>Review ID: <?php echo $review_id; ?> doesn't exist in the database</center></h2>
       <h2><center><a href='admin_page.php'>Back to Reviews Management</a><center></h2>
       <?php
   }
?>  
