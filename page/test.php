<?php
include("../layout/top-nav.php");

?>
<hr>
                <div class="row">
                  <div class="col-sm-6">
                    <label>Diagnostic :</label>
                    <textarea class="form-control" rows="4" placeholder=""></textarea>
                  </div>
                  <div class="col-sm-6">
                    <label>Solutions :</label>
                    <textarea class="form-control" rows="4" placeholder=""></textarea>
                  </div>
                </div>
                
<input type="hidden" name="info_id" id="info_id">
                    <?php
                    // Get the user_id
                    $info_id = $_POST["info_id"];
                    var_dump($info_id);
                    $info_sql = "SELECT username FROM users WHERE user_id = '$info_id'";
                    $info_result = mysqli_query($link, $info_sql);
                    $info_name = mysqli_fetch_array($info_result, MYSQLI_ASSOC);
                    ?>
                    <!-- value="<?php echo $info_id; ?>" id="view_info"  -->
                    <input type="text" class="form-control" name="view_info" value="<?php if ($info_name = null) { echo "";} else {echo $info_name ;} ?>" id="view_info" disabled>
                  

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
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="odp.php">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-10 offset-md-1">
                    <div class="buttons mb-2">
                        <button id="addNote" type="button" class="btn btn-outline-primary btn-lg" data-toggle="modal" data-target="#modal-lg">Add ODP</button>
                        <!-- <button id="edit" type="button" class="btn btn-outline-primary btn-lg float-right">Edit</button>
                                <button id="done" type="button" class="btn btn-outline-success btn-lg float-right mr-1">Done</button>
                                <button id="allNotes" type="button" class="btn btn-outline-primary btn-lg">All Note</button> -->
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
                                        <th>Situation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.0
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5</td>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 5.5
                                        </td>
                                        <td>Win 95+</td>
                                        <td>5.5</td>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet
                                            Explorer 6
                                        </td>
                                        <td>Win 98+</td>
                                        <td>6</td>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td>7</td>
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
                                    <tr>
                                        <td>Trident</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td>6</td>
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
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td>1.9</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Camino 1.5</td>
                                        <td>OSX.3+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Netscape 7.2</td>
                                        <td>Win 95+ / Mac OS 8.6-9.2</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Netscape Browser 8</td>
                                        <td>Win 98SE+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Netscape Navigator 9</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.1</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.1</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.2</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.2</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.3</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.3</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.4</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.4</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.5</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.5</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.6</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>1.6</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.7</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td>1.7</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Mozilla 1.8</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Seamonkey 1.1</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Gecko</td>
                                        <td>Epiphany 2.20</td>
                                        <td>Gnome</td>
                                        <td>1.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>Safari 1.2</td>
                                        <td>OSX.3</td>
                                        <td>125.5</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>Safari 1.3</td>
                                        <td>OSX.3</td>
                                        <td>312.8</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>Safari 2.0</td>
                                        <td>OSX.4+</td>
                                        <td>419.3</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>Safari 3.0</td>
                                        <td>OSX.4+</td>
                                        <td>522.1</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>OmniWeb 5.5</td>
                                        <td>OSX.4+</td>
                                        <td>420</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>iPod Touch / iPhone</td>
                                        <td>iPod</td>
                                        <td>420.1</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Webkit</td>
                                        <td>S60</td>
                                        <td>S60</td>
                                        <td>413</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 7.0</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 7.5</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 8.0</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 8.5</td>
                                        <td>Win 95+ / OSX.2+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 9.0</td>
                                        <td>Win 95+ / OSX.3+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 9.2</td>
                                        <td>Win 88+ / OSX.3+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera 9.5</td>
                                        <td>Win 88+ / OSX.3+</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Opera for Wii</td>
                                        <td>Wii</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Nokia N800</td>
                                        <td>N800</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Presto</td>
                                        <td>Nintendo DS browser</td>
                                        <td>Nintendo DS</td>
                                        <td>8.5</td>
                                        <td>C/A<sup>1</sup></td>
                                    </tr>
                                    <tr>
                                        <td>KHTML</td>
                                        <td>Konqureror 3.1</td>
                                        <td>KDE 3.1</td>
                                        <td>3.1</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>KHTML</td>
                                        <td>Konqureror 3.3</td>
                                        <td>KDE 3.3</td>
                                        <td>3.3</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>KHTML</td>
                                        <td>Konqureror 3.5</td>
                                        <td>KDE 3.5</td>
                                        <td>3.5</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 4.5</td>
                                        <td>Mac OS 8-9</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.1</td>
                                        <td>Mac OS 7.6-9</td>
                                        <td>1</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Tasman</td>
                                        <td>Internet Explorer 5.2</td>
                                        <td>Mac OS 8-X</td>
                                        <td>1</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>NetFront 3.1</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>NetFront 3.4</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>A</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Dillo 0.8</td>
                                        <td>Embedded devices</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Links</td>
                                        <td>Text only</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>Lynx</td>
                                        <td>Text only</td>
                                        <td>-</td>
                                        <td>X</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>IE Mobile</td>
                                        <td>Windows Mobile 6</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Misc</td>
                                        <td>PSP browser</td>
                                        <td>PSP</td>
                                        <td>-</td>
                                        <td>C</td>
                                    </tr>
                                    <tr>
                                        <td>Other browsers</td>
                                        <td>All others</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>U</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Numéro</th>
                                        <th>Commerçant</th>
                                        <th>Secteur</th>
                                        <th>Situation</th>
                                        <th>Action</th>
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
                        <h4 class="modal-title">Add ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Année :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nombre de Jour :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" placeholder="M">
                                </div>
                                <div class="col-sm-4">
                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" placeholder="M">
                                </div>
                                <div class="col-sm-4">
                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" placeholder="M²">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) : </label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant :</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
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
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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
                        <h4 class="modal-title">Info ODP</h4>
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
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Numéro :</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) :</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <label>Nombre de Jour :</label>
                                    <input type="text" class="form-control" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">

                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" placeholder="M" disabled>
                                </div>
                                <div class="col-sm-3">

                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" placeholder="M²" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" placeholder="Enter ..." disabled></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant :</label>
                                        <input type="text" class="form-control" placeholder="John Doe" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact : </label>
                                        <input type="text" class="form-control" placeholder="00-00-00-00-00" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Raison Social : </label>
                                        <input type="text" class="form-control" placeholder="" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Secteur : </label>
                                        <input type="text" class="form-control" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Situation : </label>
                                        <input type="text" class="form-control" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contrôleur :</label>
                                        <input type="text" class="form-control" placeholder="John Doe" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Contact : </label>
                                        <input type="text" class="form-control" placeholder="00-00-00-00-00" disabled>
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
        <!-- /. info modal -->
        <!-- update modal -->
        <div class="modal fade" id="update-lg">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit ODP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Année :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nombre de Jour :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label>Longueur :</label>
                                    <input type="text" class="form-control" placeholder="M">
                                </div>
                                <div class="col-4">
                                    <label>Largeur :</label>
                                    <input type="text" class="form-control" placeholder="M">
                                </div>
                                <div class="col-4">
                                    <label>Superficie :</label>
                                    <input type="text" class="form-control" placeholder="M²">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Indicat (Fcfa) : </label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Reste (Fcfa) : </label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label>Total (Fcfa) :</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Observation :</label>
                                        <textarea class="form-control" rows="4" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Commerçant :</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
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
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
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

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>

</html>