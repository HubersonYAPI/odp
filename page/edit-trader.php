<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";

// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

$trader_name = filter_var($_POST["edit_trader_name"], FILTER_SANITIZE_STRING);
$trader_company = filter_var($_POST["edit_trader_company"], FILTER_SANITIZE_STRING);
$trader_phone = filter_var($_POST["edit_trader_phone"], FILTER_SANITIZE_STRING);
$trader_phone2 = filter_var($_POST["edit_trader_phone2"], FILTER_SANITIZE_STRING);
$trader_addr = filter_var($_POST["edit_trader_addr"], FILTER_SANITIZE_STRING);
$trader_mail = filter_var($_POST["edit_trader_mail"], FILTER_SANITIZE_EMAIL);
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




$sql= "UPDATE trader SET trader_name= '$trader_name', trader_company='$trader_company', trader_phone='$trader_phone',
trader_phone2='$trader_phone2', trader_mail='$trader_mail', trader_addr='$trader_addr' 
WHERE trader_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the trader details in the database</div>';
 }else {
     echo "success";
 }

}
?>