<?php
//start session  
session_start();
include('../log/connection.php');



$sql = "DELETE  FROM trader WHERE trader_id = '".$_POST["employee_id"]."'";
    $result = mysqli_query($link, $sql);
    echo json_encode($result);
//     if (!$result) {
//         echo "error";
//     }else {
//         echo "success";
//     }

?>