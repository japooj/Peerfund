<?php
  $sql = "SELECT a.id as st,b.id as stt,a.username as usr,b.donation_amount as damt, b.status as stu
          FROM tbl_users a, tbl_transaction b
          WHERE a.id = b.user_id AND b.status='Matured Order'";
  $result = dbQuery($sql);



  $sql1 = "SELECT a.id as st,b.id as stt,a.username as usr,b.donation_amount as damt, b.status as stu
           FROM tbl_users a, tbl_transaction b
           WHERE a.id = b.user_id AND b.status='Pending Order'";
  $result1 = dbQuery($sql1);
?>

<div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Match Donors</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                   <?php
              if(!empty($_GET['msg'])) {
              $message = $_GET['msg'];

              echo '
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>'.$message.'
              </div>
              ';
            }
              ?>
             <form class="form-horizontal" action="process.php?action=add" method="post">
             
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Receivers</label>

                    <div class="col-sm-10">
                     <select class="form-control" name="receiver" required>
                     <option value="0">---Select Receiver---</option>
                       <?php
                        while ($row = dbFetchAssoc($result)) {
                        $usid = $row['st'];
                        $usidd = $row['usr'];
                        $usiddd = $row['damt'];
                        ?>
                        <option value="<?php echo $usid?>"><?php echo $usidd?> - PH <?php echo $usiddd?></option>
                        <?php
                       }
                       ?>
                     </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Payers</label>

                    <div class="col-sm-10">
                     <select class="form-control" name="payer" required>
                      <option value="0">---Select Payer---</option>
                      <?php
                        while ($row1 = dbFetchAssoc($result1)) {
                        $uside = $row1['st'];
                        $usidde = $row1['usr'];
                        $usp = $row1['damt'];
                        ?>
                        <option value="<?php echo $uside?>"><?php echo $usidde?> - PH <?php echo $usp ?></option>
                        <?php
                       }
                       ?>
                       
                     </select>
                    </div>
                  </div>

                  <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Continue</button>
              </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>