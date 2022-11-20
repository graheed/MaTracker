<?php

require_once('config.php');
//search the database for products
function display_products(){
            
            global $db;

            $stmt = $db->query("SELECT * FROM Products");
            while ($results = $stmt->fetch()) {
                $product_title = $results['product_title'];
                $product_description = $results['product_description'];
                $product_price = $results['product_price'];
                echo "<div class='col-md-3 mb-2'>
                <div class='card'>
                <img class='card-img-top' src='...' alt='...'>
                <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>$product_price</p>
                <a href='#' class='btn btn-primary'>View Details</a>
                </div>
                </div>
                </div>";
            }
        }  

function search_product(){
            global $db;

            if (isset($_POST['search_data_product'])){
                $search = explode(" ", $_POST['search_data']);
                $keyword = "";
                $name = "";
                $points = 0;
                foreach($search AS $s)
                {
                    $keyword .= "product_keywords LIKE '%$s%' or ";
                    $name .= "product_title LIKE '%$s%' and ";
                }

                $keyword = substr($keyword, 0, -4);
                $name = substr($name, 0, -4);

                $stmt = $db->query("SELECT * FROM Products WHERE ($name) or ($keyword)");
                while ($results = $stmt->fetch()) {
                    $product_title = $results['product_title'];
                    $product_description = $results['product_description'];
                    $product_price = $results['product_price'];
                    echo "<div class='col-md-3 mb-2'>
                    <div class='card'>
                    <img class='card-img-top' src='...' alt='...'>
                    <div class='card-body'>
                    <h5 class='card-title'>$product_title</h5>
                    <p class='card-text'>$product_description</p>
                    <p class='card-text'>$product_price</p>
                    <a href='#' class='btn btn-primary'>View Details</a>
                    </div>
                    </div>
                    </div>";

    }
            }

            

}
?>