<?php
include("../layout/top-nav.php");
?>

<?php
// Get the user_id
// $user_id = $_SESSION["user_id"];
$id = $_GET['id'];
$sql = "SELECT * FROM odp,commercants,agents, reglements WHERE reglements.odp_odp_id = odp.odp_id AND odp.commercants_com_id = commercants.com_id AND odp.agents_ag_id = agents.ag_id AND odp_id = '$id'";

// $sql = 'SELECT * FROM plaintes, commercants WHERE commercants.com_id = plaintes.commercants_com_id ORDER BY plainte_id DESC';
$plaintes = mysqli_query($link, $sql);
$odp = mysqli_fetch_array($plaintes, MYSQLI_ASSOC);

// var_dump($odp);


?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <h2 class="text-center display-4">Gestion des ODP</h2>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
              Informations ODP
            </h3>
          </div>
          <div class="card-body">
            <!-- <h4>Left Sided</h4> -->
            <div class="col-5 col-sm-3">
              <!-- <a href="odp.php" class="btn btn-primary btn-block mb-3">Retour</a> -->
              <button id="#" type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#vers-lg">Effectuer un Versement</button>

            </div>

            <div class="row">
              <div class="col-5 col-sm-3">
                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Générale</a>
                  <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Versements</a>
                  <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Commerçant</a>
                  <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Contrôleur</a>
                </div>
              </div>
              <div class="col-7 col-sm-9">
                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                    <form>
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="form-group mb-3">
                            <label>Statut :</label>
                            <input type="text" class="form-control" value="<?= $odp['reg_status'] ?>" name="vers_ref" id="vers_ref" autocomplete="off" disabled>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group mb-3">
                            <label>Nombre de Jour :</label>
                            <input type="text" class="form-control" value="<?= $odp['reg_nbre_jour'] ?>" name="vers_nbre_jour" id="vers_nbre_jour" autocomplete="off" disabled>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group mb-3">
                            <label>Prix :</label>
                            <input type="text" class="form-control" value="<?= $odp['reg_prix'] ?>" name="vers_prix" id="vers_prix" autocomplete="off" disabled>
                          </div>
                        </div>

                        <input type="hidden" name="vers_odp_id" id="vers_odp_id">
                        <input type="hidden" name="vers_commercants_id" id="vers_commercants_id">
                        <input type="hidden" name="vers_agents_id" id="vers_agents_id">
                        <input type="hidden" name="vers_reglements_id" id="vers_reglements_id">

                        <div class="col-sm-3">
                          <div class="form-group mb-3">
                            <label>Reste à payer :</label>
                            <input type="text" class="form-control" value="<?= $odp['reg_reste'] ?>" name="reg_date_fin" id="reg_date_fin" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-3">
                        <div class="col-sm-3">
                          <div class="form-group3">
                            <label>Référence :</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_ref'] ?>" name="view_odp_ref" id="view_odp_ref" disabled>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Longueur (M) :</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_long'] ?>" name="view_odp_long" id="view_odp_long" disabled>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Largeur(M) :</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_larg'] ?>" name="view_odp_larg" id="view_odp_larg" disabled>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Superficie (M²)</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_sup'] ?>" name="view_odp_sup" id="view_odp_sup" disabled>
                          </div>
                        </div>
                      </div>

                      <div class="row mt-3">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Quartier :</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_quartier'] ?>" name="view_odp_quartier" id="view_odp_quartier" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Localisation :</label>
                            <input type="text" class="form-control" value="<?= $odp['odp_localisation'] ?>" name="view_odp_localisation" id="view_odp_localisation" disabled>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Observation :</label>
                            <textarea class="form-control" rows="4" name="view_odp_obs" id="view_odp_obs" disabled><?= $odp['odp_obs'] ?></textarea>
                          </div>
                        </div>
                      </div>
                      <span style="color: #fff;">
                        Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis.
                        Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio.
                      </span>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
                    <form>
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">Versements éffectués</h3>
                            </div>
                            <!-- ./card-header -->
                            <div class="card-body p-0">
                              <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Référence</th>
                                    <th>Date</th>
                                    <th>Montant</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td><?= $odp['reg_ref'] ?></td>
                                    <td><?= $odp['reg_date'] ?></td>
                                    <td><?= $odp['reg_vers'] . ' F CFA' ?></td>
                                  </tr>
                                  <?php
                                  // var_dump($id);
                                  $sql1 = 'SELECT * FROM versements  WHERE reglements_odp_odp_id = " ' . $id . '" ';
                                  $info_vers = mysqli_query($link, $sql1);
                                  foreach ($info_vers as $info_ver) :
                                  ?>
                                    <tr>
                                      <td><?= $info_ver['vers_ref'] ?></td>
                                      <td><?= $info_ver['vers_date'] ?></td>
                                      <td><?= $info_ver['vers_prix'] . ' F CFA' ?></td>
                                    </tr>
                                  <?php
                                  endforeach;
                                  ?>


                                </tbody>
                              </table>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                      </div>
                    </form>
                    <span style="color: #fff;">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis.
                      Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio.
                    </span>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Commerçant :</label>
                            <input type="text" class="form-control" value="<?= $odp['com_nom'] . " " . $odp['com_prenoms']  ?>" name="view_trader_name" id="view_trader_name" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Raison Social : </label>
                            <input type="text" class="form-control" value="<?= $odp['com_ent'] ?>" name="view_trader_company" id="view_trader_company" disabled>
                          </div>
                        </div>

                      </div>
                      <div class="row mt-2">
                        <div class="col-sm-4">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Contact 1: </label>
                            <input type="text" class="form-control" value="<?= $odp['com_cel1'] ?>" value="<?= $odp['odp_obs'] ?>" name="view_trader_phone" id="view_trader_phone" disabled>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Contact 2: </label>
                            <input type="text" class="form-control" value="<?= $odp['com_cel2'] ?>" name="view_trader_phone2" id="view_trader_phone2" disabled>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>E-Mail : </label>
                            <input type="email" class="form-control" value="<?= $odp['com_mail'] ?>" name="view_trader_mail" id="view_trader_mail" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-12 mt-2">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Adresse :</label>
                            <input type="text" class="form-control" value="<?= $odp['com_addr'] ?>" name="view_trader_addr" id="view_trader_addr" disabled>
                          </div>
                        </div>
                      </div>

                    </form>
                    <span style="color: #fff;">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis.
                      Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio.
                    </span>
                  </div>
                  <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
                    <form>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Contrôleur :</label>
                            <input type="text" class="form-control" value="<?= $odp['ag_nom'] . " " . $odp['ag_prenoms'] ?>" name="view_cont_name" id="view_cont_name" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Email : </label>
                            <input type="text" class="form-control" value="<?= $odp['ag_mail'] ?>" name="view_cont_phone" id="view_cont_phone" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Contact 1 :</label>
                            <input type="text" class="form-control" value="<?= $odp['ag_cel1'] ?>" name="view_cont_name" id="view_cont_name" disabled>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <!-- textarea -->
                          <div class="form-group">
                            <label>Contact 2: </label>
                            <input type="text" class="form-control" value="<?= $odp['ag_cel2'] ?>" name="view_cont_phone" id="view_cont_phone" disabled>
                          </div>
                        </div>
                      </div>
                    </form>
                    <span style="color: #fff;">
                      Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis.
                      Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio.
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- versement modal -->
    <div class="modal fade" id="vers-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Proceder à un versement</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="odpversform1" method="post">
            <div class="modal-body">

              <div id="errorupmessage"></div>
              <input type="hidden" name="vers_err_id" id="vers_err_id">

              <div class="row mt-3">
                <div class="col-sm-3">
                  <div class="form-group mb-3">
                    <label>Date :</label>
                    <input type="text" class="form-control" value="<?= date("d/m/Y") ?>" name="#" id="#" disabled>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group mb-3">
                    <label>Référence :</label>
                    <input type="text" class="form-control" name="vers_ref" id="vers_ref" autocomplete="off" required>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group mb-3">
                    <label>Montant:</label>
                    <input type="text" class="form-control" name="vers_prix" id="vers_prix" autocomplete="off" required>
                  </div>
                </div>


                <input type="hidden" value="<?= date("d/m/Y") ?>" name="vers_date" id="vers_date">
                <input type="hidden" value="<?= $odp['odp_id'] ?>" name="vers_odp_id" id="vers_odp_id">
                <input type="hidden" value="<?= $odp['com_id'] ?>" name="vers_commercants_id" id="vers_commercants_id">
                <input type="hidden" value="<?= $odp['ag_id'] ?>" name="vers_agents_id" id="vers_agents_id">
                <input type="hidden" value="<?= $odp['reg_id'] ?>" name="vers_reglements_id" id="vers_reglements_id">
                <input type="hidden" value="<?= $odp['reg_avance'] ?>" name="reg_avance" id="reg_avance">
                <input type="hidden" value="<?= $odp['reg_prix'] ?>" name="reg_prix" id="reg_prix">
                <input type="hidden" value="<?= $odp['reg_reste'] ?>" name="reg_reste" id="reg_reste">

                <div class="col-sm-3">
                  <div class="form-group mb-3">
                    <label>Reste à payer:</label>
                    <input type="text" class="form-control" value="<?= $odp['reg_reste'] ?>" name="reg_reste" id="reg_reste" disabled>
                  </div>
                </div>
              </div>

              <!-- <hr>
              <h4 class="modal-title">Information de l'ODP</h4>
              <div class="row mt-3">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Référence :</label>
                    <input type="text" class="form-control" name="reg_odp_ref" id="reg_odp_ref" disabled>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Quartier :</label>
                    <input type="text" class="form-control" name="reg_odp_quartier" id="reg_odp_quartier" disabled>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Superficie (M²)</label>
                    <input type="text" class="form-control" name="reg_odp_sup" id="reg_odp_sup" disabled>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group mb-3">
                    <label>Prix :</label>
                    <input type="text" class="form-control" name="vers_nbre_jour" id="vers_nbre_jour" disabled>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Commerçant :</label>
                    <input type="text" class="form-control" name="reg_trader_name" id="reg_trader_name" disabled>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Contact : </label>
                    <input type="text" class="form-control" name="reg_trader_phone" id="reg_trader_phone" disabled>
                  </div>
                </div>
              </div> -->

            </div>

            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <input type="hidden" name="employee_id" id="employee_id">
              <button type="submit" class="btn btn-primary" name="edit_odp" id="edit_odp">Enregistrer</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- add modal -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Détails de la plainte </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="readform" method="post">
            <div class="modal-body">

              <div id="errorreadmessage"></div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Commerçant :</label>
                    <input type="text" class="form-control" name="view_user" id="view_user" disabled>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Statut :</label>
                    <input type="text" class="form-control" name="view_status" id="view_status" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Motif :</label>
                    <input type="text" class="form-control" name="view_motif" id="view_motif" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Description :</label>
                    <textarea class="form-control" rows="4" name="view_desc" id="view_desc" disabled></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Agent Traitant :</label>
                    <input type="hidden" class="form-control" name="ag_id" id="ag_id">

                    <input type="text" class="form-control" name="ag_nom" id="ag_nom" disabled>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Contact :</label>
                    <input type="text" class="form-control" name="view_contact" id="view_contact" disabled>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <label>Rapport :</label>
                  <textarea class="form-control" rows="4" name="view_rapport" id="view_rapport" placeholder="" disabled></textarea>
                </div>
              </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <input type="hidden" name="employee_id" id="employee_id"> -->
              <!-- <button type="submit" class="btn btn-primary" name="add_odp" id="add_odp">Save changes</button> -->
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </section>
  <!-- /.content -->
</div>
<?php
include("../layout/main-footer.php");
?>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->
<script src="../dist/js/inter.js"></script>


<script>
  $(function() {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function() {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function(e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })


  });


  $(document).ready(function() {

    $("#odpversform1").submit(function(event) {
      // prevent default php procesing
      event.preventDefault();
      // collect user inputs  
      var datatopost = $(this).serializeArray();
      console.log(datatopost);
      // send them to signup.php using AJAX
      $.ajax({
        url: "./../page/vers-odp1.php",
        type: "POST",
        data: datatopost,
        success: function(data) {
          if (data == "success") {
            // $("#errormessage").html("<div class='alert alert-success'>Added.</div>");
            window.location = "./../page/odp.php";
            // console.log("data");
          } else {
            $("#errormessage").html(data);
            console.log(data);

          }
        },
        error: function() {
          $("#errormessage").html("<div class='alert alert-danger'>Error with Ajax Call. Please try again later.</div>");
        }

      });

    });

  });
</script>

</body>

</html>