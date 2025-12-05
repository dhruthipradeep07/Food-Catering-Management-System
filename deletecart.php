<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='catering';
$conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
if(!$conn){
    die('could not connnect:'.mysqli_error());
}

/*if(isset($_POST['delete'])){
    */
    $n=$_GET['id'];
	
$sql="delete from carttemp where pid = '{$n}'";
echo $sql;
    $res=mysqli_query($conn,$sql);

mysqli_close($conn);
echo( "<script>alert('Deleted Successfully! ');window.location='mycart.php';</script>");
?>