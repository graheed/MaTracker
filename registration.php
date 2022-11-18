<?php
    require_once('config.php');
    ?>
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
                        <input class="form-control" type="text" id= "firstname" name ="firstname" required>

                        <label for ="lastname"><b>Last Name</b></label>
                        <input class="form-control" type="text" id= "lastname" name ="lastname" required>

                        <label for ="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" type="text" id= "phonenumber" name ="phonenumber" required>

                        <label for ="companyname"><b>Company Name</b></label>
                        <input class="form-control" type="text" id= "companyname" name ="companyname" required>

                        <label for ="email"><b>Email</b></label>
                        <input class="form-control" type="email" id= "email" name ="email" required>

                        <label for ="password"><b>Password</b></label>
                        <input class="form-control" type="password" id= "password" name ="password" required>
                        <hr class="mb-3">
                        <input class = "btn btn-primary" type="submit" id= "register" name="create" value="Sign Up">
                    </div>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type= "text/javascript">
        $(function(){
            $('#register').click(function(e){
                var valid = this.form.checkValidity();
                
                if(valid){

                    var firstname = $('#firstname').val();
                    var lastname = $('#lastname').val();
                    var phonenumber = $('#phonenumber').val();
                    var companyname = $('#companyname').val();
                    var email = $('#email').val();
                    var password = $('#password').val();

                    e.preventDefault();
                    
                    $.ajax({
                        type: 'POST',
                        url: 'process.php',
                        data: {firstname: firstname, lastname: lastname, phonenumber: phonenumber, companyname: companyname, email: email, password: password},
                        success: function(data){
                            Swal.fire({
                            'title' : 'Sucessfully Registered!',
                            'text': data,
                            'type':'success'
                            
                            }).then(function() {
                                window.location = "/MaTracker/registration.php";
                                });
                        },
                        error: function(data){
                            Swal.fire({
                            'title' : 'Errors',
                            'text': 'Errors were encountered while saving the data.',
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