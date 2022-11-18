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
        $password       = sha1($_POST['password']);
            $sql = "INSERT INTO Users(firstname, lastname, phonenumber, companyname, email, password) VALUES(?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);
            $result = $stmtinsert->execute([$firstname, $lastname, $phonenumber, $companyname, $email, $password]);
            if ($result){
                echo "You can now log in.";
            }else{
                echo "Errors encountered while saving the inserted data";
            }
        }else{
            echo "No Data";
        }
        
?>