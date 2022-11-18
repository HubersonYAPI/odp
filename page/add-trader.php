<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// Get last name
if(isset($_POST["com_nom"])){
    $trader_name = filter_var($_POST["com_nom"], FILTER_SANITIZE_STRING);
    
}

// Get first name
if(isset($_POST["com_prenoms"])){
    $trader_fname = filter_var($_POST["com_prenoms"], FILTER_SANITIZE_STRING);
    
}

// Get username
if(isset($_POST["com_ent"])){
    $trader_company = filter_var($_POST["com_ent"], FILTER_SANITIZE_STRING);
    
}

// Get phone
if(isset($_POST["com_cel1"])){
    $trader_phone = filter_var($_POST["com_cel1"], FILTER_SANITIZE_STRING);
    
}

// Get phone2
if(isset($_POST["com_cel2"])){
    $trader_phone2 = filter_var($_POST["com_cel2"], FILTER_SANITIZE_STRING);
    
}


// Get Adresse
if(isset($_POST["com_addr"])){
    $trader_addr = filter_var($_POST["com_addr"], FILTER_SANITIZE_STRING);
    
}

// Get login
if(isset($_POST["com_login"])){
    $trader_log = filter_var($_POST["com_login"], FILTER_SANITIZE_STRING);
    
}
// Get Password
if(isset($_POST["com_mdp"])){
    $trader_psw = filter_var($_POST["com_mdp"], FILTER_SANITIZE_STRING);
    
}

$trader_role = "commercant";


// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $trader_name = mysqli_real_escape_string($link, $trader_name);
    $trader_fname = mysqli_real_escape_string($link, $trader_fname);
    $trader_company = mysqli_real_escape_string($link, $trader_company);
    $trader_phone = mysqli_real_escape_string($link, $trader_phone);
    $trader_phone2 = mysqli_real_escape_string($link, $trader_phone2);
    $trader_mail = mysqli_real_escape_string($link, $trader_mail);
    $trader_addr = mysqli_real_escape_string($link, $trader_addr);
    $trader_log = mysqli_real_escape_string($link, $trader_log);
    $trader_psw = mysqli_real_escape_string($link, $trader_psw);
    $trader_psw = md5($trader_psw); //128 bits - 32 characters
    $trader_role = mysqli_real_escape_string($link, $trader_role);

    // if phone exists in the users table print error
    $sql = "SELECT * FROM commercants WHERE com_cel1 = '$trader_phone'";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">Error running the query!</div>';
        exit;
    }
    $results = mysqli_num_rows($result);
    if($results){
        echo '<div class="alert alert-danger">Ce Numéro est déjà utiliser par une autre personne</div>';
        exit;
    }


    // insert user details and activation code in the users table
    $sql = "INSERT INTO commercants (com_nom, com_prenoms, com_cel1, com_cel2, com_mail, com_addr, com_login, com_mdp, com_ent, com_role)
            VALUES ('$trader_name', '$trader_fname', '$trader_phone', '$trader_phone2', '$trader_mail', '$trader_addr', '$trader_log', '$trader_psw', '$trader_company', '$trader_role' )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database</div>';
    }else {
        echo "success";
    }


}
?>