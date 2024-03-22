<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Receipt</title>
    </head>
<body style="background-color:#aaa69d" ;>

<?php
session_start();
error_reporting(0);
include("config1.php");

  mysqli_query($con, 'START TRANSACTION');

  $querry = 'INSERT INTO transaction(ID,schedule) VALUES (?,NOW())';
  $ID =  $_SESSION['ID'];
  $flag = true;

  $stmt1 = mysqli_prepare($con, $querry);
  mysqli_stmt_bind_param($stmt1, 'i', $ID);

     mysqli_stmt_execute($stmt1);

  $transaclineID  = mysqli_insert_id($con);
  $querry2 = 'INSERT INTO transaction_line(transaclineID,petID,serviceID)VALUES (?, ?, ?)';
  $stmt2 = mysqli_prepare($con, $querry2);
  mysqli_stmt_bind_param($stmt2, 'iii', $transaclineID , $petID,$serviceID);
  
  foreach ($_SESSION["foobars"] as $cart_itm) {
    $nickname = $cart_itm["nickname"];
    $petID = $cart_itm["petID"];

  foreach ($_SESSION["foobar"] as $cart_itm) {
    $groomingtype = $cart_itm["groomingtype"];
    $costs = $cart_itm["costs"];
    $serviceID = $cart_itm["serviceID"];

    mysqli_stmt_execute($stmt2);

    if ((mysqli_stmt_affected_rows($stmt2) > 0)) {

      if ($flag == true) {
        mysqli_commit($con);
        echo "success";
        //header('Location: index.php');
      } else {
        mysqli_rollback($con);
        echo "fail";
      }
    }
  }
}
unset($_SESSION['foobars']);
unset($_SESSION['foobar']);

?>
</body>
</html>
