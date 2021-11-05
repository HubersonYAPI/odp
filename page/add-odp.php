<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// check user inputs
// Define errpr messages
$invalidEmail = '<p><strong>Please enter a valid email address!</strong></p>';

// Get year
if(isset($_POST["annee"])){
    $annee = filter_var($_POST["annee"], FILTER_SANITIZE_STRING);
    
}

// Get Reference
if(isset($_POST["reference"])){
    
    $reference = filter_var($_POST["reference"], FILTER_SANITIZE_STRING);
}

// Get day
if(isset($_POST["jour"])){
    $jour = filter_var($_POST["jour"], FILTER_SANITIZE_STRING);
    
}

// Get lenght
if(isset($_POST["longu"])){
    $longu = filter_var($_POST["longu"], FILTER_SANITIZE_STRING);
    
}

// Get width
if(isset($_POST["larg"])){
    $larg = filter_var($_POST["larg"], FILTER_SANITIZE_STRING);
    
}

// Get area
if(isset($_POST["sup"])){
    $sup = filter_var($_POST["sup"], FILTER_SANITIZE_STRING);
    
}

// Get indic
if(isset($_POST["indic"])){
    $indic = filter_var($_POST["indic"], FILTER_SANITIZE_STRING);
    
}

// Get remain
if(isset($_POST["reste"])){
    $reste = filter_var($_POST["reste"], FILTER_SANITIZE_STRING);
    
}

// Get total
if(isset($_POST["total"])){
    $total = filter_var($_POST["total"], FILTER_SANITIZE_STRING);
    
}

// Get controller Secteur
if(isset($_POST["secteur"])){
    $secteur = filter_var($_POST["secteur"], FILTER_SANITIZE_STRING);
    
}

// Get controller Location
if(isset($_POST["localisation"])){
    $localisation = filter_var($_POST["localisation"], FILTER_SANITIZE_STRING);
    
}
// Get observation
if(isset($_POST["obs"])){
    $obs = filter_var($_POST["obs"], FILTER_SANITIZE_STRING);
    
}


// Get area
if(isset($_POST["cont_name"])){
    $cont_name = filter_var($_POST["cont_name"], FILTER_SANITIZE_STRING);
    
}

// Get area
if(isset($_POST["trader_id"])){
    $trader_id = filter_var($_POST["trader_id"], FILTER_SANITIZE_STRING);
    
}



// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $annee = mysqli_real_escape_string($link, $annee);
    $reference = mysqli_real_escape_string($link, $reference);
    $jour = mysqli_real_escape_string($link, $jour);
    $longu = mysqli_real_escape_string($link, $longu);
    $larg = mysqli_real_escape_string($link, $larg);
    $sup = mysqli_real_escape_string($link, $sup);
    $indic = mysqli_real_escape_string($link, $indic);
    $reste = mysqli_real_escape_string($link, $reste);
    $total = mysqli_real_escape_string($link, $total);
    $secteur = mysqli_real_escape_string($link, $secteur);
    $localisation = mysqli_real_escape_string($link, $localisation);
    $obs = mysqli_real_escape_string($link, $obs);
    $cont_name = mysqli_real_escape_string($link, $cont_name);
    $trader_id = mysqli_real_escape_string($link, $trader_id);


    // *if reference exists in the users table print error
    // $sql = "SELECT * FROM odp WHERE reference = '$reference'";
    // $result = mysqli_query($link, $sql);
    // if (!$result) {
    //     echo '<div class="alert alert-danger">Error running the query!</div>';
    //     exit;
    //     // echo '<div class="alert alert-danger">'.mysqli_error($link).'</div>';
    // }

    // $results = mysqli_num_rows($result);
    // if($results){
    //     echo '<div class="alert alert-danger">That Reference is already registered. Use another one?</div>';
    //     exit;
    // }

    
    // insert odp details and activation code in the odp table
    $sql = "INSERT INTO odp (annee, reference, jour, longu, larg, sup, indic, reste, total, secteur, localisation, obs, cont_id, trader_id)
            VALUES ('$annee', '$reference', '$jour', '$longu', '$larg', '$sup', '$indic', '$reste', '$total' , '$secteur' , '$localisation' , '$obs', '$cont_name', '$trader_id' )";
    $result = mysqli_query($link, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the odp details in the database</div>';
    }else {
        echo "success";
    }


}
?>