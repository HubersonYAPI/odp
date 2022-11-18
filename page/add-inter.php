<?php 
session_start();
include('../log/connection.php');
$errors = "";


$com_id = 5;

$agents_ag_id = $_SESSION["user_id"] ;

 
$motif = filter_var($_POST["plainte_motif"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["plainte_des"], FILTER_SANITIZE_STRING);
$plainte_rapp = "test";
$plainte_status = "recue";

if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {

    $motif = mysqli_real_escape_string($link, $motif);
    $description = mysqli_real_escape_string($link, $description);
    $plainte_rapp = mysqli_real_escape_string($link, $plainte_rapp);
    $plainte_status = mysqli_real_escape_string($link, $plainte_status);
    $com_id = mysqli_real_escape_string($link, $com_id);
    $agents_ag_id = mysqli_real_escape_string($link, $agents_ag_id);

    


    $req = "INSERT INTO plaintes (plainte_motif, plainte_des, plainte_rapp, plainte_status, commercants_com_id, agents_ag_id)
                VALUES ('$motif', '$description', '$plainte_rapp', '$plainte_status', '$com_id', '$agents_ag_id')";
    $result = mysqli_query($link, $req);

    /* $sql = "INSERT INTO plaintes (plainte_motif, plainte_des, plainte_rapp, plainte_status, commercants_com_id, agents_ag_id)
            VALUES ('$motif', '$description', '$plainte_rapp', '$plainte_status', '$com_id', '$agents_ag_id' )";
    $result = mysqli_query($link, $sql); */

    
    

    if (!$result) {
        echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
    
    } else {
        echo 'success';
    }
}

?>