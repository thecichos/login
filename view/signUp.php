<?php
	include "connection.php";

	$user = mysqli_real_escape_string($_conn, $_POST["username"]);
	$pass = mysqli_real_escape_string($_conn, $_POST["password"]);

	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $_conn->query($sql);
	if ($result->num_rows == 0) {
		$pass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users (Username, Password)
		VALUES ('$user', '$pass')";
		if ($_conn->query($sql) === TRUE) {
			echo "user created";
		} else {
			echo "Error: " . $sql . "<br>" . $_conn->error;
		}
	} else {
		echo "enter another username";
	}
$_conn->close();
 ?>
