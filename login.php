<?php
session_start();
    if(isset($_SESSION['userlogin'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <script
                src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
                crossorigin="anonymous">
    </script>
    <div class="container">
        <div class="title">Login Form</div>
        <div class="content">
        <form action="login.php" method="post">
        
                        <p>Please fill out the form to login</p>
                        
                        <div class="user-details">
                    
                        <div class="input-box">
                        <label class= "details" for ="email"><b>Email</b></label>
                        <input class="form-control" type="email" id= "email" placeholder = "Email Address" name ="email" required>
                        </div>
                        
                        <div class="input-box">
                        <label class= "details" for ="password"><b>Password</b></label>
                        <input class="form-control" type="password" id= "password" placeholder = "Password" name ="password" autocomplete="new-password" required >
                        </div>
                        <div class="text sign-up-text">If password is forgotten, <a href = "#">contact</a> Admin</div>
                        <div class="button">
                        <input type="submit" id= "login" name="button" value="Login">
                        </div>
                        <div>Don't have an account? <a href = "/MaTracker/registration.php">Sigup now</a></div>
            </div>
                    </div>
        
        </form>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type= "text/javascript">
        $(function(){
            $('#login').click(function(e){
                var valid = this.form.checkValidity();
                
                if(valid){

                    var email = $('#email').val();
                    var password = $('#password').val();

                    e.preventDefault();
                    
                    $.ajax({
                        type: 'POST',
                        url: 'jslogin.php',
                        data: {email: email, password: password},
                        success: function(data){
                            //alert(data);
                            
                            Swal.fire({
                            'title' : 'Response:',
                            'text': data,
                            'type':'success'
                            
                            })
                            .then(function() {
                                window.location = "/MaTracker/index.php";
                                });
                            

                        },
                        error: function(data){
                            //alert('Errors found');
                            Swal.fire({
                            'title' : 'Errors',
                            'text': data,
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