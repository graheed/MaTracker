<?php
   session_start();
       if(!isset($_SESSION['userlogin'])){
           header("Location: login.php");
       }
   
       if(isset($_GET['logout'])){
           session_destroy();
           unset($_SESSION);
           header("Location: login.php");
           
       }
       if($_SESSION['userlogin']['type'] !== "supplier"){
        // isn't admin, redirect them to a different page
        header("Location: index.php");
    }
   ?>
<?php
   require_once('config.php');
   ?>

<?php

    if(isset($_POST['delete-product'])){
        $product_name = $_POST['product_name'];
        

        $sql = "DELETE FROM Products WHERE product_title=?";
           $stmtinsert = $db->prepare($sql);
           $result = $stmtinsert->execute([$product_name]);
            if($result) {
                echo "<script> alert('Product Deleted') </script>";
            }else{
                echo "<script> alert('Error Encountered') </script>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
         <img src="logo.png" alt="" class="logo">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="add_product.php">Manage Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="add_supplier.php">Manage Suppliers</a>
               </li>
                  <?php
                   if($_SESSION['userlogin']['type'] == "supplier"){
                     echo "<li class='nav-item'>
                     <a class='nav-link' href='edit_product.php'>My Products</a>
                     </li>";
                 }
                  
                  ?>
                  
                  <?php
                   if($_SESSION['userlogin']['type'] == "Admin"){
                     echo "<li class='nav-item'>
                     <a class='nav-link' href='edit_supplier.php'>My Suppliers</a>
                     </li>";
                 }
                  
                  ?>
               
               <li class="nav-item">
                  <a class="nav-link" href="index.php?logout=true">Logout</a>
               </li>
            </ul>
         </div>
      </nav>
    <div class="container">
        <h1>Delete a Product</h1>
        <br>
        <h2>Please enter the name of the item that you want to delete:</h2>
        <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" placeholder="e.g., Concrete"
            autocomplete="off" required= "required"><br><br>
        </div>
        
        <!-- Edit Product Button -->
        <div class="form-outline">
            <input type="submit" name="delete-product" class="btn-primary" value="Save changes">
        </div>
        </form>
    </div>
</body>
</html>