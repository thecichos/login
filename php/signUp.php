<?php
	$servername = "localhost";
	$username = "users";
	$password = "123456";
	$dbName = "users";
	$user = $_POST["username"];
	$pass = $_POST["password"];
	$conn = new mysqli($servername,$username,$password,$dbName);
	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (Username, Password)
		VALUES ('$user', '$pass')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "enter another username";
	}
$conn->close();
 ?>
