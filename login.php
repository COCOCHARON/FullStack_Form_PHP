<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Output</title>
    <link rel="stylesheet" href="back.css">
    <link rel="icon" href="php1.png" type="image">

</head>
<body>
    <div class="container">
        
        <?php
        //Checking the server with method
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            //Getting Information From Users
            $username = $_POST["username"];
            $password = $_POST["password"];

            //Database Credetials 
            $server_name = "localhost";
            $user_db = "root";
            $pass_db = "";
            
            //Database Name
            $db_name = "Instagram_India";
                
            //Database con Creation
            $con = new mysqli($server_name, $user_db, $pass_db, $db_name);

            //Checking the con is established or not..
            if ($con->connect_error) 
            {
                die("connection failed:".$con->connect_error);
            }
              // Query to check if username and password exist in the table
            $sql_check_user = "SELECT Username AND Password FROM Users 
                                    WHERE username='$username' AND password='$password'";

            $result = $con->query($sql_check_user);

            if ($result->num_rows > 0) 
            {
            // User found, display welcome message
                 echo "<p class='success-message'>Hello $username</p>";
            } 
            else 
            {
            // User not found, display error message
                echo "<p class='error-message'>User Not Found</p>";

                /* sleep(2);
                //Executing Script For Creating New Account.
                header("Location: signup.html");
                exit(); */
            }

            /*
            //Creating Database if not Exists..
            $sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";

            //Running the Query in Sql..
            if ($con->query($sql_create_db) === TRUE) 
            {
                echo "<p class='success-message'>
                            Database created successfully
                        </p>";
            } 
            //For Error..
            else 
            {
                echo "<p class='error-message'>
                            Error creating database:". $con->error."</p>";
            }

            //Selecting the Database
            $con->select_db($db_name);
            

            //Creating the table in database if not present.
            $sql_create_table = "CREATE TABLE IF NOT EXISTS College
                                (
                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                    username VARCHAR(50) NOT NULL,
                                    password VARCHAR(255) NOT NULL
                                )";

            //Executing the query in Sql.
            if ($con->query($sql_create_table) === TRUE) 
            {
                /* echo "<p class='success-message'>
                            Table 'Users' created successfully
                        </p>"; 
            } 
            // For Error
            else 
            {
                echo "<p class='error-message'>
                            Error creating table:".$conn->error."</p>";
            }

            //Query for inserting the Data in Table 
             $sql_insert_data = "INSERT INTO Users (username, password) VALUES ('$username', '$password')";

            //Executing this for inserting the Data in Table
            if ($con->query($sql_insert_data) === TRUE) 
            {
                echo "<p class='success-message'>
                                Data inserted successfully
                        </p>";
            } 

            else 
            {
                echo "<p class='error-message'>
                                Error inserting data:".$con->error."</p>";
            } */

            //Closing the con..
            $con->close();
        } 
        //If Php is not working then , it will run ..
        else 
        {
            echo "<p class='error-message'>Error: Form not submitted</p>";
        }
        
        ?>
        
    </div>
</body>
</html>