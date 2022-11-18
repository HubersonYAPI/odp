<?php
//start session  
session_start();
include('../log/connection.php');
$errors = "";
 
 

// Get Reference
if(isset($_POST["odp_ref"])){
    
    $odp_ref = filter_var($_POST["odp_ref"], FILTER_SANITIZE_STRING);
}

// Get lenght
if(isset($_POST["odp_long"])){
    $odp_long = filter_var($_POST["odp_long"], FILTER_SANITIZE_STRING);
    
}

// Get width
if(isset($_POST["odp_larg"])){
    $odp_larg = filter_var($_POST["odp_larg"], FILTER_SANITIZE_STRING);
    
}

// Get area
if(isset($_POST["odp_sup"])){
    $odp_sup = filter_var($_POST["odp_sup"], FILTER_SANITIZE_STRING);
    
}

// Get indic
if(isset($_POST["odp_quartier"])){
    $odp_quartier = filter_var($_POST["odp_quartier"], FILTER_SANITIZE_STRING);
    
}

// Get remain
if(isset($_POST["odp_localisation"])){
    $odp_localisation = filter_var($_POST["odp_localisation"], FILTER_SANITIZE_STRING);
    
}

// Get total
if(isset($_POST["odp_obs"])){
    $odp_obs = filter_var($_POST["odp_obs"], FILTER_SANITIZE_STRING);
    
}


// Get area
if(isset($_POST["com_id"])){
    $com_id = filter_var($_POST["com_id"], FILTER_SANITIZE_STRING);
    
}

// Get area
if(isset($_POST["ag_id"])){
    $ag_id = filter_var($_POST["ag_id"], FILTER_SANITIZE_STRING);
    
}

    /* $reg_ref = filter_var($_POST["reg_ref"], FILTER_SANITIZE_STRING);
    $reg_nbre_jour = filter_var($_POST["reg_nbre_jour"], FILTER_SANITIZE_STRING);
    $reg_avance = filter_var($_POST["reg_avance"], FILTER_SANITIZE_STRING);
    $reg_reste = filter_var($_POST["reg_reste"], FILTER_SANITIZE_STRING);
    $reg_prix = filter_var($_POST["reg_prix"], FILTER_SANITIZE_STRING);
    $reg_status = filter_var($_POST["reg_status"], FILTER_SANITIZE_STRING);

    $reg_date = date("d/m/Y"); */


// if there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">'.$errors.'</div>';
    echo $resultMessage;
}else {
        // no errors
        // prepare variables for queries
    $odp_ref = mysqli_real_escape_string($link, $odp_ref);
    $odp_long = mysqli_real_escape_string($link, $odp_long);
    $odp_larg = mysqli_real_escape_string($link, $odp_larg);
    $odp_sup = mysqli_real_escape_string($link, $odp_sup);
    $odp_quartier = mysqli_real_escape_string($link, $odp_quartier);
    $odp_localisation = mysqli_real_escape_string($link, $odp_localisation);
    $odp_obs = mysqli_real_escape_string($link, $odp_obs);
    $com_id = mysqli_real_escape_string($link, $com_id);
    $ag_id = mysqli_real_escape_string($link, $ag_id);

/*     $reg_ref = mysqli_real_escape_string($link, $reg_ref);
    $reg_nbre_jour = mysqli_real_escape_string($link, $reg_nbre_jour);
    $reg_avance = mysqli_real_escape_string($link, $reg_avance);
    $reg_reste = mysqli_real_escape_string($link, $reg_reste);
    $reg_prix = mysqli_real_escape_string($link, $reg_prix);
    $reg_status = mysqli_real_escape_string($link, $reg_status);
    $reg_date = mysqli_real_escape_string($link, $reg_date);
      
 */

    // insert odp details and activation code in the odp table
    $sql = "INSERT INTO odp (odp_ref, odp_long, odp_larg, odp_sup, odp_quartier, odp_localisation, odp_obs, commercants_com_id, agents_ag_id)
            VALUES ('$odp_ref', '$odp_long', '$odp_larg', '$odp_sup', '$odp_quartier', '$odp_localisation', '$odp_obs', '$com_id', '$ag_id')";
    $result = mysqli_query($link, $sql);

    // var_dump($result);
    
   

    $test = "SELECT * FROM odp ORDER BY odp_id DESC";
    $tester = mysqli_query($link, $test);
    $row = mysqli_fetch_array($tester);

    $reg_odp_id = $row[0];
    $reg_com_id = $row[8];
    $reg_ag_id = $row[9];

    $reg_ref = filter_var($_POST["reg_ref"], FILTER_SANITIZE_STRING);
    $reg_nbre_jour = filter_var($_POST["reg_nbre_jour"], FILTER_SANITIZE_STRING);
    $reg_vers = filter_var($_POST["reg_vers"], FILTER_SANITIZE_STRING);
    // $reg_avance = filter_var($_POST["reg_avance"], FILTER_SANITIZE_STRING);
    // $reg_reste = filter_var($_POST["reg_reste"], FILTER_SANITIZE_STRING);
    $reg_prix = filter_var($_POST["reg_prix"], FILTER_SANITIZE_STRING);
    $reg_status = filter_var($_POST["reg_status"], FILTER_SANITIZE_STRING);


    $reg_date = date("d/m/Y");
    $reg_reste = $reg_prix-$reg_vers;

    if ($reg_reste !==0) {
        $reg_status = "non soldé";
        $reg_avance = $reg_vers;
    }else {
        $reg_status = "soldé";
        $reg_avance = 0;

    }

    if ($reg_avance > $reg_prix) {
        echo '<div class="alert alert-danger">Montant Avance entrer est supérieur au prix Total</div>';
    exit;
    }

    

    $reg_ref = mysqli_real_escape_string($link, $reg_ref);
    $reg_nbre_jour = mysqli_real_escape_string($link, $reg_nbre_jour);
    $reg_vers = mysqli_real_escape_string($link, $reg_vers);
    $reg_avance = mysqli_real_escape_string($link, $reg_avance);
    $reg_reste = mysqli_real_escape_string($link, $reg_reste);
    $reg_prix = mysqli_real_escape_string($link, $reg_prix);
    $reg_status = mysqli_real_escape_string($link, $reg_status);
    $reg_date = mysqli_real_escape_string($link, $reg_date);
    

    $regl = "INSERT INTO reglements (reg_ref, reg_date, reg_nbre_jour, reg_vers, reg_avance, reg_reste, reg_prix, reg_status, odp_commercants_com_id, odp_odp_id, odp_agents_ag_id)
                VALUES ('$reg_ref', '$reg_date', '$reg_nbre_jour', $reg_vers, '$reg_avance', '$reg_reste', '$reg_prix', '$reg_status', '$reg_com_id', '$reg_odp_id', '$reg_ag_id')";
    $reglm = mysqli_query($link, $regl);

    if (!$reglm) {
        echo '<div class="alert alert-danger">Failled to apply. Please contact IT service</div>';
      
    } else {
        echo 'success';
    }


  /*   var_dump($reg_odp_id);
    var_dump($reg_com_id);
    var_dump($reg_ag_id);
    var_dump($reg_ref);
    var_dump($reg_nbre_jour);
    var_dump($reg_avance);
    var_dump($reg_reste);
    var_dump($reg_prix);
    var_dump($reg_status);
    var_dump($reg_date);
    var_dump($reglm); */

    

    /* foreach ($tester as $teste) :

    $reg_odp_id = $teste['odp_id'];
    var_dump($reg_odp_id);

endforeach; */

    /* if (!$result) {
        echo '<div class="alert alert-danger">There was an error inserting the odp details in the database</div>';
    }else {

        $regl = "INSERT INTO reglements (reg_ref, reg_date, reg_date_debut, reg_date_fin, reg_nbre_jour, reg_avance, reg_reste, reg_prix, reg_status, odp_commercants_com_id, odp_odp_id, odp_agents_ag_id)
                VALUES ('$reg_ref', '$reg_date', '$reg_date_debut', '$reg_date_fin', '$reg_nbre_jour', '$reg_avance', '$reg_reste', '$reg_prix', '$reg_status', '$com_id', '$ag_id')";
        $results = mysqli_query($link, $regl);

        if (!$results) {
            echo '<div class="alert alert-danger">There was an error inserting the reglements details in the database</div>';
            var_dump($results);
        }
        echo "success";
    } */


}
?>