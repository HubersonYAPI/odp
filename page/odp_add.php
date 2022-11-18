<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$ag_id = $_SESSION["ag_id"];

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
        <form id="odpform" method="post">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Informations Générales</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
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

                                <div class="row mt-3">
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
                            <!-- /.card-body -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-md-6">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Reglement</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row mt-3">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Référence :</label>
                                            <input type="text" class="form-control" name="reg_ref" id="reg_ref" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Nombre de Jour :</label>
                                            <input type="text" class="form-control" name="reg_nbre_jour" id="reg_nbre_jour" autocomplete="off" required>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row mt-3">                                    
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Versement :</label>
                                            <input type="text" class="form-control" name="reg_vers" id="reg_vers" autocomplete="off" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Prix Total:</label>
                                            <input type="text" class="form-control" name="reg_prix" id="reg_prix" autocomplete="off" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row mt-3">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label>Statut:</label>
                                            <select class="form-control" name="reg_status" id="reg_status">
                                                <option value="non-solde">Non Soldé</option>
                                                <option value="solde">Soldé</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <!-- <input type="submit" value="Create new Project" class="btn btn-success float-right"> -->
                        <button type="submit" class="btn btn-primary float-right" name="add_odp" id="add_odp">Enregistrer</button>
                    </div>
                </div>
            </div>
        </form>
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