<?php
//start session  
session_start();
include('connection.php');
$errors = "";

// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';
$invalidPassword ='<p><strong>Error Password <br> (6 characters inculde 1 capital letter and 1 number)</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';


// Get username
if(isset($_POST["username"])){
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    
}

// Get phone
if(isset($_POST["phone"])){
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    
}

// Get service
if(isset($_POST["service"])){
    $service = filter_var($_POST["service"], FILTER_SANITIZE_STRING);
    
}

// Get poste
if(isset($_POST["poste"])){
    $poste = filter_var($_POST["poste"], FILTER_SANITIZE_STRING);
    
}

//Get email
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors .= $invalidEmail;
}

// Get password
if (!(strlen($_POST["password"])>6 and preg_match('/[A-Z]/', $_POST["password"])
and preg_match('/[0-9]/', $_POST["password"]) )){
    $errors .= $invalidPassword;
}else {
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
    if ($password !== $password2) {
        $errors .= $differentPassword;
    }
}

// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
    // no errors
    // prepare variables for queries
$username = mysqli_real_escape_string($link, $username);
$email = mysqli_real_escape_string($link, $email);
$phone = mysqli_real_escape_string($link, $phone);
$service = mysqli_real_escape_string($link, $service);
$poste = mysqli_real_escape_string($link, $poste);
$password = mysqli_real_escape_string($link, $password);
$password = md5($password); //128 bits - 32 characters
// $password = hash('sha256', $password); //256 bits - 64 characters

// if username exists in the users table print error
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Error running the query!</div>';
    // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
    exit;
}

$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered. Do you want to log in?</div>';
    exit;
}

// if email exists in the users table print error
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Error running the query!</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
    exit;
}


// insert user details and activation code in the users table
$sql = "INSERT INTO users (username, email, password, service, poste, phone)
        VALUES ('$username', '$email', '$password', '$service', '$poste', '$phone' )";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database</div>';
}else {
    echo "success";
}


}
?>