<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Adresse mail invalide</strong></p>';

// Get last name
if(isset($_POST["ag_nom"])){
    $ag_nom = filter_var($_POST["ag_nom"], FILTER_SANITIZE_STRING);
    
}

// Get first name
if(isset($_POST["ag_prenoms"])){
    $ag_prenoms = filter_var($_POST["ag_prenoms"], FILTER_SANITIZE_STRING);
    
}

// Get phone
if(isset($_POST["ag_cel1"])){
    $ag_cel1 = filter_var($_POST["ag_cel1"], FILTER_SANITIZE_STRING);
    
}

// Get phone2
if(isset($_POST["ag_cel2"])){
    $ag_cel2 = filter_var($_POST["ag_cel2"], FILTER_SANITIZE_STRING);
    
}


// Get Adresse
if(isset($_POST["ag_addr"])){
    $ag_addr = filter_var($_POST["ag_addr"], FILTER_SANITIZE_STRING);
    
}

// Get Service
if(isset($_POST["ag_service"])){
    $ag_service = filter_var($_POST["ag_service"], FILTER_SANITIZE_STRING);
    
}

// Get Post
if(isset($_POST["ag_poste"])){
    $ag_poste = filter_var($_POST["ag_poste"], FILTER_SANITIZE_STRING);
    
}

// Get login
if(isset($_POST["ag_login"])){
    $ag_login = filter_var($_POST["ag_login"], FILTER_SANITIZE_STRING);
    
}

// Get Password
if(isset($_POST["ag_mdp"])){
    $ag_mdp = filter_var($_POST["ag_mdp"], FILTER_SANITIZE_STRING);
    
}

//Get email
$ag_mail = filter_var($_POST["ag_mail"], FILTER_SANITIZE_EMAIL);
if(!filter_var($ag_mail, FILTER_VALIDATE_EMAIL)){
    $errors .= $invalidEmail;
}

$ag_role = "user";
   


// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $ag_nom = mysqli_real_escape_string($link, $ag_nom);
    $ag_prenoms = mysqli_real_escape_string($link, $ag_prenoms);
    $ag_cel1 = mysqli_real_escape_string($link, $ag_cel1);
    $ag_cel2 = mysqli_real_escape_string($link, $ag_cel2);
    $ag_mail = mysqli_real_escape_string($link, $ag_mail);
    $ag_addr = mysqli_real_escape_string($link, $ag_addr);
    $ag_service = mysqli_real_escape_string($link, $ag_service);
    $ag_poste = mysqli_real_escape_string($link, $ag_poste);
    $ag_login = mysqli_real_escape_string($link, $ag_login);
    $ag_mdp = mysqli_real_escape_string($link, $ag_mdp);
    $ag_mdp = md5($ag_mdp); //128 bits - 32 characters
    $ag_role = mysqli_real_escape_string($link, $ag_role);

     
    // if the phone number exists in the users table print error
    $sql = "SELECT * FROM agents WHERE ag_cel1 = '$ag_cel1'";
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
    $sql = "INSERT INTO agents (ag_nom, ag_prenoms, ag_cel1, ag_cel2, ag_mail, ag_addr, ag_login, ag_mdp, ag_service, ag_poste, ag_role)
            VALUES ('$ag_nom', '$ag_prenoms', '$ag_cel1', '$ag_cel2', '$ag_mail', '$ag_addr', '$ag_login', '$ag_mdp', '$ag_service', '$ag_poste', '$ag_role' )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the users details in the database</div>';
    }else {
        echo "success";
        // var_dump($result);
    }


}
?>