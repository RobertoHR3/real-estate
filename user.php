<?php	
    //Iport conection
    require 'includes/config/database.php';
    $db = dbConnection();
    //Create an e-mail and password
    $email = 'correo@correo.com';
    $password = '123456';
    //Query to create user
    $query_account = "INSERT INTO users (email, password) VALUES ('$email', '$password');";
    echo $query_account;
    //Add to database
    mysqli_query($db, $query_account);
?>