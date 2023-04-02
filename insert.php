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
		if(isset($_POST['submit'])){
			   $first_name=$_POST['fname'];
			   $last_name=$_POST['lname'];
			   $password=$_POST['password'];
			   $confpassword=$_POST['cpassword'];
			   $email=$_POST['email'];
		}
         if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                die("ERROR: Email invalid format");
            }
         }
         //checking password strength
        if(strlen($password)<8 || (!preg_match('/[A-Z]/',$password)) ||(!preg_match('/[a-z]/',$password)) ||(!preg_match('/[0-9]/',$password))){
            echo "<p>password must be atleast 8 character long,must contain a Uppercase letter and a lowercase letter and a number</p>";
            echo "<p> password are not strong enough</p>";
			die();
        }
        if(!($password===$confpassword)){
            echo "<p>password and confirm password must be same<p>";
			die();
        }
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO users(first_name,last_name,email,password) VALUES ('$first_name',
			'$last_name','$email','$password')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Registration succesfull</h3>";
			echo   "<h3>You can now login using email and password</h3>";

			$var1="\n$first_name\n $last_name\n ";
			echo "<p>Name: .$var1</p>";
			echo "\n";
			echo "<p>Email: $email</p>";
		} else{
			echo "<p>ERROR: Hush! Sorry Registration is not completed</p> $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>


	</html>

