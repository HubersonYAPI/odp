<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";

// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

$cont_name = filter_var($_POST["edit_ag_nom"], FILTER_SANITIZE_STRING);
$cont_fname = filter_var($_POST["edit_ag_prenoms"], FILTER_SANITIZE_STRING);
$cont_phone = filter_var($_POST["edit_ag_cel1"], FILTER_SANITIZE_STRING);
$cont_phone2 = filter_var($_POST["edit_ag_cel2"], FILTER_SANITIZE_STRING);
$cont_addr = filter_var($_POST["edit_ag_addr"], FILTER_SANITIZE_STRING);
$cont_serv = filter_var($_POST["edit_ag_service"], FILTER_SANITIZE_STRING);
$cont_poste = filter_var($_POST["edit_ag_poste"], FILTER_SANITIZE_STRING);
$cont_mail = filter_var($_POST["edit_ag_mail"], FILTER_SANITIZE_EMAIL);
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
$cont_fname = mysqli_real_escape_string($link, $cont_fname);
$cont_phone = mysqli_real_escape_string($link, $cont_phone);
$cont_phone2 = mysqli_real_escape_string($link, $cont_phone2);
$cont_mail = mysqli_real_escape_string($link, $cont_mail);
$cont_addr = mysqli_real_escape_string($link, $cont_addr);
$cont_serv = mysqli_real_escape_string($link, $cont_serv);
$cont_poste = mysqli_real_escape_string($link, $cont_poste);




$sql= "UPDATE agents SET ag_nom= '$cont_name', ag_prenoms= '$cont_fname', ag_cel1='$cont_phone',
ag_cel2='$cont_phone2', ag_mail='$cont_mail', ag_addr='$cont_addr' , ag_service='$cont_serv', ag_poste='$cont_poste'
WHERE ag_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the agents details in the database</div>';
 }else {
     echo "success";
 }

}
?>