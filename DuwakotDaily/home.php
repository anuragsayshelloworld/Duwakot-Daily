<?php
require_once("Config.php");
session_start();
$query = "SELECT * FROM ProductDetail ORDER BY id DESC";
$result = mysqli_query($connection,$query);
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">
  body{
    margin:0px;
    background-color: #00C08B; 
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #f1f1f1;
}

li {
    float: left;
}

li a {
    display: block;
    color: black;
    text-align: center;
    font-size: 18px;
    font-family: Times New Roman;
    letter-spacing: 1px;
    padding: 18px;
    text-decoration: none;
}

li a:hover {
    background-color: #555;
    color: white;
}
.active {
    background-color: #38a0d1;
    color: white;
}
</style>	
    <title>Duwakot Daily</title>
</head>
<body>
<div id="navbar">
<ul>
  <li><a class="active" href="">Home</a></li>
  <li><a href="pinaarticle.php">Pin a article</a></li>
  <li><a href="reportlive.php">Report a live news</a></li>
  <li><a href="political.php">Political news</a></li>
  <li><a href="editorial.php">Editorial</a></li>
  <li><a href="nonpolitical.php">Non-political</a></li>

  <?php 
  if (isset($_SESSION['username'])) {
  echo"<li style='float:right'><a href='logout.php'>Logout</a></li>"; 
  echo"<li style='float:right'><a href='upload.php'>Post News</a></li>"; 
  }
  else{
  echo"<li style='float:right'><a href='login.php'>Login</a></li>"; 
}
?>
</ul>
</div>	
<?php 
while ($rows = mysqli_fetch_assoc($result)) {
$news = $rows['topic'];
$id = $rows['id'];
$location = $rows['location'];
$date1 = $rows['daate'];    
    
$date = new DateTime($date1);
$now = new DateTime();

$somevar = $date->diff($now)->format("%d");
if (5>$somevar) {
echo "<div class='gallary' style='margin: 22px;
    float: left;
    width: 268px;
    opacity: 0.9;
    background-color:white; 
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);'> 
<a href='secondpage.php?id=$id'>
<img src='$location' style='width: 100%;
height:200px'>
</a>
<div class='desc' style='padding: 15px;
    text-align: center;
}'> $news <br>Posted $somevar days ago</div>
</div>";
}
}
?>
</body>
</html>
<?php
mysqli_free_result($result);
?>
