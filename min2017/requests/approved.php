<?php
  $sql = "SELECT * FROM tbl_users u, withdraw_requests a, tbl_transaction ad WHERE u.id = a.user_id AND ad.user_id = u.id AND a.approval='1' AND ad.status='paid'";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Requests</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fullname</th>
                   <th>Username</th>
                  <th>Amount (Growth)</th>
                  <th>Phone</th>
                  <th>PH Date</th>
                  <th>Status</th>
 
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = dbFetchAssoc($result)) {
                  extract($row);
                  if ( $status) {
                    $statusVal = 'Requeste approved';
                  }
                ?>
                <tr>
                   <td><?php echo $fname.' '.$lname ?></td>
                   <td><?php echo $username?></td>
                  <td><?php echo $donation_amount?></td>
                  <td><?php echo $phone?></td>
                  <td><?php echo $date?></td>
                  <td><?php echo $statusVal?></td>
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
      <script type="text/javascript">
        function changeUserStatus(userId, status)
{
  var st = status == 'False' ? 'Unblock' : 'Block'
  if (confirm('Do you want to ' + st+' this user?')) {
    window.location.href = 'processUser.php?action=status&userId=' + userId + '&nst=' + st;
  }
}
      </script>