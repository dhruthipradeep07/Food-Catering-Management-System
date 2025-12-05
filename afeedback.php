<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Feedback</title>

<style>
	  body{
background-color: #D5CEA3;
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
</head>

<body>
<h1 align=center><a href=admin.html>HOME</a></h1>
        <?php include "dbcon.php" ?>
                <?php



$db = new mysqli("localhost", "root", "", "catering");

if ($db->connect_errno) {
echo "Failed to connect to MySQL: (" 
. $db->connect_errno . ") " . $db->connect_error;
}
echo "<h1 align=center> FEEDBACK </h1>";

$sql="select * from FEEDBACK  "; 
//echo $sql;
$result_db = $db->query($sql) or die("Error!");
$all_result = $result_db->fetch_all();

$table =
'<table id="customers" align=center border="1";width="70%"; >
<tr>
<td>FULLNAME</td>
<td>FEEDBACK</td>
<td>MOBILE</td>
<td>EMAIL</td>

<td>RATING</td>

</tr>';

$a="";
$b="";
$c="";
$d="";
$e="";
$f="";
$g="";
$h="";


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
//$f=$row[5];
//$g=$row[6];
//$h=$row[7];
//$i=$row[8];
////$sum=$sum+$c;
//$j=$row[9];
//$k=$row[10];
//$fi=$row[5];
	$table .= '<tr>'
	
	  . '<td>' .$a. '</td>'
  	. '<td>' . $b . '</td>'
  	. '<td>' . $c . '</td>'
	
	. '<td>' . $d . '</td>'
	. '<td>' . $e . '</td>'
/*	. '<td>' . $f . '</td>'
	. '<td>' . $g . '</td>'
	. '<td>' . $h . '</td>'
	. '<td>' . $i . '</td>'
	
	. '<td>' . $j . '</td>'
	. '<td>' . $k . '</td>'*/
	  . '</tr>';


}


$table .='</table>';
echo $table;
if($count==0)
	echo("<h3 align=center>No Feedback in  yet....</h3>");
else
/*echo("<h3 align=center>Total value of the Cart ....Rs.".$sum."</h3>");
echo("<h3 align=center>Total Items in the Cart ....".$count."</h3>");
echo("<h3 align=center><a href=confirm.php?amt=".$sum.">Confirm Order</a></h3>");*/
$db->close();
?>
</body>
</html>
