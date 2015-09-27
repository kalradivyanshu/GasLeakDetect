<?php
	include "connect.php";
	$sql="SELECT val FROM gasval ORDER BY time DESC";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$sql = "SELECT * FROM notified ORDER BY time DESC";
	$result2 = $conn->query($sql);
	$row2 = $result2->fetch_assoc();
	if($row["val"] > 200 && $row2["yes"] == '0'){
		$url = 'http://api.pushover.net/1/messages.json';
		$fields = array(
								'token' => 'token',
								'user' => 'user',
								'message' => 'LEAK! A gas Leak has been detected!'
						);

		//url-ify the data for the POST
		$fields_string = "";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);
		$from = "gasleak@team.pi";
		$to = "email-id";
		$subject = "Gas Leak Detected";
		$body = "A Gas leak has been detected, please respond to this immediately!";
		$response = mail($to, $subject, $body, $from)
		$time = time();
		$sql = "INSERT INTO notified VALUES(2, '$time')";
		//echo $sql;
		$conn->query($sql);
	}
	else if($row["val"] < 200){
		$time = time();
		$sql = "INSERT INTO notified VALUES(0, '$time')";
		$conn->query($sql);
	}
	echo $row["val"];
	$conn->close();
?>