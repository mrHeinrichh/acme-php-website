<?php
// session_start();
// if (!isset($_SESSION['employee_id'])) {
// redirect_user();
// }
require ('dbconnection.php');


if ($_POST['submit'] ==  "submit"){

$petID = $_POST['petID'];
$conditionz = $_POST['conditionz'];
$ID = $_POST['ID'];
$disease = $_POST['disease'];

try {
   mysqli_query($conn,'START TRANSACTION');

$sql = "INSERT INTO hconsults (ID, petID, disease, note) 
       VALUES (?, ?, ?, ?)";

   $stmt2 = mysqli_prepare($conn, $sql);

   mysqli_stmt_bind_param($stmt2, 'iiss', $ID, $petID, $disease, $conditionz);

   mysqli_stmt_execute($stmt2);

   mysqli_commit($conn);

   header("location: index.php");

  }catch(mysqli_sql_exception $e) {
    mysqli_rollback($conn);
    echo "error";
   }

}
?>