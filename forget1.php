
<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
         //Getting Information From Users
         $username = $_POST["username"];

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
         $sql_check_user = "SELECT Username FROM Users 
                                 WHERE Username='$username'";

         if($con->query($sql_check_user)->num_rows>0 === True)
        {
            // User found, display welcome message
            header("Location: forget2.php");
            exit();
        } 
         else 
        {
            // User not found, display error message
           echo   "User Not Found";
        }
        //Closing the connection..
        $con->close();
    }

    else
    {
        echo "Forget1 Is not working Check out The Source code";
    }

?>  