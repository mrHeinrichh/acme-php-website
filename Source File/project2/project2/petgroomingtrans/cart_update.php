<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "acmedata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
//add product to session or create new one
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
    foreach($_POST as $key => $value){ //add all post vars to new_product array
        $new_product[$key] = $value;
    }
// var_dump($new_product);
// exit();
//remove unecessary vars
unset($new_product['type']);
unset($new_product['return_url']);
// var_dump($new_product);
// exit(); 
  //we need to get product name and price from database.
    $sql = "SELECT * FROM petgrooming where serviceID = ". $new_product['serviceID'];
    $result = mysqli_query( $con, $sql);
 //echo $result;
 $num_rows = mysqli_num_rows( $result );
echo "There are currently $num_rows rows in the table<P>";
echo "<table border=1>\n";
  while ($row = mysqli_fetch_array($result)) {  
//fetch product name, price from db and add to new_product array
        $new_product["groomingtype"] = $row['groomingtype']; 
        $new_product["costs"] = $row['costs'];//         var_dump($new_product);
// exit();
        if(isset($_SESSION["cart_products"])){  //if session var already exist
            if(isset($_SESSION["cart_products"][$new_product['serviceID']])) //check item exist in products array
            {
                unset($_SESSION["cart_products"][$new_product['serviceID']]); //unset old array item
              
            }           
        }
        $_SESSION["cart_products"][$new_product['serviceID']] = $new_product; 

         header('Location: select.php');
    } 
}
//update or remove items 
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
 header('Location: select.php');
?>