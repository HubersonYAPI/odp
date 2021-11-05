<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$user_id = $_SESSION["user_id"];

$sql = 'SELECT * FROM odp';
$odps = mysqli_query($link, $sql);
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
                                        <th>Numéro</th>
                                        <th>Commerçant</th>
                                        <th>Secteur</th>
                                        <th>Localisation</th>
                                        <th>Superficie</th>
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
                                            <td><?= $odp['reference'] ?></td>
                                            <td><?= $odp['trader_name'] ?></td>
                                            <td><?= $odp['secteur'] ?></td>
                                            <td><?= $odp['localisation'] ?></td>
                                            <td><?= $odp['sup'] . " m²" ?></td>
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
                                        <th>Secteur</th>
                                        <th>Localisation</th>
                                        <th>Superficie</th>
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
                        <h4 class="modal-title">Ajouter ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="odpform" method="post">
                        <div class="modal-body">

                            <div id="errormessage"></div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Année :</label>
                                        <input type="text" class="form-control" name="annee" id="annee" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro :</label>
                                        <input type="text" class="form-control" name="reference" id="reference" value="Ref" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre de Jour :</label>
                                        <input type="text" class="form-control" name="jour" id="jour" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" name="longu" id="longu" placeholder="M" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" name="larg" id="larg" placeholder="M" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" name="sup" id="sup" placeholder="M²" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) : </label>
                                        <input type="text" class="form-control" name="indic" id="indic" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" name="reste" id="reste" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" name="total" id="total" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Secteur : </label>
                                        <input type="text" class="form-control" name="secteur" id="secteur" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Localisation : </label>
                                        <input type="text" class="form-control" name="localisation" id="localisation" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" name="obs" id="obs" placeholder="Enter ..." autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <select class="form-control" name="cont_name" id="cont_name">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM controller ORDER BY cont_name ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
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
                                        <label>Commerçant :</label>
                                        <select class="form-control" name="trader_id" id="trader_id">
                                            <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM trader ORDER BY trader_name ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add_odp" id="add_odp">Save changes</button>
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
                        <h4 class="modal-title">Informations sur ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Année :</label>
                                        <input type="text" class="form-control" name="view_annee" id="view_annee" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Numéro :</label>
                                        <input type="text" class="form-control" name="view_reference" id="view_reference" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" name="view_total" id="view_total" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) :</label>
                                        <input type="text" class="form-control" name="view_indic" id="view_indic" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" name="view_reste" id="view_reste" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label>Nombre de Jour :</label>
                                    <input type="text" class="form-control" name="view_jour" id="view_jour" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" name="view_longu" id="view_longu" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">

                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" name="view_larg" id="view_larg" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">

                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" name="view_sup" id="view_sup" placeholder="M²" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Secteur : </label>
                                        <input type="text" class="form-control" name="view_secteur" id="view_secteur" placeholder="" disabled>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Situation : </label>
                                        <input type="text" class="form-control" name="view_localisation" id="view_localisation" placeholder="" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" name="view_obs" id="view_obs" placeholder="Enter ..." disabled></textarea>
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
                            <div class="col-12 mt-2">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Adresse :</label>
                                    <input type="text" class="form-control" name="view_trader_addr" id="view_trader_addr" disabled>
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
        <!-- /. info modal -->

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

                    <!-- <form id="odpform" method="post"> -->
                    <form id="odpupdateform" method="post">
                        <div class="modal-body">

                            <div id="errorupmessage"></div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Année :</label>
                                        <input type="text" class="form-control" name="edit_annee" id="edit_annee" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro :</label>
                                        <input type="text" class="form-control" name="edit_reference" id="edit_reference" value="Ref" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre de Jour :</label>
                                        <input type="text" class="form-control" name="edit_jour" id="edit_jour" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" name="edit_longu" id="edit_longu" placeholder="M" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" name="edit_larg" id="edit_larg" placeholder="M" autocomplete="off">
                                </div>
                                <div class="col-sm-4">
                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" name="edit_sup" id="edit_sup" placeholder="M²" autocomplete="off">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) : </label>
                                        <input type="text" class="form-control" name="edit_indic" id="edit_indic" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" name="edit_reste" id="edit_reste" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" name="edit_total" id="edit_total" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Secteur : </label>
                                        <input type="text" class="form-control" name="edit_secteur" id="edit_secteur" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Localisation : </label>
                                        <input type="text" class="form-control" name="edit_localisation" id="edit_localisation" placeholder="Enter ..." autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" name="edit_obs" id="edit_obs" placeholder="Enter ..." autocomplete="off"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <select class="form-control" name="edit_cont_name" id="edit_cont_name">
                                           
                                        <option value="#"></option>

                                            <?php
                                            $sql = "SELECT * FROM controller ORDER BY cont_name ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
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
                                        <label>Commerçant :</label>
                                        <select class="form-control" name="edit_trader_id" id="edit_trader_id">
                                        <option disabled> </option>
                                            <?php
                                            $sql = "SELECT * FROM trader ORDER BY trader_name ASC";
                                            $result = mysqli_query($link, $sql);
                                            ?>
                                            <?php while ($row = mysqli_fetch_array($result)) :; ?>


                                                <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                            <?php endwhile; ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="hidden" name="employee_id" id="employee_id">
                            <button type="submit" class="btn btn-primary" name="edit_odp" id="edit_odp">Save changes</button>
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