<?php
$servername = "localhost";
$username = "users";
$password = "123456";
$dbName = "users";
$conn = new mysqli($servername,$username,$password,$dbName);

$user = mysqli_real_escape_string($conn, $_POST["username"]);

$sql = "SELECT * FROM users WHERE Username = '$user'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "$user";
	}
} else {
	echo "0 result";
}
$conn->close();
 ?>