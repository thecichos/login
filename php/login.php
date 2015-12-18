<?php
	include "connection.php";

	$user = mysqli_real_escape_string($_conn, $_POST["username"]);
	$pass = mysqli_real_escape_string($_conn, $_POST["password"]);

	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $_conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			if (password_verify($pass, $row["Password"])) {
				echo "logged in";
			} else {
				echo "wrong password";
				echo error();
			}
		}
	} else {
		echo "0 result";
	}
	$_conn->close();

 ?>
