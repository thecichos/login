<?php
	$servername = "localhost";
	$username = "users";
	$password = "123456";
	$dbName = "users";
	$conn = new mysqli($servername,$username,$password,$dbName);
	if ($conn->connect_error) {
		echo "connection failed" . $conn->connect_error;
	}
	echo "you haz success";
		$sql = "CREATE TABLE users (
			ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Username char(50) NOT NULL,
			Password char(255) NOT NULL,
			Email char(255) NOT NULL
		)";
		if ($conn->query($sql) === TRUE) {
			echo "Table created";
		} else {
			echo "you haz error " . $conn->error;
		}
	$conn->close();
 ?>
