<?php
$phstmt = $sql="SELECT * FROM tbl_users u, tbl_transaction t WHERE u.id = t.user_id AND status='pending'";
$phresult = dbQuery($phstmt);
?>
      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">View PH</h3>
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
                  <th>Amount  (GHC)</th>
                  <th>Date</th>
                  <th>Growth</th>
                  <th>Mature On</th>
                  <th>Status</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                  while ($phrow = dbFetchAssoc($phresult)) {

                  $phDate = $phrow['date'];
                  $phDate = date('M d, Y', strtotime($phDate));
                  ?>
                <tr>
                  <td><?php echo $phrow['username']?></td>
                  <td><?php echo $phrow['dream_amount']?></td>
                                    
                  <td><?php echo $phDate?></td>
                   <th><?php echo $phrow['donation_amount']?></th>
                  <td><?php echo $phrow['mature_on']?></td>
                  <td><?php echo $phrow['status']?></td>
                  <td>
                    <a href="process.php?action=delete&userId=<?php echo $phrow['user_id']; ?>" class="btn btn-flat btn-success" onclick="return confirm('Are you sure to delete donation?')">Delete</a>
                  </td>
                  <td>
                    <a href="process.php?action=confirm&userId=<?php echo $phrow['user_id']; ?>" class="btn btn-flat btn-warning" onclick="return confirm('Are you sure to confirm donation?')">Confirm</a>
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
       