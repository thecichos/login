<?php
	$servername = "localhost";
	$username = "root";
	$password = "ap10va4you";
	$dbName = "acari";
	$conn = new mysqli($servername,$username,$password,$dbName);

	$user = mysqli_real_escape_string($conn, $_POST["username"]);
	$pass = mysqli_real_escape_string($conn, $_POST["password"]);

	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (Username, Password)
		VALUES ('$user', '$pass')";
		if ($conn->query($sql) === TRUE) {
			echo $user;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	} else {
		echo "enter another username";
	}
$conn->close();
 ?>
