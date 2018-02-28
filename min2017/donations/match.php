
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
               <?php
              if(!empty($_GET['errmsg'])) {
              $message = $_GET['errmsg'];

              echo '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>'.$message.'
              </div>
              ';
            }
              ?> <form class="form-horizontal" action="process.php?action=add" method="post">
<div class="row">
        <div class="col-xs-12">
         
            <div class="box">

            <div class="box-header">
              <h3 class="box-title">GH Members</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Growth</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                 <?php 
                $sql="SELECT t.id as id, t.user_id  as userid,u.username as usrrs,t.amount as amt, t.status as tatusd FROM tbl_users u,gh_entry t WHERE u.id = t.user_id AND t.status=0";
                 $result = dbQuery($sql);
                  while ($row = dbFetchAssoc($result)) {

                  $phDate = $row['updated_at'];
                  $phID = $row['id'];
                  $req = $row['usrrs'];
                  $gho = $row['amt'];
                  $std = $row['tatusd'];
                  $stdf = $row['userid'];
                  if ($std == 0) {
                    $name = 'withdrawal request';
                  }
                  ?>
                <tr>
                  <td><?php echo $req ?></td>
                  <td><?php echo $gho?></td> 
                  <td><?php echo $phDate?></td>
                  <td><?php echo $name?></td>
                  <td>
                    <input type="checkbox" name="gh" value="<?php echo $phID ?>">
                    <input type="hidden" name="userIdd" value="<?php echo $stdf?>">
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
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">PH Members</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped table-responsive">
                <thead>
                 <tr>
                  <th>Username</th>
                  <th>PH</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
              <tbody>
                 <?php 
                 $sql="SELECT t.id as tIDd, t.user_id  as ttDd,u.username as usrrd,t.dream_amount as damntd, t.mature_on as maturedated, t.status as tstatusd FROM tbl_users u, tbl_transaction t WHERE u.id = t.user_id AND status='pending' AND period=1";
                 $result = dbQuery($sql);
                  while ($row = dbFetchAssoc($result)) {
                    $pho = $row['user_id'];
                   $f = $row['ttDd'];
                   $m= $row['tIDd'];
                  $phDate = $row['date'];
                  $phDate = date('M d, Y', strtotime($phDate));
                   
                  ?>
               <tr>
                  <td><?php echo $row['usrrd']?></td>
                  <th><?php echo $row['damntd']?></th>
                  <td><?php echo $row['maturedated']?></td> 
                  <td><?php echo $row['tstatusd']?></td>
                  <td>
                    <input type="checkbox" name="ph" value="<?php echo $m?>">
                    <input type="hidden" name="userId" value="<?php echo $f?>">
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
          <button type="submit" class="btn btn-info pull-right">Assign GH to PH</button>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>

      </form>