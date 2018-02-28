<?php
  $sql = "SELECT u.id as usrid, a.user_id as aid, u.username as uusr, u.phone as uphone, a.donation_amount as adamnt, a.dream_amount as addamnt, a.date as dt, a.status as stst FROM tbl_users u, tbl_transaction a WHERE u.id=a.user_id AND a.status='Approved'";
  $result = dbQuery($sql);
?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Donations</h3>
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
                  <th>Phone</th>
                  <th>PH</th>
                   <th>GH</th>
                   <th>Date</th>
                  <th>Mature On</th>
                  <th>Status</th>
                  <th>Action</th>
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
                  <td><?php echo $uphone?></td>
                  <td><?php echo $adamnt?></td>
                   <td><?php echo $addamnt?></td>
                   <td><?php echo $newDate?></td>
                   <td><?php echo date('M d, Y', $date)?></td>
                  <td><?php echo $stst?></td>
                  <td>
                    <a href="process.php?action=pay&userId=<?php echo $usrid; ?>" class="btn btn-flat btn-warning" onclick="return confirm('Are you sure to pay this person?')">Paid</a>
                  </td>
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
       