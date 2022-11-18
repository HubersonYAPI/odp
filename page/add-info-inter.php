<?php 
session_start();
include('../log/connection.php');

$user_id = $_SESSION["user_id"];

// var_dump($_POST["employee_id"]);
 
$ag_id = filter_var($_POST["ag_id"], FILTER_SANITIZE_STRING);

$ag_id = mysqli_real_escape_string($link, $ag_id);

$sql = "UPDATE plaintes SET `agents_ag_id` = '$ag_id', `plainte_status` = 'en cours'
WHERE  plainte_id = '".$_POST["employee_id"]."'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>