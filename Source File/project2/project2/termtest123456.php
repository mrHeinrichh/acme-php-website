<?php
session_start();
//error_reporting(0);
include("config1.php");
?>
<!DOCTYPE html>
<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>View shopping cart</title>
        <link href="./transaction/style.css" rel="stylesheet" type="text/css">
</head>

<body>
        <h1 align="center">View Cart</h1>
        <div class="cart-view-table-back">
                <form method="POST" action="termtest12345.php">

      
                        <table width="150%" cellpadding="6" cellspacing="2">
                                <thead>
                                        <tr>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Remove</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        
                                        <?php
                                        //echo "<pre>";
                                        //print_r($_SESSION);
                                        //echo "</pre>";
                                        if (isset($_SESSION["foobars"])) //check session var
                                        {
                                                $total = 0; //set initial total value
                                                $b = 0; //var for zebra stripe table 
                                                foreach ($_SESSION["foobars"] as $cart_itm) {
                                                        //set variables to use in content below
                                                        //$Name = $cart_itm["Pet_name"];
                                                        $groomingtype = $cart_itm["groomingtype"];
                                                        $costs = $cart_itm["costs"];
                                                        //$Pet_id = $cart_itm["Pet_id"];
                                                        $serviceID = $cart_itm["serviceID"];
                                                        $subtotal = ($costs);
                                                        $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //class for zebra stripe 
                                                        echo '<tr class="' . $bg_color . '">';
                                                        echo '<td>' . $groomingtype . '</td>';
                                                        echo '<td>' . $costs . '</td>';
                                                     
                                                        echo '<td><input type="checkbox" name="remove_code[]" value="' . $serviceID . '" /> Remove</td>';
                                                     
                                                        echo '</tr>';
                                                        $total = ($total + $subtotal); 
                                                }
                                        }
                                        ?>
                                        <tr>
                                                <td colspan="5"><a href="transac.php" class="button">Add More Services</a>
                                                        <button type="submit">Update</button>
                                                         
                                                       <a href="checkout.php" value = "save" class="button">Checkout</a>
                                                </td>
                                           
                                        </tr>
                                </tbody>
                        </table>
                        <input type="hidden" name="return_url" value="<?php
                                                                        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
                                                                        echo $current_url; ?>" />
                </form>
        </div>
</body>

</html>