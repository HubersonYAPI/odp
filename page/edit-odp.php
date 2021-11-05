<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";

// check user inputs

$annee = filter_var($_POST["edit_annee"], FILTER_SANITIZE_STRING);
$reference = filter_var($_POST["edit_reference"], FILTER_SANITIZE_STRING);
$jour = filter_var($_POST["edit_jour"], FILTER_SANITIZE_STRING);
$longu = filter_var($_POST["edit_longu"], FILTER_SANITIZE_STRING);
$larg = filter_var($_POST["edit_larg"], FILTER_SANITIZE_STRING);
$sup = filter_var($_POST["edit_sup"], FILTER_SANITIZE_STRING);
$indic = filter_var($_POST["edit_indic"], FILTER_SANITIZE_STRING);
$reste = filter_var($_POST["edit_reste"], FILTER_SANITIZE_STRING);
$total = filter_var($_POST["edit_total"], FILTER_SANITIZE_STRING);
$secteur = filter_var($_POST["edit_secteur"], FILTER_SANITIZE_STRING);
$localisation = filter_var($_POST["edit_localisation"], FILTER_SANITIZE_STRING);
$obs = filter_var($_POST["edit_obs"], FILTER_SANITIZE_STRING);
$cont_id = filter_var($_POST["edit_cont_name"], FILTER_SANITIZE_STRING);
$trader_id = filter_var($_POST["edit_trader_id"], FILTER_SANITIZE_STRING);





// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
    // no errors
    // prepare variables for queries
    $annee = mysqli_real_escape_string($link, $annee);
    $reference = mysqli_real_escape_string($link, $reference);
    $jour = mysqli_real_escape_string($link, $jour);
    $longu = mysqli_real_escape_string($link, $longu);
    $larg = mysqli_real_escape_string($link, $larg);
    $sup = mysqli_real_escape_string($link, $sup);
    $indic = mysqli_real_escape_string($link, $indic);
    $reste = mysqli_real_escape_string($link, $reste);
    $total = mysqli_real_escape_string($link, $total);
    $secteur = mysqli_real_escape_string($link, $secteur);
    $localisation = mysqli_real_escape_string($link, $localisation);
    $obs = mysqli_real_escape_string($link, $obs);
    $cont_id = mysqli_real_escape_string($link, $cont_id);
    $trader_id = mysqli_real_escape_string($link, $trader_id);



$sql= "UPDATE odp SET annee= '$annee', reference='$reference',
jour='$jour', longu='$longu', larg='$larg' , sup='$sup' , indic='$indic' , reste='$reste' ,
total='$total' , secteur='$secteur' , localisation='$localisation' , obs='$obs' , cont_id='$cont_id' , trader_id='$trader_id' 
WHERE odp_id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($link, $sql);
 if (!$result) {
     echo '<div class="alert alert-danger">There was an error updating the Controller details in the database</div>';
 }else {
     echo "success";
 }

}
?>