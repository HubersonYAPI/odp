<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";


// Get area

$vers_ref = filter_var($_POST["vers_ref"], FILTER_SANITIZE_STRING);
$vers_prix = filter_var($_POST["vers_prix"], FILTER_SANITIZE_STRING);
$vers_date = filter_var($_POST["vers_date"], FILTER_SANITIZE_STRING);


$vers_reglements_id = filter_var($_POST["vers_reglements_id"], FILTER_SANITIZE_STRING);
$vers_odp_id = filter_var($_POST["vers_odp_id"], FILTER_SANITIZE_STRING);
$vers_commercants_id = filter_var($_POST["vers_commercants_id"], FILTER_SANITIZE_STRING);
$vers_agents_id = filter_var($_POST["vers_agents_id"], FILTER_SANITIZE_STRING);



$avance = filter_var($_POST["reg_avance"], FILTER_SANITIZE_STRING);
$prix = filter_var($_POST["reg_prix"], FILTER_SANITIZE_STRING);
$reste = filter_var($_POST["reg_reste"], FILTER_SANITIZE_STRING);
$regl_id = filter_var($_POST["vers_reglements_id"], FILTER_SANITIZE_STRING);


$vers_prix = intval($vers_prix);
$reg_prix = intval($prix);
$reg_avance = intval($avance);
$reg_reste = intval($reste);



$reg_avance += $vers_prix ;
$reg_reste = $reg_prix - $reg_avance ;


/* var_dump($vers_prix);
var_dump($reg_prix);
var_dump($reg_avance);
var_dump($reg_reste);
die; */



/* var_dump($reg_avance);
var_dump($reg_reste); */



// $vers_reglements_id = filter_var($_POST["vers_reglements_id"], FILTER_SANITIZE_STRING);


// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $vers_ref = mysqli_real_escape_string($link, $vers_ref);
    $vers_prix = mysqli_real_escape_string($link, $vers_prix);
    $vers_date = mysqli_real_escape_string($link, $vers_date);

    $vers_reglements_id = mysqli_real_escape_string($link, $vers_reglements_id);
    $vers_odp_id = mysqli_real_escape_string($link, $vers_odp_id);
    $vers_commercants_id = mysqli_real_escape_string($link, $vers_commercants_id);
    $vers_agents_id = mysqli_real_escape_string($link, $vers_agents_id);

    $reg_reste = mysqli_real_escape_string($link, $reg_reste);
    $reg_avance = mysqli_real_escape_string($link, $reg_avance);

    // insert versements details and activation code in the odp table
    $sql = "INSERT INTO versements (vers_ref, vers_date, vers_prix, reglements_reg_id, reglements_odp_odp_id, reglements_odp_commercants_com_id, reglements_odp_agents_ag_id)
            VALUES ('$vers_ref', '$vers_date', '$vers_prix', '$vers_reglements_id', '$vers_odp_id', '$vers_commercants_id', '$vers_agents_id')";
    $result = mysqli_query($link, $sql);

    $req = "UPDATE reglements SET reg_reste= '$reg_reste', reg_avance= '$reg_avance' WHERE odp_odp_id = '" . $vers_odp_id. "'";
    $resultat = mysqli_query($link, $req);

    
    
    if (!$resultat) {
        echo '<div class="alert alert-danger">There was an error inserting the versement details in the database</div>';
    }else{
        echo "success";
    }
    
}

?>
