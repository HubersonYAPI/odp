<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$ag_id = $_SESSION["ag_id"];
// run a query to delete empty trader
$sql = 'SELECT * FROM commercants ORDER BY com_id DESC';
$traders = mysqli_query($link, $sql);
// $traders = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center display-4">Gestion des Commerçants</h2>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="buttons mb-2">
                        <button id="addNote" type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-lg">Ajouter Commerçant</button>
                        <!-- <button id="edit" type="button" class="btn btn-outline-primary btn-lg float-right">Edit</button>
                                <button id="done" type="button" class="btn btn-outline-success btn-lg float-right mr-1">Done</button>
                                <button id="allNotes" type="button" class="btn btn-outline-primary btn-lg">All Note</button> -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des commerçants occupant un ODP</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive pad">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom & Prénoms</th>
                                        <th>Compagnie</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
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
                                    foreach ($traders as $trader) :
                                    ?>

                                        <tr>
                                            <td><?= $trader['com_nom']." ".$trader['com_prenoms'] ?></td>
                                            <td><?= $trader['com_ent'] ?></td>
                                            <td><?= $trader['com_cel1'] ?></td>
                                            <td><?= $trader['com_mail'] ?></td>
                                            <td><?= $trader['com_addr'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default view_trader" name="view_trader" id="<?= $trader["com_id"]; ?>">
                                                        <i class="fas fa-eye fa-align-left" data-target="#info-xl" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default edit_trader" name="edit_trader" id="<?= $trader["com_id"]; ?>">
                                                        <i class="fas fa-edit fa-align-left" data-target="#update-lg" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default del_trader" name="del_trader" id="<?= $trader["com_id"]; ?>">
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
                                        <th>Compagnie</th>
                                        <th>Telephone</th>
                                        <th>Email</th>
                                        <th>Adresse</th>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Informations Générales du Commerçant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="traderform" method="post">
                        <div class="modal-body">

                            <div id="errormessage"></div>

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_nom" id="com_nom" placeholder="Nom" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_prenoms" id="com_prenoms" placeholder="Prénoms" autocomplete="off" required>
                                    </div>                                 
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_ent" id="com_ent" placeholder="Compagnie" autocomplete="off">
                                    </div>                                 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_cel1" id="com_cel1" placeholder="Contact 1" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_cel2" id="com_cel2" placeholder="Contact 2" autocomplete="off">
                                    </div>                            
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="com_mail" id="com_mail" placeholder="Email" autocomplete="off">
                                    </div>                            
                                </div>
                            </div>

                            <div class="row mt-3">                                
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_addr" id="com_addr" placeholder="Quartier" autocomplete="off" required>
                                    </div>                                
                                </div>
                            </div>

                            <hr>
                            <h4 class="modal-title">Informations de Connexion</h4>
                            
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="com_login" id="com_login" placeholder="Login" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="com_mdp" id="com_mdp" placeholder="Mot de passe" autocomplete="off" required>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>                                
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" name="com_mdp1" id="com_mdp1" placeholder="Confirmer Mot de passe" autocomplete="off" required>
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
                            <button type="submit" class="btn btn-primary" name="add_trader" id="add_trader">Enregistrer</button>
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
                        <h4 class="modal-title">Information du Commerçant</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant :</label>
                                        <input type="text" class="form-control" name="view_trader_name" id="view_trader_name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Raison Social : </label>
                                        <input type="text" class="form-control" name="view_trader_company" id="view_trader_company" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 1: </label>
                                        <input type="text" class="form-control" name="view_trader_phone" id="view_trader_phone" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 2: </label>
                                        <input type="text" class="form-control" name="view_trader_phone2" id="view_trader_phone2" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>E-Mail : </label>
                                        <input type="email" class="form-control" name="view_trader_mail" id="view_trader_mail" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Adresse :</label>
                                    <input type="text" class="form-control" name="view_trader_addr" id="view_trader_addr" disabled>
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
                                                    $sql1 = 'SELECT * FROM odp, trader WHERE odp.trader_id = trader.trader_id ORDER BY reference DESC';
                                                    $info_traders = mysqli_query($link, $sql1);
                                                    foreach ($info_traders as $info_trader) :
                                                    ?>
                                                        <tr>
                                                            <td><?= $info_trader['reference'] ?></td>
                                                            <td><?= $info_trader['total'].' CFA' ?></td>
                                                            <td><?= $info_trader['localisation'] ?></td>
                                                            <td><?= $info_trader['sup'] ?></td>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Mettre à jour les informations</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="traderupdateform" method="post">
                        <div class="modal-body">

                            <div id="errorupmessage"></div>
                            <input type="hidden" name="update_id" id="update_id">

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_name" id="edit_trader_name" placeholder="Nom" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_fname" id="edit_trader_fname" placeholder="Prénoms" autocomplete="off" required>
                                    </div>                                 
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_company" id="edit_trader_company" placeholder="Compagnie" autocomplete="off">
                                    </div>                                 
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_phone" id="edit_trader_phone" placeholder="Contact 1" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_phone2" id="edit_trader_phone2" placeholder="Contact 2" autocomplete="off">
                                    </div>                            
                                </div>
                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="edit_trader_mail" id="edit_trader_mail" placeholder="Email" autocomplete="off">
                                    </div>                            
                                </div>
                            </div>

                            <div class="row mt-3">                                
                                <div class="col-sm-12">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_trader_addr" id="edit_trader_addr" placeholder="Quartier" autocomplete="off" required>
                                    </div>                                
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <input type="hidden" name="employee_id" id="employee_id">
                            <button type="submit" class="btn btn-primary" name="update_trader" id="update_trader">Modifier</button>
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
<script src="../dist/js/trader.js"></script>

<!-- Page specific script -->
<script>

</script>
</body>

</html>