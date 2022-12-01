<?php
   session_start();
   require('config.php');
   if(isset($_POST)){
       $email = $_POST['email'];
       $password = $_POST['password'];
       $sql = "SELECT * FROM Users WHERE email = ?LIMIT 1";
       $sql2 = "SELECT * FROM Suppliers WHERE SupplierEmail = ?LIMIT 1";
       $stmtselect = $db->prepare($sql);
       $stmtselect2 = $db->prepare($sql2);
       $result = $stmtselect->execute([$email]);
       $result2 = $stmtselect2->execute([$email]);

   
       if($result or $result2){

           $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
           $user2 = $stmtselect2->fetch(PDO::FETCH_ASSOC);
           $isPasswordCorrect = password_verify($password, $user['password']);
           $isPasswordCorrect2 = password_verify($password, $user2['SupplierPassword']);
           if (($stmtselect->rowCount() > 0 and $isPasswordCorrect==1)){
               $_SESSION['userlogin'] = $user;
               echo "Successful Login";
           }elseif(($stmtselect2->rowCount() > 0 and $isPasswordCorrect2==1)){
                $_SESSION['userlogin'] = $user2;
                echo "Successful Login";
           }
           else{
               echo "Email or Password incorrect. Try again.";
           }
       }else{
           echo "Errors while connecting to database";
       }
   }
   ?>
