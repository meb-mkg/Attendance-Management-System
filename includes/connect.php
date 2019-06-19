<?php

	$servername = "//localhost:1521/orcl";
	$username = "attendance";
	$password = "1342";
	
	 // Create connection
 $conn = oci_connect($username, $password, $servername); 
if (!$conn) {
   $m = oci_error();
   echo $m['message'], "\n";
   exit;
    }


?>