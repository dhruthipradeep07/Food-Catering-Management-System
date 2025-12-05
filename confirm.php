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
    body{
background-color: #D5CEA3;
}
.container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }

        .container label {
            display: block;
            margin-bottom: 10px;
        }
        }
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
 <a href="mycart.php">Cart</a>
  <a href="home1.php">Home</a>
 
 
  
  
</div>
<!--<div class="image">
<img src="\catering\img\page1l.jpg" alt="about us" width="1220" height="700">
</div>-->

<h1 align=center>CART ITEMS </h1>
<p>&nbsp;</p>
</body>
</html> <form name="form1" method="post" action="confirmsave.php">
  <div class="container">
                  <table BORDER=0 align="center" cellpadding="5">
                    <tr>
                      <td colspan="2" bgcolor="#D9EDF7"><div align="center"><strong>Order Acknowledgemet</strong></div></td>
                    </tr>
                    <tr>
                      <td width="216"><div align="right">Invoice no</div></td>
                      <td width="233"><input type="text" name="textfield" id="textfield" value="<?php 	$mysqli= new mysqli("localhost", "root", "", "catering");

if ($mysqli->connect_errno) 
{
	echo "Failed to connect to MySQL: (". $db->connect_errno . ") " . $db->connect_error;
}



$sql="select * from  payment2";
$result=$mysqli->query($sql);


$cnt=$result->num_rows ;
$cnt=$cnt+1001;
$cnt="O-".$cnt;
//setcookie("pac",$cnt);
echo $cnt;
		   ?>"></td>
                    </tr>
                    <tr>
                      <td> <div align="right">Invoice Date</div></td>
                      <td><label>
                        <input type="text" name="textfield2" id="textfield2" value="<?php $doi=date("Y/m/d"); echo $doi; ?>">
                      </label></td>
                    </tr>
					
                    <tr>
                    <tr>
                      <td><div align="right"> Amount</div></td>
                      <td><input type="text" name="textfield3" id="textfield3" value="<?php $amt=$_GET["amt"]; echo $amt;?>"></td>
                    </tr>
					<tr>
                      <td><div align="right">No of Guests</div></td>
                      <td><input type = text name = "quantity" id = "quantity" onkeyup = calc() class="form-control">
</td>
                    </tr>
					<tr>
                      <td><div align="right">Event Date</div></td>
                      <td><input type = date name = "ed" id = "ed"  class="form-control">
</td>
                    </tr>
					<tr>
                      <td><div align="right">Total Amount</div></td>
                      <td><input type="text" name="textfield33" id="textfield4" value=""></td>
                    </tr>
					<tr>
                    <tr>
                      <td><div align="right">Email id</div></td>
                      <td><input type="text" name="textfield4" id="textfield4" value="<?php 
					 // session_start();
					 // $_SESSION['cemail']=$admin_login['email'];
					   $e=$_SESSION["cemail"]; echo $e;  ?>"></td>
                    </tr>
                    <tr>
                      <td><div align="right">Full Name</div></td>
                      <td><input type="text" name="textfield7" id="textfield7" value="<?php  $n=$_SESSION['cname']; echo $n;   ?>"></td>
                    </tr>
                    <tr>
                      <td><div align="right">Address</div></td>
                      <td><input type="text" name="textfield5" id="textfield5 "value="<?php  // $m=$_SESSION["address"]; echo $m;  ?>"></td>
                    </tr>
                    <tr>
                      <td><div align="right">Mobile</div></td>
                      <td><input type="text" name="textfield6" id="textfield6" maxlength="10" value="<?php
					 //   $_SESSION['cph']=$admin_login['phone'];
					   $m=$_SESSION["cph"]; echo $m;  ?>" required></td>
                    </tr>
                    <tr>
                      <td><div align="right">Status</div></td>
                      <td><input name="textfield8" type="text" id="textfield8" value="Ordered" readonly></td>
                    </tr>
					  <tr>
                      <td><div align="right">Card No</div></td>
                      <td><input name="textfield8" type="text" id="textfield8" maxlength="16" required></td>
                    </tr>
					  <tr>
                      <td><div align="right">Date of Expiry</div></td>
                      <td><input name="textfield8" type="date" id="textfield8" required></td>
                    </tr>
					  <tr>
                      <td><div align="right">CVVNO</div></td>
                      <td><input name="textfield8" type="password" id="textfield8"  maxlength="3" required></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><div align="left">
                        <input type="submit" name="button" id="button" value="PAY AND CONFIRM">
                        <input type="reset" name="button2" id="button2" value="Reset">
                      </div></div></td>
                    </tr>
                  </table>
              </form>