
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
        session_start();
        $var1= "name: ".$_SESSION['name_curr1'];
        echo "<p>$var1</p>";
        echo "<br>";
        $var2="email: ".$_SESSION['email_curr1'];
        echo "<p>$var2</p>";

       $conn->close();
?>
 </body>
 </html>
