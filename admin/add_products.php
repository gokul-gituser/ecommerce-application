<?php session_start(); ?>

<?php 
include('../includes/connect.php');
if(isset($_POST['add_product'])){
    $product_name= $_POST['productname'];
    $product_description= $_POST['productdescription'];
    $product_price= $_POST['productprice'];

    if( $product_name == '' or $product_description== '' or $product_price ==''){
        echo " <script> alert('All fields are required')</script> ";
        exit();
    }else{
        $add_product= "insert into `products` (product_name,product_description,product_price) values ( '$product_name', '$product_description', $product_price)"; 

        $query = mysqli_query($con, $add_product);
        if($query){
            echo"<script> alert('Success'); window.open('index.php' , '_self') ;</script>";
           
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
<nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand mb-0 h1">Home</a>
            <a href="add_products.php" class="btn">Add Products</a>

            <button><a href="list_users.php">List Users</a></button>

            <button><a href="logout.php">Logout</a></button>
        </div>
    </nav>
<form method="post">
  <div class="mb-3">
    <h1>Add Product</h1>
    <label for="productname" class="form-label">Product Name</label>
    <input type="text" name="productname" class="form-control" id="productname" >

   
    <label for="productdescription" class="form-label">Product Description</label>
    <input type="text" name="productdescription" class="form-control" id="productdescription" >

    
    <label for="productprice" class="form-label">Product price</label>
    <input type="text" name="productprice" class="form-control" id="productprice" >
    
  </div>
  
  <button type="submit" name="add_product" class="btn btn-primary">Submit</button>
</form>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>