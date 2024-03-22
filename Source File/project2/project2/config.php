<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
DEFINE('DB_SERVER', 'localhost');
DEFINE('DB_USERNAME', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_NAME', 'acmedata');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>