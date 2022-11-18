<?php
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {    
    $sql = "SELECT * FROM odp, commercants, agents, reglements WHERE reglements.odp_commercants_com_id = commercants.com_id AND reglements.odp_odp_id = odp.odp_id AND reglements.odp_agents_ag_id = agents.ag_id AND odp_id = '".$_POST["employee_id"]."'";
    $resultat = mysqli_query($link, $sql);
    // var_dump($resultat);
    $reg = mysqli_fetch_array($resultat, MYSQLI_ASSOC);
    echo json_encode($reg); 
}
?>