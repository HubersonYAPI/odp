<?php

// Start session
session_start();
// Connect to the database
include("connection.php");
$errors = "";

// Check user inputs
    // Define error messages
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);

    
// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else{
    // else:no errors
    //Prepare variables for the query
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    $password = md5($password); //128 bits - 32 characters


    // run query: check combinaison of email & password exists
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">Error running the query!</div>';
        // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
        exit;
    }

    // if email and password don't match print error
    $count = mysqli_num_rows($result);
    if($count !== 1){
        echo '<div class="alert alert-danger">Wrong username or Password</div>';
    }else {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['username']=$row['username'];
        $_SESSION['email']=$row['email'];

        echo "success";

    }








}
?>