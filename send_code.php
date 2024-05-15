<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        
        // Get user input
        $email = $_POST['email'];

        // Generate a random code
        $verificationCode = generateRandomCode();

        // Send the verification code to the user's email
        $subject = 'Verification Code';
        $message = "Your verification code is: $verificationCode";
        $sendermail = 'From: sisodiaji21@gmail.com'; 

        $mailSent = mail($email, $subject, $message, $sendermail);

        if ($mailSent) 
        {
            echo "Verification code sent to $email";
        } 
        else 
        {
            echo "Error sending verification code. Please try again.";
        }
    }

    // Function to generate a random code
    function generateRandomCode() 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $codeLength = 7; // Adjust the length as needed
        $code = '';

        for ($i = 0; $i < $codeLength; $i++) 
        {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $code;
    }
?>
