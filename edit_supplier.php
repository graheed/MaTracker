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
<?php
   require_once('config.php');
   ?>
<?php
    if(isset($_POST['edit-supplier'])){
        $supplier_name = $_POST['supplier_name'];
        $supplier_email = $_POST['supplier_email'];
        $supplier_phone1 = $_POST['supplier_phone1'];
        $supplier_description = $_POST['supplier_description'];
        $supplier_phone2 = $_POST['supplier_phone2'];
        $supplier_address1 = $_POST['supplier_address1'];
        $supplier_address2 = $_POST['supplier_address2'];
        $supplier_address3 = $_POST['supplier_address3'];


            //Insert edited supplier information into database
           $sql = "UPDATE Suppliers SET SupplierName=?, SupplierEmail=?, Address1=?, Address2=?, Address3=?, SupplierDescription=?, SupplierNum1=?, SupplierNum2=? WHERE SupplierName=?";
           $stmtinsert = $db->prepare($sql);
           $result = $stmtinsert->execute([$supplier_name, $supplier_email, $supplier_address1, $supplier_address2, $supplier_address3, $supplier_description, $supplier_phone1, $supplier_phone2, $supplier_name]);
            if($result) {
                echo "<script> alert('Supplier Updated') </script>";
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
    <title>Edit Supplier Information</title>
    <link rel="stylesheet" href="edit_supplier.css">
</head>
<body>
    <h1>Edit a Supplier</h1>
        <br>
        <h2>Please re-enter the name of the supplier that you want to edit:</h2>    
    <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline">
            <label for="supplier_name" class="form-label">Name of Supplier</label>
            <input type="text" name="supplier_name" id="supplier_name" placeholder="Enter Supplier Name"
            autocomplete="off" required= "required">
    </div>

    <!-- Email -->
    <div class="form-outline">
        <h2>Please enter the changes that you wish to make to the supplier:</h2>
        <label for="supplier_email" class="form-label">Email</label>
        <input type="text" name="supplier_email" id="supplier_email" placeholder="Enter Supplier Email"
        autocomplete="off" required="required">
    </div>

    <!-- Telephone1 -->
    <div class="form-outline">
        <label for="supplier_phone1" class="form-label">Primary Number</label>
        <input type="tel" name="supplier_phone1" id="supplier_phone1" placeholder="Enter supplier primary phone number"
        autocomplete="off" required="required">
    </div>

    <!-- Telephone2 -->
    <div class="form-outline">
        <label for="supplier_phone2" class="form-label">Secondary Number</label>
        <input type="tel" name="supplier_phone2" id="supplier_phone2" placeholder="Enter supplier secondary phone number"
        autocomplete="off" required="required">
    </div>

    <!-- Address1 -->
    <div class="form-outline">
        <label for="supplier_address" class="form-label">Address1</label>
        <input type="text" name="supplier_address1" id="supplier_address1" placeholder="Enter supplier address1"
        autocomplete="off" required="required">
    </div>

    <!-- Address2 -->
    <div class="form-outline">
        <label for="supplier_address" class="form-label">Address2</label>
        <input type="text" name="supplier_address2" id="supplier_address3" placeholder="Enter supplier address2"
        autocomplete="off" required="required">
    </div>

    <!-- Address3 -->
    <div class="form-outline">
        <label for="supplier_address" class="form-label">Address3</label>
        <input type="text" name="supplier_address3" id="supplier_address3" placeholder="Enter supplier address3"
        autocomplete="off" required="required">
    </div>

     <!-- Supplier Description -->
     <div class="form-outline">
        <label for="supplier_description" class="form-label">Supplier Description</label>
        <input type="text" name="supplier_description" id="supplier_description" placeholder="Enter supplier description"
        autocomplete="off" required="required">
    </div>

    <!-- Edit Supplier Button -->
    <div class="form-outline">
        <input type="submit" name="edit-supplier" class="btn" value="Edit Supplier">
    </div>
    </form>
</body>
</html>