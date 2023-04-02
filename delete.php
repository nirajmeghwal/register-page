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
    die("<p>ERROR: Could not connect.</p> "
        . mysqli_connect_error());
}
// Taking all 5 values from the form data(input)
if(isset($_POST['delete'])){
   session_start();
   $id=$_SESSION['id'];
}
// Performing insert query execution
// here our table name is college
//update users set first_name='$first_name',last_name='$last_name',email='$email',password='$password' where email='$emailbefore' and password='$passwordbefore'
$sql = "delete from users where id='$id'";

if(mysqli_query($conn, $sql)){
     echo "<p>account successfully deleted</p>";
} else{
    echo "<p>account cannot be deleted</p> $sql. "
        . mysqli_error($conn);
}
exit();
// Close connection
mysqli_close($conn);
?>
</html>

