<?php
  $sql = "SELECT * FROM tbl_users u, tbl_accounts a, tbl_address ad WHERE u.id = a.user_id AND ad.user_id = u.id AND u.is_active='False'";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Blocked Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = dbFetchAssoc($result)) {
                  extract($row);
                ?>
                <tr>
                  <td><?php echo $fname.' '.$lname ?></td>
                  <td><?php echo $username?></td>
                  <td><?php echo $phone?></td>
                  <td><?php echo $email?></td>
                  <td><a href="javascript:changeUserStatus(<?php echo $id; ?>, '<?php echo $is_active; ?>');"><?php echo $is_active == 'False'? 'Unblock' : 'Active'; ?></td>
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