<?php
 /* session_start();
  $conn=mysqli_connect("localhost","root","","catering");
  if(!isset($_SESSION['name'])){
    header("localhost:login.php");
    die();
   }*/
 ?>
<!DOCTYPE html>
<html>
<head>
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

.image{
 
  filter: brightness(75%);
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
    <a href="history.php">History</a>
 <a href="mycart.php">Cart</a>
  <a href="home1.php">Home</a>
 
 
  
  
</div>
<!--<div class="image">
<img src="\catering\img\page1l.jpg" alt="about us" width="1220" height="700">
</div>-->
<h1 align=center><a href=home1.php>HOME</a></h1>
        <?php include "dbcon.php" ?>
                <?php



$db = new mysqli("localhost", "root", "", "catering");

if ($db->connect_errno) {
echo "Failed to connect to MySQL: (" 
. $db->connect_errno . ") " . $db->connect_error;
}
echo "<h1 align=center> Order History</h1>";

$sql="select * from payment2  "; 
//echo $sql;
$result_db = $db->query($sql) or die("Error!");
$all_result = $result_db->fetch_all();

$table =
'<table id="customers" align=center border="1";width="70%"; >
<tr>
<td>Invoice No</td>
<td>Invoice Date</td>
<td>Amount</td>
<td>Final Amount</td>

<td>Email id</td>
<td>Full Name</td>
<td>Shipping Address</td>
<td>Mobile</td>
<td>Status</td>
<td>Guests</td>
<td>Event Date</td>
</tr>';

$a="";
$b="";
$c="";
$d="";
$e="";
$f="";
$g="";
$h="";

$i="";
$count=0;
//$sum=0;
foreach ($all_result as $row) 
{
$count++;
$a=$row[0];
$b=$row[1];
$c=$row[2];
$d=$row[3];
$e=$row[4];
$f=$row[5];
$g=$row[6];
$h=$row[7];
$i=$row[8];
//$sum=$sum+$c;
$j=$row[9];
$k=$row[10];
//$fi=$row[5];
	$table .= '<tr>'
	
	  . '<td>' .$a. '</td>'
  	. '<td>' . $b . '</td>'
  	. '<td>' . $c . '</td>'
	
	. '<td>' . $d . '</td>'
	. '<td>' . $e . '</td>'
	. '<td>' . $f . '</td>'
	. '<td>' . $g . '</td>'
	. '<td>' . $h . '</td>'
	. '<td>' . $i . '</td>'
	
	. '<td>' . $j . '</td>'
	. '<td>' . $k . '</td>'
	  . '</tr>';


}


$table .='</table>';
echo $table;
if($count==0)
	echo("<h3 align=center>No Items in the cart yet....</h3>");
else
/*echo("<h3 align=center>Total value of the Cart ....Rs.".$sum."</h3>");
echo("<h3 align=center>Total Items in the Cart ....".$count."</h3>");
echo("<h3 align=center><a href=confirm.php?amt=".$sum.">Confirm Order</a></h3>");*/
$db->close();
?>
  
</body>
</html>