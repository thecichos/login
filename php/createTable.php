<?php
	include "connection.php";

	if ($_conn->_connect_error) {
		echo "connection failed" . $_conn->connect_error;
	}
	echo "you haz success";
		$sql = "CREATE TABLE users (
			ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			Username char(50) NOT NULL,
			Password char(255) NOT NULL,
			Email char(255) NOT NULL
		)";
		if ($_conn->query($sql) === TRUE) {
			echo "Table created";
		} else {
			echo "you haz error " . $_conn->error;
		}
	$_conn->close();
 ?>
