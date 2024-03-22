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
  $sql = "select * from petgrooming where serviceID = " . $new_product['serviceID'];
  $result = mysqli_query($con, $sql);
  //echo $result;
  $num_rows = mysqli_num_rows($result);
  //echo "There are currently $num_rows row(s) in the table<P>";
  //echo "<table border=1>\n"; anu toh haha
  while ($row = mysqli_fetch_array($result)) {
    //fetch product name, price from db and add to new_product array
    $new_product["groomingtype"] = $row['groomingtype'];
    $new_product["costs"] = $row['costs'];
    //var_dump($new_product);
    // exit();
    if (isset($_SESSION["foobars"])) {  //if session var already exist
      if (isset($_SESSION["foobars"][$new_product['serviceID']])) //check item exist in products array
      {
        unset($_SESSION["foobars"][$new_product['serviceID']]); //unset old array item
        var_dump($_SESSION["foobars"]);
        exit(); //buburahin pag clinick mo uli
      }
    }

    $_SESSION["foobars"][$new_product['serviceID']] = $new_product; //update or create product session with new item  
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
      unset($_SESSION["cart"][$key]);
    }
  }
}
echo "<pre>";
print_r($_SESSION);
//print_r($new_product);
echo "</pre>";
//back to return url
//$return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
echo '<a href="transac.php" class="button">Balik sa Transac</a>';
//header('Location:'.$return_url);
