<?php
require_once('config.php');
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $Sid1 = $_GET['param1'];

        $mailheader = "From:".$name."<".$email.">\r\n";
        global $db;
        $sql = "SELECT SupplierEmail FROM Suppliers WHERE Sid=?";
        $stmtinsert = $db->prepare($sql);
        $result = $stmtinsert->execute([$Sid2]);
        $recipient = $result['SupplierEmail'];

        mail($recipient, $subject, $message, $mailheader);

    } 

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="contact-style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&display=swap" rel="stylesheet">
</head>
<body>
    <!--HTML for Form-->
    <div class="container">
        <h1>Contact Us</h1>
        <p>For any questions, contact us here.</p>

        <form action="https://formspree.io/f/mdojrynk" method="POST">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name">

            <label for="email">Email Address</label>
            <input type="email" name="email" id="email">

            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject">

            <label for="message">Message</label>
            <textarea type="text" name="message" id="message" cols="30" rows="10"></textarea>

            <button name="submit" type="submit">submit</button>
        </form>
    </div>
    
</body>
</html>
