<?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {
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
        // Generate a new Code For ever User
        //$CODE = code_user();
        
        $sql_create = "CREATE TABLE IF NOT EXISTS Verification code
                                            (
                                                count INT AUTO_INCREMENT PRIMARY KEY,
                                                Hashed_code VARCHAR(6)
                                            )";
        
        if($con->query($sql_create)=== True)
        {
            echo "Table is created..";
        }
        else
        {

        }
        $con->close();
    }
    else
    {
        echo " The Middle";
    }


?>