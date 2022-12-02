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
       if($_SESSION['userlogin']['type'] !== "QS"){
        // isn't admin, redirect them to a different page
        header("Location: index.php");
    }
   ?>
<?php
   require_once('config.php');
   ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles2.css" />
        <title>Quotation Form </title>
    </head>
    
    <body>
        <div class="container">
            <form class= "reqform" action="quotation.php" method="post">
                <h1>Request for Quotation</h1> 
                <br>
                <?php
                $productname = $_GET['param1'];
                $productdescription = $_GET['param2'];
                $productprice = $_GET['param3'];
                $productunit = $_GET['param4'];
                $suppliername = $_GET['param5'];
                
                echo "<div>
                <br>Supplier Name: $suppliername<br>
                <br>Product Name: $productname<br>
                <br>Product Description: $productdescription<br>
                <br>Product Price: $$productprice per $productunit<br>

            </div>
            <br>";
                ?>
                
                <div>
                    <label for="date">Date of Request:</label>
                    <input type="date" id="date" name="date" required><br>
                </div>
                <br>
                <div>
                    <label for="quantity">Product Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required><br>
                </div>
                <br>
                <input type="hidden" value="<?php echo $productname ?>" name="pname"/>
                <input type="hidden" value="<?php echo $productdescription ?>" name="pdes"/>
                <input type="hidden" value="<?php echo $productprice ?>" name="pcost"/>
                <input type="hidden" value="<?php echo $productunit ?>" name="punit"/>
                <input type="hidden" value="<?php echo $suppliername ?>" name="sname"/>
                <div>
                <input type="submit" value="Search" id="search" onclick="return confirm('Are you sure the values entered are correct?')">
                </div>
                <br>
            </form>
        </div>
        <form action="index.php">
                        <input type="submit" value="Go Home" />
                    </form>
    
    </body>
</html>
   