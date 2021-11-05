<?php
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {
    
    $sql = "SELECT * FROM intervention,users WHERE intervention.user_id=users.user_id AND inter_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    $intervention = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($intervention); 
}
?>