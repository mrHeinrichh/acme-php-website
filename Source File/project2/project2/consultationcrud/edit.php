<?php 
//Database Connection
include('dbconnection.php');
$eid=$_GET['editid'];



if(isset($_POST['submit']))
  {
  	//getting the post values

    $petID=$_POST['petID'];
    $ID=$_POST['ID'];
    $conditionz=$_POST['conditionz'];
    $consult_date=$_POST['consult_date'];
    $comment=$_POST['comment'];

try {
   mysqli_query($con,'START TRANSACTION');

	$query = "UPDATE hconsultation SET petID = ? , ID = ?, conditionz = ?, hc_date = ?, note = ? where HCID = ".$eid ;
   $stmt = mysqli_prepare($con, $query);
   mysqli_stmt_bind_param($stmt, 'iisss', $petID,$ID,$conditionz,$consult_date,$comment);
   mysqli_stmt_execute($stmt);
   mysqli_commit($con);
   header("location: index.php");

  }catch(mysqli_sql_exception $e) {
    mysqli_rollback($con);
   }

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
    <form  method="POST">
 <?php

$ret=mysqli_query($con,"select * from hconsultation hc INNER JOIN pet p ON p.petID = hc.petID INNER JOIN tblusers u ON u.ID = hc.ID INNER JOIN customer c ON c.custid = p.custid where HCID='$eid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		<h2>Update </h2>
		<p class="hint-text">Update your info.</p>

	

        <div class="form-group">
			<div class="row">
			<div class="col"><input type="text" class="form-control" name="ownername" required="true" value="<?php echo $row['name'];?>" required="true" readonly></div>
				<div class="col"><input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" required="true"readonly></div>

			</div>        	
        </div>
        
        <div class="form-group">
        	<input type="text" class="form-control" name="contact" value="<?php echo $row['contact'];?>" required="true" readonly>
        </div>
      
       <div class="form-group">
        	<select id="petID" name="petID" class="form-control" value="<?php echo $row['nickname'] .' owner is '.$row['name'];?>">
         <?php
          $results = 
        mysqli_query($con, "select * from pet p INNER JOIN customer c ON p.custid = c.custid   ");
          while($row1=mysqli_fetch_assoc($results)) {
            echo '<option value=' . $row1['petID'] . '>' .$row1['nickname'] .' owner is '.$row1['name'] .'</option>';
         }
        ?>
        </select>
        </div>

        <div class="form-group">
        	<select id="ID" name="ID" class="form-control">
         <?php
          $results2 = mysqli_query($con, "select * from tblusers");
          while($row2=mysqli_fetch_assoc($results2)) {
            echo '<option value=' . $row2['ID'] . '>'.$row2['FirstName'].' '.$row2['LastName'] .'</option>';
         }
        ?>
        </select>
        </div>
      
      
      <div class="form-group">
        	<input type="text" class="form-control" name="conditionz" value="<?php echo $row['conditionz'];?>" required="true">
        </div>

         <div class="form-group">
        	<input type="date" class="form-control" name="consult_date" value="<?php echo $row['hc_date'];?>" required="true">
        </div>
      
      
      <div class="form-group">
        	<input type="text" class="form-control" name="comment" value="<?php echo $row['note'];?>" required="true">
        </div>
      
     

<?php 
}?>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>