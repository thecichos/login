<?php
	include "connection.php";

	$user = mysqli_real_escape_string($_conn, $_POST["username"]);
	$oldPass = mysqli_real_escape_string($_conn, $_POST["oldpassword"]);
	$newPass = mysqli_real_escape_string($_conn, $_POST["newpassword"]);
	$newPassagain = mysqli_real_escape_string($_conn, $_POST["newpasswordagain"]);


	$sql = "SELECT * FROM users WHERE Username = '$user'";
	$result = $_conn->query($sql);


	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		if (password_verify($oldPass, $row["Password"])) {
			if ($newPass == $newPassagain) {
				$newPass = password_hash($newPass, PASSWORD_DEFAULT);
				$sql = "UPDATE users SET Password='$newPass' WHERE Username='$user'";
				if ($_conn->query($sql) === TRUE) {
					echo "password updated";
				} else {
					echo "Error: " . $sql . "<br>" . $_conn->error;
				}
			}
		}
	}
	} else {
		echo "enter another username";
	}
$_conn->close();
 ?>
