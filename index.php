<?php
session_start();
include('log/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mairie Agboville</title>

  <link rel="icon" type="image/png" href="dist/img/AdminLTELogo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">


  <style>
    .login-box-msg {
      font-size: 25px;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#">Gestion <b>ODP</b></a>
    </div>
    <!-- /.login-logo -->

    <form id="loginform" method="post">

      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg"><b>Espace Connexion</b> </p>

          <div id="loginmessage"></div>

          <div class="input-group mb-3">
            <input type="text" class="form-control" name="loginemail" id="loginemail" placeholder="Identifiant" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="loginpassword" id="loginpassword" placeholder="Mot de passe" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <hr>
    </form>

    <div class="social-auth-links text-center mb-3">
      <button type="submit" class="btn btn-primary btn-block" id="loginbtn" name="loginbtn">Se Connecter</button>
    </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-card-body -->
  </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script>
    // Ajax call for the login up form
// Once the form is submitted
$("#loginform").submit(function (event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  
    var datatopost = $(this).serializeArray();
    // console.log(datatopost);
    // send them to signup.php using AJAX  
    $.ajax({
        url: "log/login.php",
        type:"POST",
        data: datatopost,
        success: function (data) {
            if (data == "success"){
                window.location = "page/cont.php";
            }else{
                $('#loginmessage').html(data);
    // console.log('fail');

            }
        },
        error: function () {
            $("#loginmessage").html("<div class='alert alert-danger'>There was an error with Ajax Call. Please try again later.</div>");
            
        }

    });
    
});
  </script>
</body>

</html>