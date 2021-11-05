<?php
include("../layout/top-nav.php");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <h2 class="text-center display-4">Demandes d'Interventions</h2>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <?php
        include("../layout/mail-left-sidebar.php");
        ?>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Détails de la demande</h3>
            </div>
            <!-- /.card-header -->
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Agent :</label>
                      <input type="text" class="form-control" value="Silue Richard" disabled>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Type de panne :</label>
                      <input type="text" class="form-control" value="Ordinateur" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Description :</label>
                      <textarea class="form-control" rows="4" placeholder="Ma souris ne fonctionne plus " disabled></textarea>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Informaticien :</label>
                      <select class="form-control">
                        <option>Tano Eric</option>
                        <option>Attron Stéphane</option>
                        <option>Yapi Talec</option>
                        <option>Kra patrice</option>
                        <option>Ouedraogo Salif</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Priorité :</label>
                      <select class="form-control">
                        <option>Elevé</option>
                        <option>Moyen</option>
                        <option>Faible</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyé</button>
                </div>
              </div>
            </form>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php
include("../layout/main-footer.php");
?>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page specific script -->

</body>

</html>