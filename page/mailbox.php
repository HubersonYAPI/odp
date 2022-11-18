<?php
include("../layout/top-nav.php");
?>

<?php
// Get the user_id
$user_id = $_SESSION["user_id"];
$sql = 'SELECT * FROM plaintes, commercants WHERE commercants.com_id = plaintes.commercants_com_id ORDER BY plainte_id DESC';
$plaintes = mysqli_query($link, $sql);
?>


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
        <?php
        include("../layout/mail-left-sidebar.php");
        ?>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Plaintes Réçues</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Recherche">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <tbody>
                    <?php foreach ($plaintes as $plainte) : ?>

                      <tr class="view_inter" name="view_inter" id="<?= $plainte["plainte_id"]; ?>" style="cursor: pointer;" data-target="#modal-lg" data-toggle="modal">
                        <td>
                          <div class="icheck-primary">
                            <input type="checkbox" value="" id="check<?= $plainte['plainte_id']; ?>">
                            <label for="check<?= $plainte['plainte_id']; ?>"></label>
                          </div>
                        </td>
                        <!-- <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td> -->
                        <td class="mailbox-name"><a href="#"><?= $plainte['com_nom'] ?></a></td>
                        <td class="mailbox-subject"><b><?= $plainte['plainte_motif'] ?></b> - <?= $plainte['plainte_des'] ?>...
                        </td>
                        <td class="mailbox-attachment"></td>
                        <td class="mailbox-date">5 mins ago</td>
                      </tr>
                    <?php endforeach; ?>

                    <tr>
                      <td>
                        <div class="icheck-primary">
                          <input type="checkbox" value="" id="check2">
                          <label for="check2"></label>
                        </div>
                      </td>
                      <!-- <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td> -->
                      <td class="mailbox-name"><a href="#">Alexander Pierce</a></td>
                      <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b> - Trying to find a solution to this problem...
                      </td>
                      <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                      <td class="mailbox-date">28 mins ago</td>
                    </tr>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                  <i class="far fa-square"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="far fa-trash-alt"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-reply"></i>
                  </button>
                  <button type="button" class="btn btn-default btn-sm">
                    <i class="fas fa-share"></i>
                  </button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
                <div class="float-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">
                      <i class="fas fa-chevron-right"></i>
                    </button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- add modal -->
    <div class="modal fade" id="modal-lg">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Détails de la plainte </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <form id="readform" method="post">
            <div class="modal-body">

              <div id="errorreadmessage"></div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Commerçant :</label>
                    <input type="text" class="form-control" name="view_user" id="view_user" disabled>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Statut :</label>
                    <input type="text" class="form-control" name="view_status" id="view_status" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Motif :</label>
                    <input type="text" class="form-control" name="view_motif" id="view_motif" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Description :</label>
                    <textarea class="form-control" rows="4" name="view_desc" id="view_desc" disabled></textarea>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Agent Traitant :</label>
                    <input type="hidden" class="form-control"  name="ag_id" id="ag_id">
                    
                    <input type="text" class="form-control" name="ag_nom" id="ag_nom" disabled>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Contact :</label>
                    <input type="text" class="form-control" name="view_contact" id="view_contact" disabled>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col">
                  <label>Rapport :</label>
                  <textarea class="form-control" rows="4" name="view_rapport" id="view_rapport" placeholder="" disabled></textarea>
                </div>
              </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <input type="hidden" name="employee_id" id="employee_id"> -->
              <!-- <button type="submit" class="btn btn-primary" name="add_odp" id="add_odp">Save changes</button> -->
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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

<script>
  $(function() {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function() {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function(e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>

</body>

</html>