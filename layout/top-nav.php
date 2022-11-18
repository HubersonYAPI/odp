<?php
session_start();
include('../log/connection.php');

if ($_SESSION["user_id"] == NULL) {
  header("Location:../log/logout.php");
  exit;
}


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mairie Agboville</title>

    <link rel="icon" type="image/png" href="../dist/img/AdminLTELogo.png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    
    <!-- icheck bootstrap / register and login page-->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../dist/css/style.css">
    
</head>

<body class="hold-transition layout-top-nav layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
      <div class="container">
        <a href="../page/odp.php" class="navbar-brand">
          <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"> Maire Agboville</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
              <a href="../page/odp.php" class="nav-link">ACCUEIL</a>
            </li> -->
            <li class="nav-item">
              <a href="../page/odp.php" class="nav-link">ODP</a>
            </li>
            <li class="nav-item">
              <a href="../page/trader.php" class="nav-link">COMMERÇANTS </a>
            </li>
            <li class="nav-item">
              <a href="../page/cont.php" class="nav-link">AGENTS MAIRIE</a>
            </li>            
            <li class="nav-item">
              <a href="../page/mailbox.php" class="nav-link">PLAINTES</a>
            </li>

          </ul>
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
          <!-- user  -->
          <li class="nav-item">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><b><?php echo $_SESSION['user_nom'] ?> </b> </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="../log/register.php" role="button">
              <i class="fas fa-user-plus"></i>
            </a>
          </li> -->          
          
          <li class="nav-item">
            <a class="nav-link" href="../log/logout.php" role="button">
              <i class="fas fa-sign-out-alt"></i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->