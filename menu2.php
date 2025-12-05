<?php
$conn=mysqli_connect('localhost','root','','catering');
if(isset($_POST['insert'])){
// $a=$_POST['foodid'];
   
$n=$_POST['name'];
$c=$_POST['category'];
$i=$_FILES['image']['tmp_name'];
$p=$_POST['Prize'];
$d=$_POST['product_desc'];
$f=$_POST['type'];
//$product_image_tmp_name=$_FILES['image']['tmp_name'];
//$product_image_folder='img' .$i;

if(empty($n) || empty($c) || empty($i) || empty($p) || empty($d) || empty($f)){
$msg[]='Please fill out all';
echo"<script type='text/javascript'>window.alert('$msg');</script>";
}
else{
  $i=file_get_contents($_FILES['image']['tmp_name']);
  $imtype = $_FILES['image']['type'];
//$insert="INSERT INTO fooditems(foodname,category,foodimg,Prize,fooddis,type)VALUES('$n','$c','$i','$p','$d','$f')";
         $insert ="INSERT INTO fooditems(foodname,category,foodimg,prize,fooddis,type,imagetype) VALUES(?,?,?,?,?,?,?)";
         $statement=$conn->prepare($insert);
         $statement->bind_param('sssdsss',$n,$c,$i,$p,$d,$f,$imtype);
         $upload=$statement->execute();
/*$upload=mysqli_query($conn,$insert);
if($upload)
{
move_uploaded_file($product_image_tmp_name,$product_image_folder);
$message='New product added successfully';
echo"<script type='text/javascript'>window.alert('$message');</script>";
}
else{
$message='Could not add the product';
echo"<script type='text/javascript'>window.alert('$message');</script>";
}*/
}
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE FROM fooditems WHERE foodid=$id");
    header('location:addmenu1.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add products</title>
</head>
 <style>
  body{
background-color: #D5CEA3;
}

.topnav{
  overflow: hidden;
}
/*navigation bar*/
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #000000;
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
  background-color:#c2bebc;
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
            background-color: #c2bebc;
        }
        .product-display{
   margin:2px;

}

.product-display .product-display-table{
   width: 1000px;
   border: solid;
   text-align: center;
}

.product-display .product-display-table thead{
   background:  #f9f9f9;
}

.product-display .product-display-table th{
   padding:1rem;
   font-size: 20px;
}


.product-display .product-display-table td{
   padding:1rem;
   font-size: 1rem;
   border-bottom: 1rem solid #333;
    background: #f9f9f9;
}

.product-display .product-display-table .btn:first-child{
   margin-top: 0;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: #333;
}

.product-display .product-display-table .btn:first-child{
   margin-top: 0;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: #333;
}
.product-display .product-display-table .btn:first-child{
   margin-top: 0;
}

.product-display .product-display-table .btn:last-child{
   background: crimson;
}

.product-display .product-display-table .btn:last-child:hover{
   background: #333;
}
.button {
  background-color: #B70404;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button:hover {
  background-color:#F24C3D;
}
.fn_button {
  background-color: #17594A;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.fn_button:hover {
  background-color:#8EAC50;
}
  </style>
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

<body>
<h1 align=center><a href=home1.php>HOME</a></h1>
<form name="form1" method="post" action="">
  <table id=customers width="200" border="1">
    <caption>
      SEARCH BY
    </caption>
    <tr>
      <td width="13%">Search By </td>
      <td width="22%">Category
        <select name="category" required>
       
        <option value="NORTH-MENU">NORTH-MENU</option>
        <option value="SOUTH-MENU">SOUTH-MENU</option>
        <
      </select></td>
      <td width="19%"><label>
        <input name="radiobutton" type="radio" value="veg">
      VEG</label></td>
      <td width="16%"><label>
        <input name="radiobutton" type="radio" value="non-veg">
      NON-VEG</label></td>
      <td width="30%"><input type="submit" name="Submit" value="Search"></td>
    </tr>
  </table>
</form>

<p>
  <?php
	if(isset($_POST["Submit"]))
	{
	
		$c=$_POST["category"];
		$t=$_POST["radiobutton"];
	//	$c=$_GET["category"];
		
   $select = mysqli_query($conn, "SELECT * FROM fooditems where category like '{$c}' and type='{$t}'");
  // echo $select;
   
   
   
   ?>
   
   
 <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Image</th>
            <th>Price</th>
            <th>Description</th>
            <th>Type</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><?php echo $row['foodname']; ?></td>
             <td><?php echo $row['category']; ?></td>
             <td><img src="imageview.php?foodid=<?php echo $row['foodid']; ?>" height="100" alt=""></td>
            <td><?php echo $row['Prize']; ?>/-</td>
            <td><?php echo $row['fooddis']; ?></td>
            <td><?php echo $row['type']; ?></td>
                
            <td>
               <a href="addtocart2.php?edit=<?php echo $row['foodid']; ?>" class="fn_button"> ADD TO CART </a>
             <!--  <a href="addmenu1.php?delete=<?php //echo $row['foodid']; ?>" class="button"> DELETE </a>-->
            </td>
         </tr>
      <?php }
	  } ?>
      </table>
</div>
   
  <center>
</p>

<p>&nbsp;</p>

</body>
</html>