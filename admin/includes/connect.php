<?php

$servername = "//localhost:1521/orcl";
$username = "attendance";
$password = "";

	 // Create connection
$conn = oci_connect($username, $password, $servername); 
if (!$conn) {
	$m = oci_error();
	echo $m['message'], "\n";
	exit;
}
?>