<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";



$trader_name = filter_var($_POST["edit_trader_name"], FILTER_SANITIZE_STRING);
$trader_fname = filter_var($_POST["edit_trader_fname"], FILTER_SANITIZE_STRING);
$trader_company = filter_var($_POST["edit_trader_company"], FILTER_SANITIZE_STRING);
$trader_phone = filter_var($_POST["edit_trader_phone"], FILTER_SANITIZE_STRING);
$trader_phone2 = filter_var($_POST["edit_trader_phone2"], FILTER_SANITIZE_STRING);
$trader_addr = filter_var($_POST["edit_trader_addr"], FILTER_SANITIZE_STRING);
$trader_mail = filter_var($_POST["edit_trader_mail"], FILTER_SANITIZE_EMAIL);


// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
    // no errors
    // prepare variables for queries
$trader_name = mysqli_real_escape_string($link, $trader_name);
$trader_fname = mysqli_real_escape_string($link, $trader_fname);
$trader_company = mysqli_real_escape_string($link, $trader_company);
$trader_phone = mysqli_real_escape_string($link, $trader_phone);
$trader_phone2 = mysqli_real_escape_string($link, $trader_phone2);
$trader_mail = mysqli_real_escape_string($link, $trader_mail);
$trader_addr = mysqli_real_escape_string($link, $trader_addr);




$sql= "UPDATE commercants SET com_nom= '$trader_name', com_prenoms= '$trader_fname', com_ent='$trader_company', com_cel1='$trader_phone',
com_cel2='$trader_phone2', com_mail='$trader_mail', com_addr='$trader_addr' 
WHERE com_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the trader details in the database</div>';
 }else {
     echo "success";
 }

}
?>