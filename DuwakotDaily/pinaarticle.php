<?php

require_once('Config.php');

if (isset($_POST['submit'])) {

$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "useruploads/".$filename;
$news = $_POST['news'];
$paragraph = $_POST['paragraph'];

move_uploaded_file($tempname, $folder);

$sql="INSERT INTO pinaarticle (toic, paragraph, location)
VALUES('$news', '$paragraph', '$folder')";
$query = mysqli_query($connection,$sql);
if ($query) {
	header('Location: home.php');
}
}
?>
<html>
<head>
	<title>Post Your News</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
<input type="file" name="uploadfile"><br/>
<input type="text" name="news" placeholder="News title"><br/>
<textarea name="paragraph" style="height:200px; width: 280px;"></textarea><br/>
<input type="submit" name="submit" value="Post">    
</form>
</body>
</html>