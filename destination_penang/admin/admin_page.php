<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page for Destination Penang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">​
	<script src="session_script.js"></script>
</head>

<body onload="checkCookie2()">
	<div class="container">
		<div class="page">
				<div class="row justify-content-center">
					<div class="col-auto">
						<h2 class="h2">Reviews Management</h2>
                        <input type="button" id="logoutbtn" value="log out" onclick="deleteCookie()"><br><br>
						<?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "destination_penang";

                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        $sql = "SELECT * FROM places_reviews";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            echo "ID: " . $row["id"]. "<br>Nickname: " . $row["nickname"]. "<br>Place:<br>" . $row["place_name"]. "<br>Address:<br>" . $row["place_address"]. "<br>Rating:<br>" . $row["place_rating"].  "<br>Review:<br>" . $row["place_review"]. "<br>";
                            echo "<p>-----------------</p>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                        ?> 
                        <h4>Review Deletion</h4>
                        <p>WARNING, this action is irrevesible</p>
                        <form action = "review_deletion.php" method = "POST">
                            <input
                                type="text"
                                id="review_id"
                                name="review_id"
                                placeholder="ID of review for deletion"
                            />
                            <br><button type="submit" value="submit">
                                Delete Review
                            </button><br><br><br>
                        </form>
					</div>
				</div>
		</div>
	</div>
	
</body>
</html>
