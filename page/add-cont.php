<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

// Get username
if(isset($_POST["cont_name"])){
    $cont_name = filter_var($_POST["cont_name"], FILTER_SANITIZE_STRING);
    
}

$cont_img = filter_var($_POST["cont_img"], FILTER_SANITIZE_STRING);


// Get phone
if(isset($_POST["cont_phone"])){
    $cont_phone = filter_var($_POST["cont_phone"], FILTER_SANITIZE_STRING);
    
}

// Get phone2
if(isset($_POST["cont_phone2"])){
    $cont_phone2 = filter_var($_POST["cont_phone2"], FILTER_SANITIZE_STRING);
    
}


// Get Adresse
if(isset($_POST["cont_addr"])){
    $cont_addr = filter_var($_POST["cont_addr"], FILTER_SANITIZE_STRING);
    
}


//Get email
$cont_mail = filter_var($_POST["cont_mail"], FILTER_SANITIZE_EMAIL);
if(!filter_var($cont_mail, FILTER_VALIDATE_EMAIL)){
    $errors .= $invalidEmail;
}

// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $cont_name = mysqli_real_escape_string($link, $cont_name);
    $cont_phone = mysqli_real_escape_string($link, $cont_phone);
    $cont_phone2 = mysqli_real_escape_string($link, $cont_phone2);
    $cont_mail = mysqli_real_escape_string($link, $cont_mail);
    $cont_addr = mysqli_real_escape_string($link, $cont_addr);
    $cont_img = mysqli_real_escape_string($link, $cont_img);



    // if username exists in the users table print error
    $sql = "SELECT * FROM controller WHERE cont_name = '$cont_name'";
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
    $sql = "SELECT * FROM controller WHERE cont_phone = '$cont_phone' OR cont_phone2 = '$cont_phone' ";
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
    $sql = "INSERT INTO controller (cont_name, cont_img, cont_phone, cont_phone2, cont_mail, cont_addr)
            VALUES ('$cont_name', '$cont_img', '$cont_phone', '$cont_phone2', '$cont_mail', '$cont_addr' )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database</div>';
    }else {
        echo "success";
    }


}
?>