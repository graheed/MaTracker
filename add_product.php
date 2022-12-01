<?php
    if(isset($_POST['add-product'])){
        $product_name = $_POST['product_name'];
        $product_description = $_POST['product_description'];
        $product_keywords = $_POST['product_keywords'];
        $product_price = $_POST['product_price'];

        $product_image = $_FILES['product_image']['name'];

        $temp_image = $_POST['product_image']['name'];

        //Checking if any of the fields is empty
        if($product_name == '' or $product_description == '' or $product_keywords or $product_price
        or $product_image == ''){
            echo "<script> alert('Please fill all the missing fields') </script>";
            exit();
        }
        else {
            move_uploaded_file($temp_image, "./images/$product_image");

            //Insert items into database
            $add_products = "insert into `LaVonneS_Associates` (product_name, product_description, product_keywords,
            product_price, product_image) values('$product_name', '$product_description', '$product_keywords',
            '$product_price', '$product_image')";

            $result = mysqli_query($con, $add_products);

            if($result) {
                echo "<script> alert('Product added successfully') </script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Item</title>
    <link rel="stylesheet" href="add_product.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"> -->
</head>
<body>
    <div class="container">
        <h1>Add a Product<h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data"></form>
        <div class="form-outline">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="text" name="product_name" id="product_name" placeholder="e.g., Concrete"
            autocomplete="off" required= "required">
        </div>

        <!-- Description -->
        <div class="form-outline">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" placeholder="Enter product description"
            autocomplete="off" required="required">
        </div>

        <!-- Keywords -->
        <div class="form-outline">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" placeholder="Enter product keywords"
            autocomplete="off" required="required">
        </div>

        <!-- Image -->
        <div class="form-outline">
            <label for="product_image" class="form-label">Product Image</label>
            <input type="file" name="product_image" id="product_image" required="required">
        </div>

        <!-- Price -->
        <div class="form-outline">
            <label for="product_price" class="form-label">Price</label>
            <input type="text" name="product_price" id="product_price" placeholder="Enter product price"
            autocomplete="off" required="required">
        </div>

        <!-- Insert Product Button -->
        <div class="form-outline">
            <input type="submit" name="add-product" class="btn" value="Add Product">
        </div>
    </div>
</body>
</html>