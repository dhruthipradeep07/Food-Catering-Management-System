<?php
  session_start();
 /* $conn=mysqli_connect("localhost","root","","catering");
  if(!isset($_SESSION['name'])){
    header("localhost:login.php");
    die();
   }*/
 ?>
<!DOCTYPE html>
<html>
<head>

<script>
    function calc()
    {
        
     var quantity1 = document.getElementById("quantity").value;
     
     var price1 = document.getElementById("textfield3").value;
     var totalprice = parseInt(quantity1)*parseInt(price1);
     
     document.getElementById("textfield4").value = totalprice;
    }
</script>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
 body{
background-color: #D5CEA3;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: right;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #c2bebc;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #000000;
  min-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #c2bebc;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>
<body>

<div class="navbar">
   <li style="float:left"><a href="#">ONLINE FOOD CATERING SYSTEM</a></li>
  <a href="home.html">Logout</a>
    
 <a href="mycart.php">Cart</a>
  <a href="menu1.html">Home</a>
 
 
  
  
</div>
<!--<div class="image">
<img src="\catering\img\page1l.jpg" alt="about us" width="1220" height="700">
</div>-->
<h1 align=center>CART ITEMS </h1>
<p>&nbsp;</p>

 <?php include "dbcon.php" ?>
                  <?php 

if (isset($_POST['button']))
{

$a=$_POST["textfield"];
$b=$_POST["textfield2"];
$c=$_POST["textfield3"];
$d=$_POST["textfield33"];
$e=$_POST["textfield4"];
$f=$_POST["textfield7"];
$g=$_POST["textfield5"];
$h=$_POST["textfield6"];

$i=$_POST["quantity"];
$j=$_POST["quantity"];

$k=$_POST["ed"];
$query = "insert into payment2  values('$a','$b','$c','$d','$e','$f','$g','$h','ORDERED','$j','$k')";
//echo $query;
mysqli_query($con,$query);
$query = "delete from carttemp";
//echo $query;
mysqli_query($con,$query);
echo "<h3 align = center>Payment Completed & Order placed successfully </h3>";

}

?>
</body>
</html> 