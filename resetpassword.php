<?php

// Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") 
    {//Database Credetials 
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
        $CODE = code_user();
        $sql_create = "CREATE TABLE IF NOT EXISTS Verification code
                                            (
                                                count INT AUTO_INCREMENT PRIMARY KEY,
                                                Hashed_code VARCHAR(6)
                                            )";
        if($con->query($sql_create)=== True)
        {
            echo "Table is created..";
        }

        $sql_code_insert = "INSERT INTO Verification code(Hashed_Code) values('$CODE')";

        $result = mysqli_query($con, $sql_code_insert);

        if ($result) 
        {
            // Send the new password to the user via email or display it on a page
            code_mail($email, $CODE);
            echo "Code successfully Sent to Registered mail. Check your email for the new password.";
        } 
        else 
        {
            echo "Error updating password: " . mysqli_error($con);
        }
        
        $con->close();
    }
    else
    {
        echo " The Middle";
    }

    // Function to generate a random password
        function code_user()
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
            $code = '';
            $length = 6; // Adjust the length as needed

            for ($i = 0; $i < $length; $i++) 
            {
                $code .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $code;
        }

    // Function to send the new password via email
        function code_mail($email, $code) 
        {
            // Implement your email sending logic here
            // Example using PHP's mail() function
            $subject = 'Password Reset';
            $message = "Your Verification Code is: $code";
            $headers = 'From: sisodiaji21@gmail.com';

            mail($email, $subject, $message, $headers);
        }
    
?>
