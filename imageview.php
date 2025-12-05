<?php
$conn=new mysqli('localhost','root','','catering');

 if($conn->connect_error)
 {
  die('connection failed:'.$conn->connect_error);
 }
 else
 {
if (isset($_GET['foodid'])) {
 $id=$_GET['foodid'];
    $sql = "SELECT * FROM fooditems WHERE foodid='$id'";
    $select = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($select);
    header('Content-type:' . $row["imagetype"]);
    echo $row["foodimg"];
}
}
?>
