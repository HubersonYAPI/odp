<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";

// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

$cont_name = filter_var($_POST["edit_cont_name"], FILTER_SANITIZE_STRING);
$cont_phone = filter_var($_POST["edit_cont_phone"], FILTER_SANITIZE_STRING);
$cont_phone2 = filter_var($_POST["edit_cont_phone2"], FILTER_SANITIZE_STRING);
$cont_addr = filter_var($_POST["edit_cont_addr"], FILTER_SANITIZE_STRING);
$cont_mail = filter_var($_POST["edit_cont_mail"], FILTER_SANITIZE_EMAIL);
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




$sql= "UPDATE controller SET cont_name= '$cont_name', cont_phone='$cont_phone',
cont_phone2='$cont_phone2', cont_mail='$cont_mail', cont_addr='$cont_addr' 
WHERE cont_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the Controller details in the database</div>';
 }else {
     echo "success";
 }

}
?>