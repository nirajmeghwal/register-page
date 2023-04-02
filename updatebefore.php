
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="design.css" />
        <title>Update information</title>
    </head>
    <body>
        <h1>Update information</h1>
        <?php
            echo "<h3> Your current information below</h3>";
            session_start();
            $var1= "name: ".$_SESSION['name_curr1'];
            echo "<p>$var1</p>";
            echo "<br>";
            $var2="email: ".$_SESSION['email_curr1'];
            echo "<p>$var2</p>";
            $id=$_SESSION['id'];

        ?>    
        <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
        
        <p>fill the information in below form and the click on the update button to update your infromation</p>
        <br>
        <table>
            <form autocomplete="off" method="post" action="update.php">
                <tr>
                    <td>
                        <label for="fname">
                            FirstName:
                        </label>
                    </td>
                    <td><input type="text" name="fname" required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="lname">
                            LastName:
                        </label>
                    </td>
                    <td><input type="text" name="lname" />
                    </td>
                </tr>
                <tr>
                    <td><label for="email">
                            Email:
                        </label>
                    </td>
                    <td><input type="email" name="email" required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="password">
                            Password:
                        </label>
                    </td>
                    <td><input type="password" name="password" required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="cpassword">
                            Confirm Password:
                        </label>
                    </td>
                    <td><input type="password" name="cpassword" required/>
                    </td>
                </tr>
                <tr>
                    <td><label for="update">
                        </label>
                    </td>
                    <td><input type="submit" value="update" name="update"/>
                    </td>
                </tr>
            </form>
        </table>
</body>
</html>