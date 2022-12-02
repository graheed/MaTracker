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
       if($_SESSION['userlogin']['type'] !== "Admin"){
        // isn't admin, redirect them to a different page
        header("Location: index.php");
    }
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Add a Supplier</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="search_product.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
            <form class="form-inline my-2 my-lg-0" action="search_product.php" method="post">
               <input type="search" name="search_data" required class="form-control mr-sm-2" type="search" placeholder="Search for material" aria-label="Search for material">
               <button class="btn btn-light my-2 my-sm-0" type="submit" name="search_data_product">Search</button>
            </form>
         </div>
      </nav>

<div class="container">
<div class="row justify-content-center">
            <h1>Add a Supplier<br><br><br></h1>
         </div>
        <!-- form -->
        <form action="add_supplier.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="supplier_name" class="form-label">Name of Supplier</label>
            <input type="text" name="supplier_name" id="supplier_name" placeholder="Enter Supplier Name"
            autocomplete="off" required= "required">
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="supplier_description" class="form-label">Supplier Description</label>
            <input type="text" name="supplier_description" id="supplier_description" placeholder="Enter Supplier description"
            autocomplete="off" required="required">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="supplier_email" class="form-label">Email</label>
            <input type="email" name="supplier_email" id="supplier_email" placeholder="Enter Supplier Email"
            autocomplete="off" required="required">
        </div>
        <!-- Password -->
        <div class="form-group">
            <label for="supplier_password" class="form-label">Password</label>
            <input type="password" name="supplier_password" id="supplier_password" placeholder="Enter Supplier Password"
            autocomplete="off" required="required">
        </div>

        <!-- Telephone1 -->
        <div class="form-group">
            <label for="supplier_phone1" class="form-label">Primary Number</label>
            <input type="tel" name="supplier_phone1" id="supplier_phone1" placeholder="Enter supplier primary phone number"
            autocomplete="off" required="required">
        </div>

        <!-- Telephone2 -->
        <div class="form-group">
            <label for="supplier_phone2" class="form-label">Secondary Number</label>
            <input type="tel" name="supplier_phone2" id="supplier_phone2" placeholder="Enter supplier secondary phone number"
            autocomplete="off" required="required">
        </div>
        <!-- Address 1 -->
        <div class="form-group">
            <label for="supplier_address1" class="form-label">Address Line 1</label>
            <input type="text" name="supplier_address1" id="supplier_address1" placeholder="Enter supplier address line 1"
            autocomplete="off" required="required">
        </div>
        <!-- Address 2 -->
        <div class="form-group">
            <label for="supplier_address2" class="form-label">Address Line 2</label>
            <input type="text" name="supplier_address2" id="supplier_address2" placeholder="Enter supplier address line 2"
            autocomplete="off" required="required">
        </div>
        <!-- Address 3 -->
        <div class="form-group">
            <label for="supplier_address3" class="form-label">Address Line 3</label>
            <input type="text" name="supplier_address3" id="supplier_address3" placeholder="Enter supplier address line 3"
            autocomplete="off" required="required">
        </div>
        <!-- Add Supplier Button -->
        <div class="form-group">
            <input type="submit" name="add-supplier" class="btn-primary" value="Add Supplier" id="add_sup">
        </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script type= "text/javascript">
         $(function(){
             $('#add_sup').click(function(e){
                 var valid = this.form.checkValidity();
                 
                 if(valid){
                    
                    var supplier_name      = $('#supplier_name').val();
                    var supplier_description = $('#supplier_description').val();
                    var supplier_phone1    = $('#supplier_phone1').val();
                    var supplier_phone2    = $('#supplier_phone2').val();
                    var supplier_address1    = $('#supplier_address1').val();
                    var supplier_address2    = $('#supplier_address2').val();
                    var supplier_address3    = $('#supplier_address3').val();
                    var supplier_email          = $('#supplier_email').val();
                    var password       = $('#supplier_password').val();
                    
         
                     e.preventDefault();
                     
                     $.ajax({
                         type: 'POST',
                         url: 'processSupplier.php',
                         data: {supplier_name: supplier_name, supplier_description: supplier_description, supplier_phone1: supplier_phone1, supplier_phone2: supplier_phone2, supplier_address1: supplier_address1, supplier_address2: supplier_address2,supplier_address3: supplier_address3, supplier_email:supplier_email, password:password},
                         success: function(data){
                             Swal.fire({
                             'title' : 'Successfully Saved.',
                             'text': data,
                             'type':'success'
                             
                             }).then(function() {
                                 window.location = "/MaTracker/index.php";
                                 });
         
                         },
                         error: function(data){
                             Swal.fire({
                             'title' : 'Could Not Save Data',
                             'text': "Email Address Already Exists",
                             'type':'error'
                             })
                             
                         }
         
                     });
                 }else{
                 }
             
         
             });
             
         });
         
         
      </script>    
</body>
</html>