<?php
include("../layout/top-nav.php");
?>

<div class="content-wrapper register-page">

  <!-- Content Header (Page header) -->
  <section class="content-header"></section>

  <section class="content">
    <div class="container">
      <div class="register-box">
        <div class="register-logo">
          <a href="#">Gestion <b>ODP</b></a>
        </div>

        <form id="signupform" method="post">

          <div class="card">
            <div class="card-body register-card-body">
              <p class="login-box-msg" style="font-size: 25px;"><b>Nouvel Utilisateur</b> </p>

              <div id="signupmessage"></div>

              <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Nom & Prénoms" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Telephone" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                  </div>
                </div>
              </div>
              <div class="form-group mb-3">
                <select class="form-control mb-3" name="service" id="service" data-placeholder="Service" autocomplete="off">
                  <option>Secrétaire General</option>
                  <option>Service Financier</option>
                  <option>Service Technique</option>
                  <option>Service Administratifs</option>
                  <option>Service Socio-culturel</option>

                </select>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="poste" id="poste" placeholder="Post" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                  </div>
                </div>
              </div>


              <hr>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password2" id="password2" placeholder="Confirmer Mot de passe" autocomplete="off">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">

                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <!-- <input class="btn btn-primary btn-block" name="signup" id="signup" type="submit" value="Enregistrer"> -->
                  <button type="submit" class="btn btn-primary btn-block" name="signup" id="signup">Enregistrer</button>
                </div>
                <!-- /.col -->
              </div>
        </form>
      </div>
    </div>
  </section>


</div>
<!-- /.form-box -->

<?php
include("../layout/main-footer.php");
?>

<!-- Verification Process -->
<script>
  // Ajax call for the sign up form
  // Once the form is submitted
  $("#signupform").submit(function(event) {
    // prevent default php procesing
    event.preventDefault();
    // collect user inputs  
    var datatopost = $(this).serializeArray();
    console.log(datatopost);
    // send them to signup.php using AJAX
    $.ajax({
      url: "signup.php",
      type: "POST",
      data: datatopost,
      success: function(data) {
        if (data == "success") {
          window.location = "http://localhost/odp/page/odp.php";
        } else {
          $("#signupmessage").html(data);
        }
      },
      error: function() {
        $("#signupmessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
      }

    });

  });
</script>

</body>

</html>