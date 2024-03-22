<?php
session_start();
include("config1.php");
//add product to session or create new one
if (isset($_POST["type"]) && $_POST["type"] == 'add') {
  foreach ($_POST as $key => $value) { //add all post vars to new_product array
    $new_product[$key] = $value;
  }
  //var_dump($new_product);
  //exit();
  //remove unecessary vars
  unset($new_product['type']); //para di sumama yung value neto kaya may gento
  unset($new_product['return_url']);
  //var_dump($new_product);
  //exit(); 
  //we need to get product name and price from database.
  $sql2 = "select * from pet where petID = " . $new_product['petID'];

  $results = mysqli_query($con, $sql2);
  //echo $result;
  $num_row = mysqli_num_rows($results);
  //echo "There are currently $num_rows row(s) in the table<P>";
  //echo "<table border=1>\n"; anu toh haha

while ($rows = mysqli_fetch_array($results)) {
  //fetch product name, price from db and add to new_product array
  $new_product["nickname"] = $rows['nickname'];
  //var_dump($new_product);
  // exit();
  if (isset($_SESSION["foobar"])) {  //if session var already exist
    if (isset($_SESSION["foobar"][$new_product['petID']])) //check item exist in products array
    {
      unset($_SESSION["foobar"][$new_product['petID']]); //unset old array item
      var_dump($_SESSION["foobar"]);
      exit(); //buburahin pag clinick mo uli
    }
  }

  $_SESSION["foobar"][$new_product['petID']] = $new_product; //update or create product session with new item  
  //var_dump($_SESSION["cart_products"]);
  //exit();
}
}

//update or remove items 
if (isset($_POST["remove_code"])) {
  //update item quantity in product session
  //if(isset($_POST["product_qty"]) && is_array($_POST["product_qty"])){
  //  echo "<pre>";
  // print_r($_POST);
  //$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  //echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
  //print_r($new_product);
  //echo "</pre>";
  //foreach($_POST["product_qty"] as $key => $value){
  //if(is_numeric($value)){
  //$_SESSION["cart_products"][$key]["item_qty"] = $value ;
  //}
  //}
  //}

  //remove an item from product session
  if (isset($_POST["remove_code"]) && is_array($_POST["remove_code"])) {
    foreach ($_POST["remove_code"] as $key) {
      echo $key;
      unset($_SESSION["foobar"][$key]);
    }
  }
}
echo "<pre>";
print_r($_SESSION);
//print_r($new_product);
echo "</pre>";
//back to return url
//$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
echo '<a href="termtest12.php" class="button">Balik sa Transac</a>';
//header('Location:'.$return_url);
//edited in nano
