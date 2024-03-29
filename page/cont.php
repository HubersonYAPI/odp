<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$ag_id = $_SESSION["user_id"];

$sql = 'SELECT * FROM agents';
$conts = mysqli_query($link, $sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center display-4">Gestion des Agents</h2>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="buttons mb-2">
                        <button id="addNote" type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-lg">Ajouter Agent</button>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Agents de la Mairie</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive pad">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom & Prénoms</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Poste</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    <tr style="display:none;">
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 4.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td> 4</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default">
                                                    <i class="fas fa-eye fa-align-left" data-target="#info-xl" data-toggle="modal"></i>
                                                </button>
                                                <button type="button" class="btn btn-default">
                                                    <i class="fas fa-edit fa-align-left" data-target="#update-lg" data-toggle="modal"></i>
                                                </button>
                                                <button type="button" class="btn btn-default">
                                                    <i class="fas fa-trash fa-align-center"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    foreach ($conts as $cont) :
                                    ?>

                                        <tr>
                                            <td><?= $cont['ag_nom']." ".$cont['ag_prenoms'] ?></td>
                                            <td><?= $cont['ag_cel1'] ?></td>
                                            <td><?= $cont['ag_mail'] ?></td>
                                            <td><?= $cont['ag_service'] ?></td>
                                            <td><?= $cont['ag_poste'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default view_cont" name="view_cont" id="<?= $cont["ag_id"]; ?>">
                                                        <i class="fas fa-eye fa-align-left" data-target="#info-xl" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default edit_cont" name="edit_cont" id="<?= $cont["ag_id"]; ?>">
                                                        <i class="fas fa-edit fa-align-left" data-target="#update-lg" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default del_cont" name="del_cont" id="<?= $cont["ag_id"]; ?>">
                                                        <i class="fas fa-trash fa-align-center"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>



                                <tfoot>
                                    <tr>
                                        <th>Nom & Prénoms</th>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Service</th>
                                        <th>Poste</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <!-- add modal -->
        <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Informations Générales de l'Agent</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="contform" method="post">
                        <div class="modal-body">

                            <div id="errormessage"></div>

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_nom" id="ag_nom" placeholder="Nom" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_prenoms" id="ag_prenoms" placeholder="Prénoms" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_cel1" id="ag_cel1" placeholder="Contact 1" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_cel2" id="ag_cel2" placeholder="Contact 2" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="ag_mail" id="ag_mail" placeholder="Email" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_addr" id="ag_addr" placeholder="Adresse" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_service" id="ag_service" placeholder="Service" autocomplete="off" required>
                                        <!-- <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_poste" id="ag_poste" placeholder="Poste" autocomplete="off" required>
                                        <!-- <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div> -->
                                    </div>                                
                                </div>
                            </div>
                            <hr>
                            <h4 class="modal-title">Informations de Connexion</h4>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="ag_login" id="ag_login" placeholder="Login" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="ag_mdp" id="ag_mdp" placeholder="Mot de passe" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="add_cont" id="add_cont">Enregistrer</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- info modal -->
        <div class="modal fade" id="info-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Information de l'Agent</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Agents : </label>
                                        <input type="text" class="form-control" name="view_ag_nom" id="view_ag_nom" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Service: </label>
                                        <input type="text" class="form-control" name="view_ag_service" id="view_ag_service" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Fonction : </label>
                                        <input type="text" class="form-control" name="view_ag_poste" id="view_ag_poste" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 1: </label>
                                        <input type="text" class="form-control" name="view_ag_cel1" id="view_ag_cel1" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 2: </label>
                                        <input type="text" class="form-control" name="view_ag_cel2" id="view_ag_cel2" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>E-Mail : </label>
                                        <input type="email" class="form-control" name="view_ag_mail" id="view_ag_mail" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Adresse :</label>
                                    <input type="text" class="form-control" name="view_ag_addr" id="view_ag_addr" disabled>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Liste des ODP</h3>
                                        </div>
                                        <!-- ./card-header -->
                                        <div class="card-body p-0">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Numéro</th>
                                                        <th>Coût Total</th>
                                                        <th>Localisation</th>
                                                        <th>Superficie</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql1 = 'SELECT * FROM odp, controller WHERE odp.cont_id = controller.cont_id ORDER BY reference DESC';
                                                    $info_conts = mysqli_query($link, $sql1);
                                                    foreach ($info_conts as $info_cont) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $info_cont['reference'] ?></td>
                                                            <td><?= $info_cont['total'] . ' CFA' ?></td>
                                                            <td><?= $info_cont['localisation'] ?></td>
                                                            <td><?= $info_cont['sup'] ?></td>
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
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /. update modal -->
        <!-- update modal -->
        <div class="modal fade" id="update-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Mettre à jour les informations</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="contupdateform" method="post">
                        <div class="modal-body">

                            <div id="errorupmessage"></div>
                            <input type="hidden" name="update_id" id="update_id">

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_nom" id="edit_ag_nom" placeholder="Nom" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_prenoms" id="edit_ag_prenoms" placeholder="Prénoms" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>                                 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_cel1" id="edit_ag_cel1" placeholder="Contact 1" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_cel2" id="edit_ag_cel2" placeholder="Contact 2" autocomplete="off">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>                            
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="edit_ag_mail" id="edit_ag_mail" placeholder="Email" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_addr" id="edit_ag_addr" placeholder="Adresse" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_service" id="edit_ag_service" placeholder="Service" autocomplete="off" required>
                                        <!-- <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_ag_poste" id="edit_ag_poste" placeholder="Poste" autocomplete="off" required>
                                        <!-- <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div> -->
                                    </div>                                
                                </div>
                            </div>                            
                           
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <input type="hidden" name="employee_id" id="employee_id">
                            <button type="submit" class="btn btn-primary" name="update_cont" id="update_cont">Modifier</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /. update modal -->
    </section>
</div>

<!-- /.control-sidebar -->

<?php
include("../layout/main-footer.php");
?>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../dist/js/cont.js"></script>

<!-- Page specific script -->
<script>

</script>
</body>

</html>