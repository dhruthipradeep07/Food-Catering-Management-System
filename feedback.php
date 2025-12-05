<?php
//  session_start();
 /* $conn=mysqli_connect("localhost","root","","catering");
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


<link href="style1.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="navbar">
   <li style="float:left"><a href="#">ONLINE FOOD CATERING SYSTEM</a></li>
  <a href="home.html">Logout</a>
  <a href="home1.php">Home</a>
 
 
  
  
</div>
<!--<div class="image">
<img src="\catering\img\page1l.jpg" alt="about us" width="1220" height="700">
</div>-->
<h1 align=center>CUSTOMER FEEDBACK</h1>
<p>&nbsp;</p>
</body>
</html> <form name="form1" method="post" action="">
                  <table width="693" border="0" align="center">
                    <tr>
                      <td width="226"><div align="center"><span class="style8">Full Name </span></div></td>
                      <td width="457"><label>
                        <input type="text" name="textfield" value="" required/>
                        </label>
                      </td>
                    </tr>
                    <tr>
                      <td height="28"><div align="center"><span class="style8">Feedback</span></div></td>
                      <td><label>
                        <input type="text" name="textfield2" required="required" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><div align="center"><span class="style8">Phone No </span></div></td>
                      <td><label>
                        <input name="textfield3" type="text" Pattern ="[6-9]{1}[0-9]{9}" maxlength="10"  value="" required/>
                      </label></td>
                    </tr>
                    <tr>
                      <td><div align="center"><span class="style8">E-Mail</span></div></td>
                      <td><input type="email" name="textfield4" pattern="[a-z0-9._%+-]+@[gmailyahoohotmail]+\.[a-z]{2,}$" value="" required/></td>
                    </tr>
                    <tr>
                      <td colspan="2"><div align="center">Rate This </div>
                          <div class="stars">
                            <input name="star" type="radio" class="star-1" id="star-1" value="1" />
                            <label class="star-1" for="star-1">1</label>
                            <input name="star" type="radio" class="star-2" id="star-2" value="2" />
                            <label class="star-2" for="star-2">2</label>
                            <input name="star" type="radio" class="star-3" id="star-3" value="3" />
                            <label class="star-3" for="star-3">3</label>
                            <input name="star" type="radio" class="star-4" id="star-4" value="4" />
                            <label class="star-4" for="star-4">4</label>
                            <input name="star" type="radio" class="star-5" id="star-5" value="5" />
                            <label class="star-5" for="star-5">5</label>
                            <span></span> </div>
                          
                      </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><div align="left">
                          <input type="submit" name="Submit" value="Submit" />
                          <input type="reset" name="Submit2" value="Reset" />
                      </div></td>
                    </tr>
                  </table>
                                </form>
								
								
								<?php include "dbcon.php" ?>
                <?php 

if (isset($_POST['Submit']))
{

$a=$_POST["textfield"];
$b=$_POST["textfield2"];
$c=$_POST["textfield3"];
$d=$_POST["textfield4"];

$e=$_POST["star"];




$query = "insert into feedback  values('$a','$b','$c','$d','$e')";
//echo $query;
mysqli_query($con,$query);

echo "<h3 align = center><b>Feedback Added Successfully</b> </h3>";

}

?>