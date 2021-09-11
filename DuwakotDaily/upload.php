<?php

require_once('Config.php');

if (isset($_POST['submit'])) {
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "uploads/".$filename;
$news = $_POST['news'];
$category = $_POST['category'];
$paragraph = $_POST['paragraph'];
$date = $_POST['date'];

move_uploaded_file($tempname, $folder);

$sql="INSERT INTO ProductDetail (topic,paragraph,location,daate,category)
VALUES('$news', '$paragraph', '$folder','$date','$category')";
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
<select name="category">
	<option value="1">Political</option>
	<option value="2">Non-political</option>
</select><br>
<input type="text" name="news" placeholder="News title"><br/>
<textarea name="paragraph" style="height:200px; width: 280px">
</textarea><br/>
<pre>Make sure to enter date properly</pre>
<input type="text" name="date" placeholder="yyyy-mm-dd hh:mm:ss"><br>
<input type="submit" name="submit" value="Post">    
</form>
</body>
</html>