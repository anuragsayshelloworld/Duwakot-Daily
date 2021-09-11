<?php
require_once("Config.php");
$id = $_GET['id'];
$query = "SELECT * FROM ProductDetail where id = $id";
$result = mysqli_query($connection,$query);
$row = mysqli_fetch_assoc($result);
$location = $row['location'];
?>
<html>
<head>
    <title><?php echo $row['topic'] ?> </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:#00C08B; color: black;">
    <?php
    print_r("<img src='$location' height='350px' width='35%' align='right'>");
    echo "<br/>";
    echo "<pre><h1 style='font-size:40px;'>" . $row['topic'] . "</pre></h1>" . "<br/>" . "<p style='font-size:20px; background-color:white; letter-spacing:2px;margin:8px;padding:10px;text-align:justify;'>" . $row['paragraph'] . "</p>" . "<br/>";
    ?>

  <?php
  $a=rand(1,5);
  $query = "SELECT * FROM randomtable where id = $a";
  $result = mysqli_query($connection,$query);
  $row = mysqli_fetch_assoc($result);
  $b = $row['location'];
  echo"<a href='somelink.com'><img src=$b width='100%' height='200'></a>";
  ?> 
   
</body>
</html>