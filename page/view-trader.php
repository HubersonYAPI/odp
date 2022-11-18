<?php 
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {
    $sql = "SELECT * FROM commercants WHERE com_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    $trader = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($trader); 
}
?>