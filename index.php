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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MaTracker</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <form action="search_product.php" class="search-bar" method="post">
            <input type="search" placeholder="Search for a material" name="search_data" required>
            <button type="submit" value="search" name="search_data_product"> <img src="images/search.png"></button>
        </form>

    </div>
    <a href="index.php?logout=true">Logout</a>
    
</body>
</html>