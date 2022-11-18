<?php include("../layout/top-nav.php"); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <h2 class="text-center display-4">Gestion des Plaintes</h2>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="mailbox.php" class="btn btn-primary btn-block mb-3">Retour</a>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Gestion des Plaintes</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="mailbox.php" class="nav-link">
                    <i class="fas fa-inbox"></i> Réçues
                    <!-- <span class="badge bg-primary float-right">15</span> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a href="waiting.php" class="nav-link">
                    <i class="far fa-file-alt"></i> En attente de confirmation
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mailbox-sent.php" class="nav-link">
                    <i class="far fa-envelope"></i> En cours
                    <!-- <span class="badge bg-warning float-right">03</span> -->
                  </a>
                </li>
                <li class="nav-item">
                  <a href="mailbox-solve.php" class="nav-link">
                    <i class="fas fa-filter"></i> Résolues
                    <!-- <span class="badge bg-success float-right">10</span> -->
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Saisir une plainte</h3>
            </div>
            <!-- /.card-header -->

            <form action="" method="post" id="interform">
              <div class="card-body">
                <div id="errormessage"></div>

                <div class="form-group">
                  <label>Motif :</label>
                  <input type="text" class="form-control" name="plainte_motif" id="plainte_motif">
                </div>
                <div class="form-group">
                  <label>Description :</label>
                  <textarea class="form-control" rows="4" name="plainte_des" id="plainte_des" placeholder="Enter ..." required></textarea>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                  <button type="submit" class="btn btn-primary add_inter" name="add_inter" id="add_inter"><i class="far fa-envelope"></i> Envoyé</button>
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
<script src="../dist/js/inter.js"></script>


</body>

</html>