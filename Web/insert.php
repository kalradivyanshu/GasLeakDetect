<?php
	include "connect.php";
	$val=$_GET["value"];
	$time = time();
	$sql="INSERT INTO gasval VALUES('$val','$time')";
	$conn->query($sql);
	$conn->close();
?>