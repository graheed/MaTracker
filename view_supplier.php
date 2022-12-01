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
   ?>
<?php
   include('common_functions.php');
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="search_product.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <title>View Supplier</title>
   </head>
   <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
         <img src="logo.png" alt="" class="logo">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
               <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Manage Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="add_supplier.php">Manage Suppliers</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="index.php?logout=true">Logout</a>
               </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="search_product.php" method="post">
               <input type="search" name="search_data" required class="form-control mr-sm-2" type="search" placeholder="Search for material" aria-label="Search for material">
               <button class="btn btn-light my-2 my-sm-0" type="submit" name="search_data_product">Search</button>
            </form>
         </div>
      </nav>
      <div class="container">
         <?php
            $Sname = $_GET['param2'];
            echo "<div class='row justify-content-center'>
            <h1>$Sname<br></h1></div>
            <div class='row justify-content-center'>
            <button class='button-29' role='button'>Contact Supplier</button>
            </div>";
            ?>
         <br><br><br>
         <div class="row">
            <!-- Fetching Products -->
            <?php
               $Sid = $_GET['param1'];
               $resultFetched = display_Sproducts($Sid);
               
               ?>
         </div>
         <?php 
            if ($resultFetched==0){
                echo"<div class='row justify-content-center'>
                <h1>No Material to Display<br><br><br></h1>
            </div>";
            }
            ?>
      </div>
      <div class="bg-primary p-3">
         <p style="text-align:center">Designed for La Vonne Stephenson and Associates</p>
      </div>
   </body>
</html>
