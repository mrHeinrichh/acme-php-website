<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Blob File MySQL</title>
</head>
<body>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=acmedata", "root", "");
    if(isset($_POST['btn'])){
        $name = $_FILES['myfile']['imagename'];
        $type = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $stmt-> $dbh->prepare("insert into employee values('',?,?,?)");
        $stmt->bindParam(1,$imagename);
        $stmt->bindParam(3,$type);
        $stmt->bindParam(2,$photo);
        $stmt->execute();
    }
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <button name="btn">Upload</button>
</form>
</body>
</html>