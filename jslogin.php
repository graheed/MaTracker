<?php
session_start();
require('config.php');
if(isset($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM Users WHERE email = ?LIMIT 1";
    $stmtselect = $db->prepare($sql);
    $result = $stmtselect->execute([$email]);

    if($result){
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        $isPasswordCorrect = password_verify($password, $user['password']);
        if ($stmtselect->rowCount() > 0 and $isPasswordCorrect==1){
            $_SESSION['userlogin'] = $user;
            echo "Successful Login";
        }else{
            echo "Email or Password incorrect. Try again.";
        }
    }else{
        echo "Errors while connecting to database";
    }
}
?>