<?php
 
//Include the connection script
Include ("./php/db_connection.php");
$name = $_POST['fname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$type = $_POST['type'];
error_reporting(E_ALL);
ini_set('display_errors', 1);
//Execute the query to insert user in users table in lab3
$hashedPassword = password_hash($password, PASSWORD_DEFAULT); 
$result = $connect->query("INSERT INTO $type(name, email, password, address, city, state, zip) VALUES('$name','$email','$hashedPassword','$address','$city','$state','$zip')");
 
include("header.php");
if ($result == true) {
    //display success message
    echo "<div class=\"alert alert-success\" role=\"alert\"id=\"main-div\"><b>Registration is successful! You can login now.</b></div>";
}
else
    echo "<b>Registration failed. Please try again</b>";
include('footer.php');
$connect->close();
 
?>
