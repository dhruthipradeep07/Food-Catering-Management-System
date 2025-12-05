<?php
$conn=mysqli_connect('localhost','root','','catering');
if(isset($_POST['insert'])){
 $a=$_POST['foodid'];
   
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

<body>

     <form action="" method="post" enctype="multipart/form-data">
<center>
  <ul>
  <li style="float:left"><a href="#foodcatering">ONLINE FOOD CATERING SYSTEM</a></li>
  
  <li style="float:right"><a href="admin.html">Admin</a></li>
  
</ul><br><br>
<head>
  <div class="container">
        <h2>Add New Products</h2>
  <table>
    <tr>
      <td>
        Product Name
      </td>
      <td>
        <input type="text" id="name" name="name"required/>
      </td>
    </tr>

   
 <tr>
  <td>  
  category
</td>
<td>
  <select name="category" required> 
     <option>Select a Category</option>
     <option value='pickles'>Pickles</option> 
     <option value='Starter'>Starter</option>
     <option value='roties'>Roties</option>
     <option value='curry'> Curry</option>
     <option value='eggs'>Eggs</option>
     <option value='biriyani'> Biriyani</option>
     <option value='rice'> Rice</option>
     <option value='beverages'>Beverages</option>
     <option value='Drinks'>Juice</option>
     <option value='milkshakes'>Milkshakes</option>
     <option value='softdrinks'>Soft Drinks</option>
     <option value='Deserts'>Sweets</option>
     <option value='ice_cream'>Ice cream</option>
     <option value='chats'>Chats</option>
     <option value='water'>Water</option>
   </select> 
</td>
</tr>

 <tr>
    <td> 
    Product Image
  </td>
  <td>
   <input id="prdimg" type="file" name="image">
  </td>
</tr>

<tr>
<td>
  Price
</td>
<td>
 <input type="text" id="nid_number" class="form-control" name="Prize" placeholder="Enter Product price" required> 
</td>
</tr>

<tr>
<td>
  Product Description:
</td>
  <td>
  <textarea name="product_desc" id="nid_number2" class="form-control"  rows="3" required></textarea>
</td>
</tr>

<tr>
<td>
  Food
</td>
  <td>
  <input type="radio" id="nid_number4" name="type" class="type" value="veg" />Veg 
  <input type="radio" id="nid_number4" name="type" class="type" value="non-veg" />Non-veg 
</td>
</tr>

<tr>
<td>
  <center><input name="insert" type="submit" value="INSERT"></center><br>
</td>
</tr>
</table>
  </style>
</center>
</form>
<br>
<br>


<?php

   $select = mysqli_query($conn, "SELECT * FROM fooditems");
   
   ?>
   <center>
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
               <a href="admin_update.php?edit=<?php echo $row['foodid']; ?>" class="fn_button"> UPDATE </a>
               <a href="delete.php?delete=<?php echo $row['foodid']; ?>" class="button"> DELETE </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>
</body>
</html>