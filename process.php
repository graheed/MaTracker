<?php
   require_once('config.php');
   ?>
<?php
   if(isset($_POST)){
       $firstname      = $_POST['firstname'];
       $lastname       = $_POST['lastname'];
       $phonenumber    = $_POST['phonenumber'];
       $companyname    = $_POST['companyname'];
       $email          = $_POST['email'];
       $password       = $_POST['password'];
       $hash = password_hash($password, PASSWORD_DEFAULT);
       $stmt = $db->prepare('SELECT COUNT(email) AS EmailCount FROM Users WHERE email = :email');
       $stmt->execute(array('email' => $_POST['email']));
       $result = $stmt->fetch(PDO::FETCH_ASSOC);
   
       if ($result['EmailCount'] == 0) {
           $sql = "INSERT INTO Users(firstname, lastname, phonenumber, companyname, email, password) VALUES(?,?,?,?,?,?)";
           $stmtinsert = $db->prepare($sql);
           $result = $stmtinsert->execute([$firstname, $lastname, $phonenumber, $companyname, $email, $hash]);
           if ($result){
               echo "You can now log in.";
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
