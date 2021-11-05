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
              <h3 class="card-title">Demande en Cours</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form>
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
                      <input type="text" class="form-control" value="Attron Stéphane" disabled>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Priorité :</label>
                      <input type="text" class="form-control" value="Elevé" disabled>
                    </div>
                  </div>
                </div>
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
              </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="float-right">
                <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Envoyé</button>
              </div>
            </div>
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