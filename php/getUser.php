<?php
    include "connection.php";

    $user = mysqli_real_escape_string($_conn, $_POST["username"]);

    $sql = "SELECT * FROM users WHERE Username = '$user'";
    $result = $_conn->query($sql);
    if ($result->num_rows > 0) {
    	while ($row = $result->fetch_assoc()) {
    		echo "$user";
    	}
    } else {
    	echo "0 result";
    }
    $_conn->close();
 ?>
