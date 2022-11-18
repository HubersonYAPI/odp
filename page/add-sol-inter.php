<?php 
session_start();
include('../log/connection.php');

$user_id = $_SESSION["user_id"];

// var_dump($_POST["employee_id"]);
 
$rapport = filter_var($_POST["view_rapport"], FILTER_SANITIZE_STRING);

$rapport = mysqli_real_escape_string($link, $rapport);

$sql = "UPDATE plaintes SET `plainte_rapp` = '$rapport', `plainte_status` = 'resolue'
WHERE  plainte_id = '".$_POST["employee_id"]."'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>