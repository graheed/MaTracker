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

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="title">Registration Form</div>
        <div class="content">
        <form action="registration.php" method="post">
        
                        <p>Please fill out the form to sign up</p>
                        
                        <div class="user-details">
                        <div class="input-box">
                        <label class = "details" for ="firstname"><b>First Name</b></label>
                        <input class="form-control" type="text" id= "firstname" placeholder = "First Name" name ="firstname" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="lastname"><b>Last Name</b></label>
                        <input class="form-control" type="text" id= "lastname" placeholder = "Last Name" name ="lastname" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="phonenumber"><b>Phone Number</b></label>
                        <input class="form-control" type="text" id= "phonenumber" placeholder = "Phone Number" name ="phonenumber" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="companyname"><b>Company Name</b></label>
                        <input class="form-control" type="text" id= "companyname" placeholder = "Company Name" name ="companyname" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="email"><b>Email</b></label>
                        <input class="form-control" type="email" id= "email" placeholder = "Email Address" name ="email" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="password"><b>Password</b></label>
                        <input class="form-control" type="password" id= "password" placeholder = "Password" name ="password" autocomplete="new-password" required >
                        </div>

                        <div class="button">
                        <input type="submit" id= "register" name="create" value="Sign Up">
                        </div>
                    </div>
        
        </form>
        </div>

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
                            'title' : 'Successfully Saved.',
                            'text': data,
                            'type':'success'
                            
                            }).then(function() {
                                window.location = "/MaTracker/login.php";
                                });

                        },
                        error: function(data){
                            Swal.fire({
                            'title' : 'Could Save Data',
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