<?php 
session_start();
include('../log/connection.php');

$com_id = $_SESSION["user_id"];

$agents_ag_id = 1 ;

 
$motif = filter_var($_POST["plainte_motif"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["plainte_des"], FILTER_SANITIZE_STRING);

$motif = mysqli_real_escape_string($link, $motif);
$description = mysqli_real_escape_string($link, $description);
$com_id = mysqli_real_escape_string($link, $com_id);
$agents_ag_id = mysqli_real_escape_string($link, $agents_ag_id);



$sql = "INSERT INTO plaintes (plainte_motif, plainte_des, commercants_com_id, agents_ag_id)
        VALUES ('$motif', '$description', '$com_id', '$agents_ag_id' )";
$result = mysqli_query($link, $sql);

if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>