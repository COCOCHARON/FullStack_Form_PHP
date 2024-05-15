<?php
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
        die("Connection failed:" . $con->connect_error);
    }
    
    
?>