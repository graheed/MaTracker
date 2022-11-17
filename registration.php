<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" type= "text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php 
            if(isset($_POST['create'])){
                $firstname      = $_POST['firstname'];
                $lastname       = $_POST['lastname'];
                $phonenumber    = $_POST['phonenumber'];
                $companyname    = $_POST['companyname'];
                $email          = $_POST['email'];
                $password       = $_POST['password'];

                echo "$firstname<br>";
                echo "$lastname<br>";
                echo "$phonenumber\n";
                echo "$companyname\n ";
                echo "$email\n";
                echo "$password\n";
            }
        ?>
    </div>
    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <h1>Registration</h1>
                        <p>Please fill out the form to sign up</p>
                        <hr class="mb-3">
                        <label for ="firstname"><b>First Name</b></label>
                        <input class="form-control" type="text" name ="firstname" required>

                        <label for ="lastname"><b>Last Name</b></label>
                        <input class="form-control" type="text" name ="lastname" required>

                        <label for ="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" type="text" name ="phonenumber" required>

                        <label for ="companyname"><b>Company Name</b></label>
                        <input class="form-control" type="text" name ="companyname" required>

                        <label for ="email"><b>Email</b></label>
                        <input class="form-control" type="email" name ="email" required>

                        <label for ="password"><b>Password</b></label>
                        <input class="form-control" type="password" name ="password" required>
                        <hr class="mb-3">
                        <input class = "btn btn-primary" type="submit" name="create" value="Sign Up">
                    </div>
            </div>
        </form>

    </div>
    
</body>
</html>