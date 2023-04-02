<!DOCTYPE>
<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css" />
</head>
    

<?php

// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root","Niraj@9876", "dblab8");

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
// Taking all 5 values from the form data(input)
if(isset($_POST['update'])){
       $first_name=$_POST['fname'];
       $last_name=$_POST['lname'];
       $password=$_POST['password'];
       $confpassword=$_POST['cpassword'];
       $email=$_POST['email'];
}
 if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "<p> invalid email format</p>";
        die();
    }
 }
 //checking password strength
if(strlen($password)<8 || (!preg_match('/[A-Z]/',$password)) ||(!preg_match('/[a-z]/',$password)) ||(!preg_match('/[0-9]/',$password))){
    echo "<p>password must be atleast 8 character long,must contain a Uppercase letter and a lowercase letter and a number</p>";
    echo "<p>password are not strong enought</p>";
    die();
}
if(!($password===$confpassword)){
    echo "<p>password and confirm password must be same</p>";
    die();
}
session_start();
$id=$_SESSION['id'];
// Performing insert query execution
// here our table name is college
//update users set first_name='$first_name',last_name='$last_name',email='$email',password='$password' where email='$emailbefore' and password='$passwordbefore'
$sql = "update users set first_name='$first_name',last_name='$last_name',email='$email',password='$password' where id='$id'";

if(mysqli_query($conn, $sql)){
    echo "<h3>details have been successfully updated</h3>";
    echo "your updated details are below";
    $var1="Name:  $first_name\n $last_name\n ";
    $var2="Email: $email";
    echo "<br>";
    echo "<p>$var1</p>";
    echo "<br>";
    echo "<p>$var2</p>";
} else{
    echo "<p>ERROR: Hush! information cannot be updated</p> $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>


    </html>