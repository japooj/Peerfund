<?php
  $sql = "SELECT u.id as usrid, a.user_id as aid, u.username as uusr, u.phone as uphone, a.donation_amount as adamnt, a.dream_amount as addamnt, a.date as dt,a.mature_on as dte, a.status as stst FROM tbl_users u, tbl_transaction a WHERE u.id=a.user_id AND a.status='confirmed'";
  $result = dbQuery($sql);
?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            
            <div class="box-header">
              <h3 class="box-title">Confirmed PH</h3>
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
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>PH</th>
                   <th>GH</th>
                   <th>Date</th>
                  <th>Date to GH</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = dbFetchAssoc($result)) {
                  extract($row);

                  $date = $dt;
                  $date = strtotime($date);
                  $date = strtotime("+7 day", $date);
                  
                  $originalDate = $dt;
                  $newDate = date('M d, Y', strtotime($originalDate));
                ?> 
                <tr>
                  <td><?php echo $uusr ?></td>
                  <td><?php echo $addamnt?></td>
                   <td><?php echo $adamnt?></td>
                   <td><?php echo $newDate?></td>
                   <td><?php echo $dte?></td>
                  <td><?php echo $stst?></td>
                </tr>
                <?php
                }
                ?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
       