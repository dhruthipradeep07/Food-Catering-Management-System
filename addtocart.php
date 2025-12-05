<?php

$a=$_GET["edit"];
$conn=mysqli_connect("localhost","root","","catering");
 $sql="SELECT * from fooditems where foodid='{$a}'";
 $products=$conn->query($sql);
?>
              <?php include "oldconfig.php" ?>
              <?php



  
	 $a="";
	 $b="";
	 $c="";
	 $d="";
	 $e="";
          while($row=mysqli_fetch_assoc($products))
		  {
             
			 $a=$row['foodid'];
			  $b=$row['foodname'];
			  $c=$row['category'];
			  $d=$row['foodimg'];
			  $e=$row['Prize'];
			  $f=$row['fooddis'];
			  $g=$row['type'];
		}
			 
			 
			 
             

$query = "insert into carttemp  values('$a','$b','$e','','$c')";
//echo $query;
mysqli_query($conn,$query);

//echo "<h3 align = center>Added successfully </h3>";



/*

$db = new mysqli("localhost", "root", "", "furniture2022");

if ($db->connect_errno) {
echo "Failed to connect to MySQL: (" 
. $db->connect_errno . ") " . $db->connect_error;
}*/

/*
$sql="select * from carttemp "; 
//echo $sql;
$result_db = $db->query($sql) or die("Error!");
$all_result = $result_db->fetch_all();

$table =
'<table id="customers" align=center border="1";width="70%"; >
<tr>
<td>Product Id</td>
<td>Description</td>
<td>Rate</td>
<td>Photo</td>
<td>Category</td>

</tr>';

$a="";
$b="";
$c="";
$d="";
$e="";





foreach ($all_result as $row) 
{

$a=$row[0];
$b=$row[1];
$c=$row[2];
$d=$row[3];
$e=$row[4];
//$f=$row[6];
//$fi=$row[5];
	$table .= '<tr>'
	
	  . '<td>' .$a. '</td>'
  	. '<td>' . $b . '</td>'
  	. '<td>' . $c . '</td>'
	. '<td><img src=' . $d. ' width=100 height=100></img></td>'
		. '<td>' . $e . '</td>'
	//. '<td>' . $f . '</td>'
	. '<td>' .'<a href=delete.php?id='.$a.'><img src=deleteicon.jpg width=50px height=50px></a>' .'</td>'
	  . '</tr>';


}


$table .='</table>';
echo $table;
	//echo("<h3 align=center><a href=admin.php>Back</a></h3>");


$db->close();*/
echo( "<script>alert('Added To Cart ');window.location='home.html';</script>");
?>
