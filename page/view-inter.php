<?php
//start session  
session_start();
include('../log/connection.php');

if (isset($_POST["employee_id"])) {

        
    $sql = "SELECT * FROM plaintes,commercants, agents WHERE commercants.com_id = plaintes.commercants_com_id AND agents.ag_id = plaintes.agents_ag_id AND plainte_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    $intervention = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($intervention); 

}
?>