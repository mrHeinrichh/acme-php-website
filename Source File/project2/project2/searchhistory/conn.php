<?php
	$conn = new mysqli('localhost', 'root', '', 'acmedata');
 
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
 
?>