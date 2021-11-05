<?php 
session_start();
include('../log/connection.php');

$user_id = $_SESSION["user_id"];

 
$panne = filter_var($_POST["panne"], FILTER_SANITIZE_STRING);
$description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);

$panne = mysqli_real_escape_string($link, $panne);
$description = mysqli_real_escape_string($link, $description);
$user_id = mysqli_real_escape_string($link, $user_id);

$sql = "INSERT INTO intervention (panne, description, user_id)
        VALUES ('$panne', '$description', '$user_id' )";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>