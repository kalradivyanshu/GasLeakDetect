<?php
	include "connect.php";
	$sql = "SELECT * FROM data ORDER BY time DESC";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	if(isset($_GET["humidity"]))
		echo $row["humidity"];
	else
		echo $row["temperature"];
?>