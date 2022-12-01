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
   function add_product(){
    
   }
   function display_Sproducts($Sid){
   
       global $db;
       if ($Sid != ''){
       $stmt = $db->query("SELECT * FROM (Products JOIN Suppliers ON (Products.Sid = Suppliers.Sid))");
       $counter = 0;
       while ($results = $stmt->fetch()) {
           if ($results['Sid'] == $Sid){
               $product_title = $results['product_title'];
               $product_description = $results['product_description'];
               $product_price = $results['product_price'];
               $product_unit = $results['product_unit'];
               echo "<div class='col-md-3 mb-2'>
               <div class='card'>
               <img class='card-img-top' src='...' alt='...'>
               <div class='card-body'>
               <h5 class='card-title'>$product_title</h5>
               <p class='card-text'>$product_description</p>
               <p class='card-text'>$ $product_price/$product_unit</p>
               <a href='gen_invoice.php?param1=$product_title&param2=$product_description&param3=$product_price' class='btn btn-primary'>Generate Invoice</a>
               </div>
               </div>
               </div>";
               $counter++;
           }
       }
       if ($counter == 0){
           return 0;
   
       }else{
           return $counter;
       }
   }
   }
   
   function search_product(){
               global $db;
   
               if (isset($_POST['search_data_product'])){
                   $search = explode(" ", $_POST['search_data']);
                   $keyword = "";
                   $name = "";
                   $counter = 0;
                   foreach($search AS $s)
                   {
                       $keyword .= "product_keywords LIKE '%$s%' or ";
                       $name .= "product_title LIKE '%$s%' and ";
                   }
   
                   $keyword = substr($keyword, 0, -4);
                   $name = substr($name, 0, -4);
   
                   $stmt = $db->query("SELECT * FROM (Products JOIN Suppliers ON (Products.Sid = Suppliers.Sid)) WHERE ($name) or ($keyword)");
                   while ($results = $stmt->fetch()) {
                       
                       $supplier_name = $results['SupplierName'];
                       $supplier_id = $results['Sid'];
                       $product_title = $results['product_title'];
                       $product_description = $results['product_description'];
                       $product_price = $results['product_price'];
                       $product_unit = $results['product_unit'];
                       echo "<div class='col-md-3 mb-2'>
                       <div class='card'>
                       <img class='card-img-top' src='...' alt='...'>
                       <div class='card-body'>
                       <h5 class='card-title'>$product_title</h5>
                       <p class='card-text'>Supplier: <a href='view_supplier.php?param1=$supplier_id&param2=$supplier_name'>$supplier_name</a></p>
                       <p class='card-text'>$product_description</p>
                       <p class='card-text'>$ $product_price/$product_unit</p>
                       <a href='gen_invoice.php?param1=$product_title&param2=$product_description&param3=$product_price' class='btn btn-primary'>Generate Invoice</a>
   
                       </div>
                       </div>
                       </div>";
                       $counter++;
   
       }
       if ($counter == 0){
           return 0;
   
       }else{
           return $counter;
       }
   
               }
   
               
   
   }
   ?>
