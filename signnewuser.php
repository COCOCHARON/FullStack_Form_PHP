<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="./signup.png" type="image">
    <link rel="stylesheet" href = "signnewuser.css" >

</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            //User Data.
            $Fname = $_POST["firstname"];
            $Lname = $_POST["lastname"];
            $username = $_POST["username"];
            $password = $_POST["password"]; 
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            //Database Credentials.

            $server_name = "localhost";
            $user_db = "root";
            $pass_db = "";

            //Database name
            $db_name = "Instagram_India";

            $con = new mysqli($server_name, $user_db, $pass_db, $db_name);

            if($con->connect_error)
            {
                die("Connection:! ". $con->connect_error);
            }
            
                /* echo "<p class='success-message'>
                        Connection Established
                        </p>"; */

             //Creating Database if not Exists..
            $sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";
            
            //Running the Query in Sql..
            if ($con->query($sql_create_db) === TRUE) 
            {
               /* echo "<p class = 'success-message'>
                         Database created successfully
                        </p>"; */
            } 
             //For Error..
            else 
            {
                echo "<p class='error-message'>
                        Database creation:".$con->error."</p>";
            }
              
            //Selecting the Database
            $con->select_db($db_name);

             //Creating the table in database if not present.
            $sql_create_table = "CREATE TABLE IF NOT EXISTS Users
            (
                id INT AUTO_INCREMENT PRIMARY KEY,
                Firstname VARCHAR(50) NOT NULL,
                Lastname VARCHAR(50),
                Username VARCHAR(100) NOT NULL,
                Password VARCHAR(255) NOT NULL,
                Email VARCHAR(100) NOT NULL,
                Phone VARCHAR(11) NOT NULL
            )";

            //Executing the query in Sql to create table.
            if ($con->query($sql_create_table) === TRUE) 
            {
               /*  echo "<p class = 'success-message'>
                         Table created successfully
                        </p>"; */
            } 
            // For Error
            else 
            {
                echo "<p class = 'success-message'>
                         Table creation  unfailed
                        </p>";
            }

            //Checking User credentials if they are already exists or not.
            $sql = "SELECT * FROM Users
                        WHERE Username = '$username' AND Password= '$password'";
            
            if($con->query($sql)->num_rows>0)
            {
                echo "<p class = 'success-message'>
                        User Already Exists
                        </p>";
                /* header("Location: Login.html");
                exit(); */
            }
            else
            {
            //Query for inserting the Data in Table 
            $sql_insert_user = "INSERT INTO Users 
                                        (Firstname, Lastname, Username, Password, Email, Phone) 
                                        VALUES ('$Fname', '$Lname', '$username', '$password', '$email', '$phone')";


            //Executing this for inserting the Data in Table
            if ($con->query($sql_insert_user) === TRUE) 
            {
                echo "<p class='success-message'>
                                Account Created successfully
                         </p>";
                /* header("Location: Loginform.html");
                exit(); */
            }   
            

            else 
            {
                echo "<p class='error-message'>
                                Error Account creation:".$con->error."</p>";
            } 
        }

            //Closing the connection..
            $con->close();
        } 
        //If Php is not working then , it will run ..
        else 
        {
            echo "<p class='error-message'>Error: Form not submitted</p>";
        }
    ?>
    
</body>
</html>