<?php 
session_start();
include('../log/connection.php');

$user_id = $_SESSION["user_id"];

// var_dump($_POST["employee_id"]);
 
$diagnostic = filter_var($_POST["view_diagnostic"], FILTER_SANITIZE_STRING);
$solution = filter_var($_POST["view_solution"], FILTER_SANITIZE_STRING);

$diagnostic = mysqli_real_escape_string($link, $diagnostic);
$solution = mysqli_real_escape_string($link, $solution);

$sql = "UPDATE intervention SET `diagnostic` = '$diagnostic', `solution` = '$solution', `statut` = 'Resolue'
WHERE  inter_id = '".$_POST["employee_id"]."'";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
  
} else {
    echo 'success';
}

?>