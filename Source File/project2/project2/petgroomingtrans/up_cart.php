<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "acmedata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
if(isset($_POST["remove_code"]))
{
//remove an item from product session
if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
foreach($_POST["remove_code"] as $key){
unset($_SESSION["cart_products"][$key]);
}
}
}
echo "<pre>";
    // print_r($_SESSION);
     //print_r($new_product);
     echo "</pre>";
//back to return url
$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
 header('Location: view_cart.php');
?>