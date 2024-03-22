<?php
 
// Store File in a name : DisplayPhoto.php 
 
$host = '127.0.0.1';
$user = 'root';
$pass = 'your_password';
$db = 'database_name';
 
 // some basic sanity checks
 if(isset($_GET['id']) && is_numeric($_GET['id'])) {
     //connect to the db
     $link = mysql_connect("$host", "$user", "$pass")
     or die("Could not connect: " . mysql_error());
 
     // select our database
     mysql_select_db("$db") or die(mysql_error());
 
     // get the image from the db
     $sql = "SELECT image FROM storeimages WHERE id=" .$_GET['id'] . ";";
 
     // the result of the query
     $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
 
     // set the header for the image
     header("Content-type: image/jpeg");
     echo mysql_result($result, 0);
 
     // close the db link
     mysql_close($link);
 }
 else {
     echo 'Please use a real id number';
 }
?>