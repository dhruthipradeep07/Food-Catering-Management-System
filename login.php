<?php

	$e=$_POST["email"];
    $a=$_POST["password"];
    $name="localhost";
 $uname="root";
 $password="";
 $db="catering";

 $conn=new mysqli($name,$uname,$password,$db);

 if($conn->connect_error)
 {
 	die('connection failed:'.$conn->connect_error);
 }
else
 {
 	$sql="SELECT email,password FROM register where email='$e' and password='$a'";
 	$result=$conn->query($sql);
 	if($result->num_rows == 1)
      {
                $admin_login = mysqli_fetch_assoc($result);
                if($admin_login['email'] == 'admin@gmail.com')
                   {
                    echo "Admin login success";
                    header("Location:admin.html");
                   }
                   else
                   {
				   session_start();
                     echo "user login success";
                     $_SESSION['loggedin']=TRUE;
                     $_SESSION['cname']=$admin_login['name'];
					  $_SESSION['cph']=$admin_login['phone'];
					  setcookie("ph",$admin_login['phone']);
					  $_SESSION['cemail']=$admin_login['email'];
                     $logged_in_user['name'];
                    header("Location:home1.php");
                   }
      }
    
    else
    {
	$msg="invalid login";
   echo"<script type='text/javascript'>window.alert('$msg');</script>";
	
    }
  }
?>