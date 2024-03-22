<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pick A Pet</title>
    <link href="./transaction/style.css" rel="stylesheet" type="text/css">
</head>

<body>

    <?php
    if (isset($_SESSION["foobar"]) && count($_SESSION["foobar"]) > 0) {
        echo '<div class="cart-view-table-front" id="view-cart">'; //first table kaya ito inuna at di pwede ilagay sa huli kasi di lalabas
        echo '<h3>Your Choosen Pets</h3>';
        echo '<form method="POST" action="termtest123.php">'; //gumamit post
        echo '<table width="100%"  cellpadding="6" cellspacing="0">';
        echo '<tbody>';

        $b = 0;
        foreach ($_SESSION["foobar"] as $cart_itm) {
            //var_dump($cart_itm);
            //exit();
            $nickname = $cart_itm["nickname"];
            $petID = $cart_itm["petID"];
            $bg_color = ($b++ % 2 == 1) ? 'odd' : 'even'; //zebra stripe
            echo '<tr class="' . $bg_color . '">';
            echo '<td>' . $nickname . '</td>';
            //echo '<td><input type="text" value="'.$Cust_id.'"></td>';
            echo '<td><input type="checkbox" name="remove_code[]" value="' . $petID . '" /> Remove</td>';
            echo '</tr>';
            //$subtotal = ($product_price * $product_qty);
            //$total = ($total + $subtotal);
        }
        echo '<td colspan="4">';
        echo '<button type="submit">Update</button>
        <a href="termtest1234.php" class="button">Go To Service</a>';
        echo '</td>';
        echo '</tbody>';
        echo '</table>';

        $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
        echo '</form>';
        echo '</div>';
    }
    ?>

    <?php
    //var_dump($_SESSION);
    if (isset($_POST['submit'])) { 
        $_SESSION['custid'] = $_POST['custid'];
        $_SESSION['Employee_id'] = $_POST['Employee_id'];
        } 
        $custid = $_SESSION['custid'];
    include "config1.php";

    $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $sql = "SELECT p.petID AS petID, p.nickname AS nickname, p.ProfilePic AS ProfilePic FROM pet p INNER JOIN customer c ON p.custid = c.custid WHERE p.custid = $custid";
    $result = mysqli_query($con,$sql);
    if ($result) {
        echo '<ul class="products">';
        while ($row = mysqli_fetch_array($result)) {
            echo '
    <li class="product">
        <form method="POST" action="termtest123.php">
            <div class="product-thumb"><img src="'.$row['ProfilePic'].'" width=180px height=200px></div>
            <div class="product-info">nickname:'.$row['nickname'].'
            <br></br>
            <input type="hidden" name="petID" value="'.$row['petID'].'" />
            <input type="hidden" name="type" value="add" />
            <input type="hidden" name="return_url" value="{$current_url}" />
            <div align="center"><button type="  " class="add_to_cart">Pick A Pet</button></div>
            </div></div>
         </form>
    </li>
    ';
        }
        echo '</ul>';
    }
    ?>
</body>

</html>