 <form class="form-horizontal" action="process.php?action=add" method="post">
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
                  <th>Amount  (GHC)</th>
                  <th>Date</th>
                  <th>Growth</th>
                  <th>Mature On</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                 $phstmt = $sql="SELECT * FROM tbl_users u, tbl_transaction t WHERE u.id = t.user_id AND status='paid'";
                 $phresult = dbQuery($phstmt);
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

        </div>
        <!-- /.col -->

      </div>

      </form>