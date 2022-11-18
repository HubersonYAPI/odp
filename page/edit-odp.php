<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";

// check user inputs

$odp_ref = filter_var($_POST["edit_odp_ref"], FILTER_SANITIZE_STRING);
$odp_long = filter_var($_POST["edit_odp_long"], FILTER_SANITIZE_STRING);
$odp_larg = filter_var($_POST["edit_odp_larg"], FILTER_SANITIZE_STRING);
$odp_sup = filter_var($_POST["edit_odp_sup"], FILTER_SANITIZE_STRING);
$odp_quartier = filter_var($_POST["edit_odp_quartier"], FILTER_SANITIZE_STRING);
$odp_localisation = filter_var($_POST["edit_odp_localisation"], FILTER_SANITIZE_STRING);
$odp_obs = filter_var($_POST["edit_odp_obs"], FILTER_SANITIZE_STRING);
$com_id = filter_var($_POST["edit_com_id"], FILTER_SANITIZE_STRING);
$ag_id = filter_var($_POST["edit_com_id"], FILTER_SANITIZE_STRING);






// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
    // no errors
    // prepare variables for queries
    $odp_ref = mysqli_real_escape_string($link, $odp_ref);
    $odp_long = mysqli_real_escape_string($link, $odp_long);
    $odp_larg = mysqli_real_escape_string($link, $odp_larg);
    $odp_sup = mysqli_real_escape_string($link, $odp_sup);
    $odp_quartier = mysqli_real_escape_string($link, $odp_quartier);
    $odp_localisation = mysqli_real_escape_string($link, $odp_localisation);
    $odp_obs = mysqli_real_escape_string($link, $odp_obs);
    $com_id = mysqli_real_escape_string($link, $com_id);
    $ag_id = mysqli_real_escape_string($link, $ag_id);



$sql= "UPDATE odp SET odp_ref= '$odp_ref', odp_long='$odp_long', odp_larg='$odp_larg', odp_sup='$odp_sup', 
odp_quartier='$odp_quartier' , odp_localisation='$odp_localisation' , odp_obs='$odp_obs' , commercants_com_id='$com_id' , agents_ag_id='$ag_id'
WHERE odp_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the Controller details in the database</div>';
 }else {
     echo "success";
 }

}
?>