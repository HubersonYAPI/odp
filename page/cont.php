<?php include("../layout/top-nav.php"); ?>

<?php
// Get the user_id
$user_id = $_SESSION["user_id"];

$sql = 'SELECT * FROM controller';
$conts = mysqli_query($link, $sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <h2 class="text-center display-4">Gestion des Controlleurs</h2>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="buttons mb-2">
                        <button id="addNote" type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-lg">Ajouter Controlleur</button>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Liste des controlleurs des ODP</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive pad">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom & Prénoms</th>
                                        <th>Contact 1</th>
                                        <th>Contact 2</th>
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
                                    foreach ($conts as $cont) :
                                    ?>

                                        <tr>
                                            <td><?= $cont['cont_name'] ?></td>
                                            <td><?= $cont['cont_phone'] ?></td>
                                            <td><?= $cont['cont_phone2'] ?></td>
                                            <td><?= $cont['cont_mail'] ?></td>
                                            <td><?= $cont['cont_addr'] ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-default view_cont" name="view_cont" id="<?= $cont["cont_id"]; ?>">
                                                        <i class="fas fa-eye fa-align-left" data-target="#info-xl" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default edit_cont" name="edit_cont" id="<?= $cont["cont_id"]; ?>">
                                                        <i class="fas fa-edit fa-align-left" data-target="#update-lg" data-toggle="modal"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-default del_cont" name="del_cont" id="<?= $cont["cont_id"]; ?>">
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
                                        <th>Contact 1</th>
                                        <th>Contact 2</th>
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
            <div class="modal-dialog modal-default">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ajouter Controlleur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="contform" method="post">
                        <div class="modal-body">

                            <div id="errormessage"></div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cont_name" id="cont_name" placeholder="Nom & Prénoms" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cont_phone" id="cont_phone" placeholder="Contact 1"" autocomplete=" off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cont_phone2" id="cont_phone2" placeholder="Contact 2" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="cont_mail" id="cont_mail" placeholder="Email" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="cont_addr" id="cont_addr" placeholder="Adresse" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker-alt"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="hidden" class="form-control" name="cont_img" id="cont_img" placeholder="images" autocomplete="off" value="no-image">

                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add_cont" id="add_cont">Save changes</button>
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
                        <h4 class="modal-title">Information du Controlleur</h4>
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
                                        <label>Controlleur :</label>
                                        <input type="text" class="form-control" name="view_cont_name" id="view_cont_name" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 1: </label>
                                        <input type="text" class="form-control" name="view_cont_phone" id="view_cont_phone" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact 2: </label>
                                        <input type="text" class="form-control" name="view_cont_phone2" id="view_cont_phone2" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>E-Mail : </label>
                                        <input type="email" class="form-control" name="view_cont_mail" id="view_cont_mail" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <!-- textarea -->
                                <div class="form-group">
                                    <label>Adresse :</label>
                                    <input type="text" class="form-control" name="view_cont_addr" id="view_cont_addr" disabled>
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
            <div class="modal-dialog modal-default">
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

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="edit_cont_name" id="edit_cont_name" placeholder="Nom & Prénoms" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="edit_cont_phone" id="edit_cont_phone" placeholder="Contact 1" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="edit_cont_phone2" id="edit_cont_phone2" placeholder="Contact 2" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" name="edit_cont_mail" id="edit_cont_mail" placeholder="Email" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="edit_cont_addr" id="edit_cont_addr" placeholder="Adresse" autocomplete="off" required>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marker-alt"></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="hidden" name="employee_id" id="employee_id">
                            <button type="submit" class="btn btn-primary" name="update_cont" id="update_cont">Save changes</button>
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