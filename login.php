
<html> 
<link rel="stylesheet" type="text/css" href="design.css" />
 <body>


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
        if(isset($_POST['login'])){
            $password=$_POST['password'];
            $email=$_POST['email'];
        }
        $sql="select * from users where email='$email' && password='$password'";
        $result=$conn->query($sql);
        $name_curr;
        $email_curr;
        $id;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
             $name_curr=$row["first_name"]." ".$row["last_name"];
             $email_curr=$row["email"];
             $id=$row["id"];
              echo "<h2>you have succesfully logged in </h2>";
              echo "<h3> User details </h3>";
              $var1= "\nName: " . $row["first_name"]. " " . $row["last_name"];
              $var2= "Email: ".$row["email"];
              echo "<p>$var1</p>";
              echo "\n";
            }
          } else {
            echo "<p>Invalid detailes (you have entered wrong email id or password)</p>"."<br>";
            $conn->close();
            if(($conn==false)){
              exit();
            }
          }

          
          session_start();
          $_SESSION['email_curr1']=$email_curr;
          $_SESSION['name_curr1']=$name_curr;
          $_SESSION['id']=$id;
?>
<br>
<script>
  //show a confirmation and redirect to the delete profile script
  function deleteProfile() {
    alert("are you sure u want to delete yout account??");
}
</script>
<br>

<a href="login2.php">see full information</a>
<br>
<br>
<form method="post" action="delete.php" onclick=deleteProfile() >
  <input type="submit"  value="delete account" name="delete"/>
</form>
<form method="post" action='updatebefore.php'>
  <input type="submit" value="update details" name="update"/>
</form>
<form action="login.html" action="post" >
  <input type="submit" value="logout" name="logout"/>
</form>
 </body>
 </html>
