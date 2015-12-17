<?php
	$servername = "localhost";
	$username = "users";
	$password = "123456";
	$dbName = "users";
	$conn = new mysqli($servername,$username,$password,$dbName);

	$user = mysqli_real_escape_string($conn, $_POST["username"]);
	$oldPass = mysqli_real_escape_string($conn, $_POST["oldpassword"]);
	$newPass = mysqli_real_escape_string($conn, $_POST["newpassword"]);
	$newPassagain = mysqli_real_escape_string($conn, $_POST["newpasswordagain"]);


	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $conn->query($sql);


	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		if (password_verify($oldPass, $row["Password"])) {
			if ($newPass == $newPassagain) {
				$newPass = password_hash($newPass, PASSWORD_DEFAULT);
				$sql = "UPDATE users SET Password='$newPass' WHERE Username='$user'";
				if ($conn->query($sql) === TRUE) {
					echo "password updated";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}
	}
	} else {
		echo "enter another username";
	}
$conn->close();
 ?>
