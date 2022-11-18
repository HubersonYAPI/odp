<?php

// Start session
session_start();
// Connect to the database
include("connection.php");
$errors = "";

// Check user inputs
    // Define error messages
    $email = filter_var($_POST["loginemail"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["loginpassword"], FILTER_SANITIZE_STRING);

    
// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else{
    // else:no errors
    //Prepare variables for the query
    $email = mysqli_real_escape_string($link, $email);
    $password = mysqli_real_escape_string($link, $password);
    // $password = md5($password); //128 bits - 32 characters


    // run query: check combinaison of email & password exists
    $sql = "SELECT * FROM agents WHERE ag_login='$email' AND ag_mdp='$password'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">Error running the query!</div>';
        // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
        exit;
    }

    // if email and password don't match print error
    $count = mysqli_num_rows($result);

    if ($count ==1) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $_SESSION['user_id']=$row['ag_id'];
        $_SESSION['user_nom']=$row['ag_nom'];
        $_SESSION['user_mail']=$row['ag_mail'];

        echo "success";

    } else {
        $querry = "SELECT * FROM commercants WHERE com_login='$email' AND com_mdp='$password'";
        $req = mysqli_query($link, $querry);
        
        if (!$req) {
            echo '<div class="alert alert-danger">Error running the query!</div>';
            // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
            exit;
        }

        $count1 = mysqli_num_rows($req);


        if($count1 !== 1){
            echo '<div class="alert alert-danger">Identifiant ou mot de passe incorrecte</div>';
        }else {
            $row1 = mysqli_fetch_array($req, MYSQLI_ASSOC);
            $_SESSION['user_id']=$row1['com_id'];
            $_SESSION['user_nom']=$row1['com_nom'];
            $_SESSION['user_mail']=$row1['com_mail'];
    
            echo "success";
            // var_dump($_SESSION);
    
        }
    }




    








}
?>