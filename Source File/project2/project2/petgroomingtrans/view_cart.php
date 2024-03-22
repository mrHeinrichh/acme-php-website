<?php
session_start();
$con=mysqli_connect("localhost", "root", "", "acmedata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if (isset($_POST['submit'])) { 
 $_SESSION['ID'] = $_POST['ID'];
 $_SESSION['custid'] = $_POST['custid'];

 } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #fff;
    background: #63738a;
    font-family: 'Roboto', sans-serif;
}
.form-control {
    height: 40px;
    box-shadow: none;
    color: #969fa4;
}
.form-control:focus {
    border-color: #5cb85c;
}
.form-control, .btn {        
    border-radius: 3px;
}
.signup-form {
    width: 450px;
    margin: 0 auto;
    padding: 30px 0;
    font-size: 15px;
}
.signup-form h2 {
    color: #636363;
    margin: 0 0 15px;
    position: relative;
    text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
}   
.signup-form h2:before {
    left: 0;
}
.signup-form h2:after {
    right: 0;
}
.signup-form .hint-text {
    color: #999;
    margin-bottom: 30px;
    text-align: center;
}
.signup-form form {
    color: #999;
    border-radius: 3px;
    margin-bottom: 15px;
    background: #f2f3f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.signup-form .form-group {
    margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
    margin-top: 3px;
}
.signup-form .btn {        
    font-size: 16px;
    font-weight: bold;      
    min-width: 140px;
    outline: none !important;
}
.signup-form .row div:first-child {
    padding-right: 10px;
}
.signup-form .row div:last-child {
    padding-left: 10px;
}       
.signup-form a {
    color: #fff;
    text-decoration: underline;
}
.signup-form a:hover {
    text-decoration: none;
}
.signup-form form a {
    color: #5cb85c;
    text-decoration: none;
}   
.signup-form form a:hover {
    text-decoration: underline;
}  
</style>
</head>
<body>

<div class="signup-form">
<form method="post" action="up_cart.php">
<h1 align="center">View Cart</h1>

<table width="100%"  cellpadding="6" cellspacing="0"><thead><tr><th></th><th>Name</th><th>Service</th><th>Price</th><th>Subtotal</th><th>Remove</th></tr></thead>
  <tbody>
  <?php
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
if(isset($_SESSION["cart_products"])) //check session var
    {
      $total = 0; //set initial total value
      $b = 0; //var for zebra stripe table 
foreach ($_SESSION["cart_products"] as $cart_itm)
        {
//set variables to use in content below
        $product_name = $cart_itm["groomingtype"];
        $product_qty = $cart_itm["item_qty"];
        $product_price = $cart_itm["costs"];
        $product_color = $cart_itm["petID"];
        $product_code = $cart_itm["serviceID"];
          $subtotal = ($product_price * $product_qty); //calculate Price x Qty
          $bg_color = ($b++%2==1) ? 'odd' : 'even'; //class for zebra stripe 
   echo '<tr class="'.$bg_color.'">';
  echo '<td><input type="hidden" size="2" maxlength="2" name="product_qty['.$product_qty.']" value="'.$product_qty.'" /></td>';

 // echo '<td>'.$product_color.'</td>';

$sqlq="Select * from petgrooming  where serviceID = $product_code";
$dwe = mysqli_query($con,$sqlq);

$row3 = mysqli_fetch_array($dwe);

$sql="Select * from pet where petID = $product_color";
$w = mysqli_query($con,$sql);
 
$w1 = mysqli_fetch_array($w); 
    echo '<td>'.$w1['nickname'].'</td>';
  echo '<td>'.$row3['groomingtype'].'</td>';
  echo '<td>'.$row3['costs'].'</td>';

  echo '<td>'.$subtotal.'</td>';
  echo '<td><input type="checkbox" name="remove_code['.$product_code.']" value="'.$product_code.'" /></td>';
  echo '</tr>';
$total = ($total + $subtotal); //add subtotal to total var

        }

}

?>
    <tr><td colspan="5"><span style="float:right;text-align: right;">Amount Payable : <?php echo sprintf("%01.2f", $total); ?></span></td></tr>
    <tr><td colspan="5"><a href="select.php" class="button">Add More Items</a>
    <button type="submit">Update</button></td>
<td colspan="5"><a href="checkout.php" class="button">checkout</a></td>
</tr>
</tbody>
</table>
<input type="hidden" name="return_url" value="<?php 
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
echo $current_url; ?>" />
</form>
</div>
</body>
</html>