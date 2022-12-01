<?php
   require_once('config.php');
   ?>
<?php
   if(isset($_POST)){
       $supplier_name      = $_POST['supplier_name'];
       $supplier_description = $_POST['supplier_description'];
       $supplier_phone1    = $_POST['supplier_phone1'];
       $supplier_phone2    = $_POST['supplier_phone2'];
       $supplier_address1    = $_POST['supplier_address1'];
       $supplier_address2    = $_POST['supplier_address2'];
       $supplier_address3    = $_POST['supplier_address3'];
       $supplier_email          = $_POST['supplier_email'];
       $password       = $_POST['password'];
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $stmt = $db->prepare('SELECT COUNT(SupplierEmail) AS EmailCount FROM Suppliers WHERE SupplierEmail = :SupplierEmail');
       $stmt->execute(array('SupplierEmail' => $_POST['supplier_email']));
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
   
       if ($result['EmailCount'] == 0) {
           $sql = "INSERT INTO Suppliers(SupplierName, SupplierEmail, SupplierPassword, Address1, Address2, Address3, SupplierDescription, SupplierNum1, SupplierNum2) VALUES(?,?,?,?,?,?,?,?,?)";
           $stmtinsert = $db->prepare($sql);
           $result = $stmtinsert->execute([$supplier_name, $supplier_email, $hash, $supplier_address1, $supplier_address2, $supplier_address3, $supplier_description, $supplier_phone1, $supplier_phone2]);
           if ($result){
               echo "Added Successfully";
       }else{
           echo"Error Encountered";
       }
   
   }else {
       echo 'E-mail exists!';
       header('HTTP/1.1 500 Internal Server Error');
       header('Content-Type: application/json; charset=UTF-8');
       die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
   }
   }
       
       
   ?>
