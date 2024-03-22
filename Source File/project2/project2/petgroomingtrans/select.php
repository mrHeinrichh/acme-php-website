<?php 
//Databse conection file
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

 <?php



$custid = $_SESSION['custid'];
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$sql = "SELECT * from pet WHERE custid = $custid";
$results = mysqli_query($con,$sql);
if($results){ 
    echo '<div class="row" align="center" style="padding-left:50px;padding-top:10px;padding-bottom:10px">';
     echo '';
//fetch results set as object and output HTML
     while ($row = mysqli_fetch_array($results)) {
       echo '
        <div class="column" style="padding-right:10px">
            <form method="POST" action="cart_update.php">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="../petcrud/profilepics/'.$row['ProfilePic'].'" alt="Card image cap" height=200px>
               <p style="color:black;">'.$row['nickname'].'</p>
                <div class="product-info">
                <fieldset>
                <label>
            
                <center>
                <select name="serviceID"> ';
                    

                 $sql1 = "select * from petgrooming";
                 $results1 = mysqli_query($con,$sql1);
                while ($rows1 = mysqli_fetch_array($results1)){ 
                    echo "<option value='".$rows1['serviceID']."'>".$rows1['groomingtype'].' | $'.$rows1['costs']."</option>";
                    
                    
                        } 


                echo '  </select>
                
                </center>
                </label>
                <label>
                <span></span>
                <input type="hidden" size="2" maxlength="2" name="item_qty" value="1" />
                </label>
                </fieldset>
                <input type="hidden" name="petID" value="'.$row['petID'].'" />
                <input type="hidden" name="item_price" value="0" />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="return_url" value="'.$current_url.'" />
                <div align="center"><button type="submit" class="add_to_cart">Add</button></div>
                </div>
                </div>
                </div>
             </form>
        
';
     
}
echo '</div>';
//echo $products_item;

}
?>
</div>
<?php
if(isset($_SESSION["cart_products"]) && count($_SESSION["cart_products"])>0)
{
    echo '<div class="signup-form" id="view-cart"><form method="POST" action="cart_update.php">
    <div class="form-group">
    <h3 align="center">Your Selected Pet</h3>
    </div>
    <p align="center">Fill below form.</p>
    
    <table width="100%"  cellpadding="6" cellspacing="0">
    <tbody>';
    $total =00;
    $b = 0;
    
    foreach ($_SESSION["cart_products"] as $cart_itm) {

        $product_name = $cart_itm["groomingtype"];
        $product_qty = 1;
        $product_price = $cart_itm["costs"];
        $product_color = $cart_itm["petID"];
        $product_code = $cart_itm["serviceID"];
        $subtotal = ($product_price * $product_qty);
        $total = ($total + $subtotal);
        $bg_color = ($b++%2==1) ? 'odd' : 'even'; //zebra stripe
        echo '<tr class="'.$bg_color.'" align="center">';
        echo '<td><input type="hidden" size="2" maxlength="2" name="product_qty['.$product_code.']" value="'.$product_qty.'" /></td>';
        echo '<td>'.$product_name.'</td>';
        echo '<td><input type="checkbox" name="remove_code['.$product_code.']" value="'.$product_code.'" /> Remove</td>';
        echo '</tr>';
        
    }
    echo '<td colspan="4" align="center">
    Total price = $'.$total.'</br>
    <button type="submit">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="view_cart.php">Checkout</a>
    </td>
    </tbody>
    </table>';

    $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
    echo '</form>';
    echo '</div>';
}
?>
</body>
</html>
