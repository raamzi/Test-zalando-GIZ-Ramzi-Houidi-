<?php
// i am assuming these variables are taken at the beginning
$code = "maze-1";
$w = 3;
$h = 3;
$x = 1;
$y = 0;
if(isset($_POST['submit'])){
	$direction = $_POST['direction'];

	$url ="http://localhost:8080/mazes/".$code."/position";

	$client = curl_init($url);
	curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
	$respond = curl_exec($client);
	$result = json_decode($respond);
	if($result->field == "."){
		$x = $result->position->x;
		$y = $result->position->y;
	}elseif ($result->field == "#") {
		echo "you win !!!";
	}

}

?>