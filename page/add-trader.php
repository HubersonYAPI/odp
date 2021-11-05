<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

// Get username
if(isset($_POST["trader_name"])){
    $trader_name = filter_var($_POST["trader_name"], FILTER_SANITIZE_STRING);
    
}

// Get username
if(isset($_POST["trader_company"])){
    $trader_company = filter_var($_POST["trader_company"], FILTER_SANITIZE_STRING);
    
}

// Get phone
if(isset($_POST["trader_phone"])){
    $trader_phone = filter_var($_POST["trader_phone"], FILTER_SANITIZE_STRING);
    
}

// Get phone2
if(isset($_POST["trader_phone2"])){
    $trader_phone2 = filter_var($_POST["trader_phone2"], FILTER_SANITIZE_STRING);
    
}


// Get Adresse
if(isset($_POST["trader_addr"])){
    $trader_addr = filter_var($_POST["trader_addr"], FILTER_SANITIZE_STRING);
    
}


//Get email
$trader_mail = filter_var($_POST["trader_mail"], FILTER_SANITIZE_EMAIL);
if(!filter_var($trader_mail, FILTER_VALIDATE_EMAIL)){
    $errors .= $invalidEmail;
}

// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $trader_name = mysqli_real_escape_string($link, $trader_name);
    $trader_company = mysqli_real_escape_string($link, $trader_company);
    $trader_phone = mysqli_real_escape_string($link, $trader_phone);
    $trader_phone2 = mysqli_real_escape_string($link, $trader_phone2);
    $trader_mail = mysqli_real_escape_string($link, $trader_mail);
    $trader_addr = mysqli_real_escape_string($link, $trader_addr);



    // if username exists in the users table print error
    $sql = "SELECT * FROM trader WHERE trader_name = '$trader_name'";
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
    $sql = "SELECT * FROM trader WHERE trader_phone = '$trader_phone' OR trader_phone2 = '$trader_phone' ";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">That Phone number is already registered. Use another one</div>';
        exit;
    }


    // insert user details and activation code in the users table
    $sql = "INSERT INTO trader (trader_name, trader_company, trader_phone, trader_phone2, trader_mail, trader_addr)
            VALUES ('$trader_name', '$trader_company', '$trader_phone', '$trader_phone2', '$trader_mail', '$trader_addr' )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database</div>';
    }else {
        echo "success";
    }


}
?>