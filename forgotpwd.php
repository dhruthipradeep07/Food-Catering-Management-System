

<html>
<head>
<style>
body{
background-color: #D5CEA3;
} 
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:  #000000;
  position: -webkit-sticky; 
  position: sticky;
  top: 0;
}

li {
  float: right;
  
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  background-color: #c2bebc;
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

        .container input[type="text"],
        .container input[type="email"],
        .container textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .container textarea {
            height: 100px;
        }

        .container input[type="submit"] {
            background-color: #000000;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #C060A1;
        }

</style>

<script>
        function validateForm() {
            var name = document.forms["contactForm"]["name"].value;
            var email = document.forms["contactForm"]["email"].value;
            var message = document.forms["contactForm"]["message"].value;

            if (name == "" || email == "" || message == "") {
                alert("All fields must be filled out");
                return false;
            }
        }
    </script>
</head>
<body>
<ul>

  <li style="float:left"><a href="#foodcatering">Online Food Catering System</a></li>
  <li><a href="register.html">REGISTER</a></li>
  <li><a href="contactus.html">CONTACT</a></li>
  <li><a href="aboutus.html">ABOUT</a></li>
  <li style="float:right"><a href="home.html">HOME</a></li>
</ul><br><br>

<center>
 <?php 

$txt=$_POST['textfield'];
$pass=rp(strlen($txt));



///////////////////

$mysqli= new mysqli("localhost", "root", "", "catering");

if ($mysqli->connect_errno) 
{
	echo "Failed to connect to MySQL: (". $db->connect_errno . ") " . $db->connect_error;
}


$sql="select * from  register where email ='{$txt}' ";



$found=0;
$result=$mysqli->query($sql);


if($result ->num_rows == 1)
{	
	$found=1;
}




////////////////////
if( $found==1)
{


	$con = mysqli_connect("localhost", "root", "");
	mysqli_select_db($con,"catering");



$query="update register set password='{$pass}'  where email='{$txt}'";



//echo $query;

mysqli_query($con,$query);

	
	

			echo "<h3 align=center>Your new Password resetted successuflly  .............</h3>";
			echo "<h4> New Password is ".$pass;
			
			//echo("<h4 align=center><a href=adminhomepage.php><br>Home Page</a></h4>");
			



	
}

else
{
	echo "<h1 align=center> Some thing Wrong Please try again </h1>";
	//echo("<h4 align=center><a href=homepage.php><br>Home Page</a></h4>");
}








?>
                    <?php 


function rp($len)
{

$chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:.?";
$pass=substr( str_shuffle($chars),0,$len);
return $pass;
}


?>


</body>
</html>