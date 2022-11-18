<?php 
// connect to the database

// $link = mysqli_connect("localhost", "id17598147_webcourse", "fQJ=U%0fZ%/2%^R^", "id17598147_completewebcourse", );

$link = mysqli_connect("localhost", "root", "", "odpl3", );
if(mysqli_connect_error()){
    die("ERROR: Unable to connect:".mysqli_connect_error());
}

?>