<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$ag_id = $_SESSION["ag_id"];
// run a query to delete empty trader
$sql = 'SELECT * FROM odp';
$odps = mysqli_query($link, $sql);
// $traders = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="buttons mb-2">
                        <button id="addNote" type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-lg">Ajouter ODP</button>
                        <!-- <button id="edit" type="button" class="btn btn-outline-primary btn-lg float-right">Edit</button>
                                <button id="done" type="button" class="btn btn-outline-success btn-lg float-right mr-1">Done</button>
                                <button id="allNotes" type="button" class="btn btn-outline-primary btn-lg">All Note</button> -->
                        <!-- <a name="odp_add" id="odp_add" class="btn btn-outline-primary btn-lg" href="odp_add.php" role="button">Ajouter ODP</a> -->
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des Occupations du Domaine Publique (ODP)</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive pad">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Référence</th>
                                        <th>Commerçant</th>
                                        <th>Quartier</th>
                                        <th>Localisation</th>
                                        <th>statut</th>
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
                                    foreach ($odps as $odp) :
                                    ?>

                                        <tr>
                                            <td><?= $odp['odp_ref'] ?></td>
                                            <td><?= $odp['commercants_com_id'] ?></td>
                                            <td><?= $odp['odp_quartier'] ?></td>
                                            <td><?= $odp['odp_localisation'] ?></td>
                                            <td><?= $odp['odp_obs'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default view_odp" name="view_odp" id="<?= $odp["odp_id"]; ?>">
                                                        <i class="fas fa-eye fa-align-left" data-target="#info-xl" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default edit_odp" name="edit_odp" id="<?= $odp["odp_id"]; ?>">
                                                        <i class="fas fa-edit fa-align-left" data-target="#update-lg" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default del_odp" name="del_odp" id="<?= $odp["odp_id"]; ?>">
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
                                        <th>Numéro</th>
                                        <th>Commerçant</th>
                                        <th>Quartier</th>
                                        <th>Localisation</th>
                                        <th>statut</th>
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
                        <h4 class="modal-title">Informations Générales de l'ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="odpform" method="post">
                        <div class="modal-body">

                            <div id="errormessage"></div>

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_ref" id="odp_ref" placeholder="Référence" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_long" id="odp_long" placeholder="Longueur (M)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_larg" id="odp_larg" placeholder="Largeur(M)" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_sup" id="odp_sup" placeholder="Superficie (M²)" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_quartier" id="odp_quartier" placeholder="Quartier" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="odp_localisation" id="odp_localisation" placeholder="localisation" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="odp_obs" id="odp_obs" placeholder="Observation" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant :</label>
                                        <select class="form-control" name="com_id" id="com_id">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM commercants ORDER BY com_id DESC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <select class="form-control" name="ag_id" id="ag_id">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM agents ORDER BY ag_nom ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary" name="add_odp" id="add_odp">Enregistrer</button>
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
                        <h4 class="modal-title">Information sur ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="form-group3">
                                        <label>Référence :</label>
                                        <input type="text" class="form-control" name="view_odp_ref" id="view_odp_ref" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Longueur (M) :</label>
                                        <input type="text" class="form-control" name="view_odp_long" id="view_odp_long" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Largeur(M) :</label>
                                        <input type="text" class="form-control" name="view_odp_larg" id="view_odp_larg" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Superficie (M²)</label>
                                        <input type="text" class="form-control" name="view_odp_sup" id="view_odp_sup" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Quartier :</label>
                                        <input type="text" class="form-control" name="view_odp_quartier" id="view_odp_quartier" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Localisation :</label>
                                        <input type="text" class="form-control" name="view_odp_localisation" id="view_odp_localisation" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" name="view_odp_obs" id="view_odp_obs" disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
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
                            <div class="row mt-2">
                                <div class="col-12 mt-2">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Adresse :</label>
                                        <input type="text" class="form-control" name="view_trader_addr" id="view_trader_addr" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <input type="text" class="form-control" name="view_cont_name" id="view_cont_name" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact : </label>
                                        <input type="text" class="form-control" name="view_cont_phone" id="view_cont_phone" disabled>
                                    </div>
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
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Mettre à jour les informations</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="odpupdateform" method="post">
                        <div class="modal-body">

                            <div id="errorupmessage"></div>
                            <input type="hidden" name="update_id" id="update_id">

                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_ref" id="edit_odp_ref" placeholder="Référence" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_long" id="edit_odp_long" placeholder="Longueur (M)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_larg" id="edit_odp_larg" placeholder="Largeur(M)" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_sup" id="edit_odp_sup" placeholder="Superficie (M²)" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_quartier" id="edit_odp_quartier" placeholder="Quartier" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="edit_odp_localisation" id="edit_odp_localisation" placeholder="localisation" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" name="edit_odp_obs" id="edit_odp_obs" placeholder="Observation" autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant : </label>
                                        <select class="form-control" name="edit_com_id" id="edit_com_id">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM commercants ORDER BY com_id DESC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <select class="form-control" name="edit_ag_id" id="edit_ag_id">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM agents ORDER BY ag_nom ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1] . " " . $row[2]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                            <input type="hidden" name="employee_id" id="employee_id">
                            <button type="submit" class="btn btn-primary" name="edit_odp" id="edit_odp">Modifier</button>
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
<script src="../dist/js/odp.js"></script>

<!-- Page specific script -->
<script>

</script>
</body>

</html>