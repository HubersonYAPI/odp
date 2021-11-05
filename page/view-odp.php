<?php
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {
    
    $sql = "SELECT * FROM odp,trader,controller WHERE odp.trader_id=trader.trader_id AND odp.cont_id=controller.cont_id AND odp_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    $odp = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($odp); 
}
?>