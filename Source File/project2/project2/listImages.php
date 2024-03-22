<?php
    require_once "config.php";
    $sql = "SELECT idemployee FROM employee ORDER BY idemployee DESC"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["idemployee"]; ?>" /><br/>
	
<?php		
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>