<?php
  $sql = "SELECT * FROM tbl_users u, tbl_accounts a, tbl_address ad WHERE u.id = a.user_id AND ad.user_id = u.id";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>
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
                  <th>Action</th>
                  <th>Action</th>
                  <th>Action</th>
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
                  <td><?php echo $is_active == 'False'? 'Block' : 'Active'; ?></td>
                  <td> <a href="<?php echo WEB_ROOT; ?>user/?view=edit_user&userId=<?php echo $id; ?>" class='btn bg-navy btn-flat'>Edit</td>
                  <td><a href="processUser.php?action=delete&userId=<?php echo $id; ?>" class='btn bg-olive btn-flat' onclick="return confirm('Are you sure to delete user?')">Delete</td>
                    <td> <a href="<?php echo WEB_ROOT; ?>user/?view=view_user&userId=<?php echo $id; ?>" class='btn bg-navy btn-flat'>View</td>
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