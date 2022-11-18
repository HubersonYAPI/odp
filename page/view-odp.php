<?php
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {    
    $sql = "SELECT * FROM odp,commercants,agents WHERE odp.commercants_com_id = commercants.com_id AND odp.agents_ag_id = agents.ag_id AND odp_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    $odp = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($odp); 
}
?>