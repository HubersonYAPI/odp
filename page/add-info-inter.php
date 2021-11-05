<?php 
session_start();
include('../log/connection.php');

$user_id = $_SESSION["user_id"];

// var_dump($_POST["employee_id"]);
 
$info_id = filter_var($_POST["info_name"], FILTER_SANITIZE_STRING);
$priorite = filter_var($_POST["priorite"], FILTER_SANITIZE_STRING);

$info_id = mysqli_real_escape_string($link, $info_id);
$priorite = mysqli_real_escape_string($link, $priorite);

$sql = "UPDATE intervention SET `info_id` = '$info_id', `priorite` = '$priorite', `statut` = 'En cours'
WHERE  inter_id = '".$_POST["employee_id"]."'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>