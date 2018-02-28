<?php
  $sql = "SELECT * FROM payment_proofs WHERE status='Approve'";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-12">
                       <?php

                    if(!empty($_GET['msg'])) {
   $message = $_GET['msg'];

   echo '<div class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   <i class="icon fa fa-check"></i>'.$message.'
                   </div>';
   };
                  ?>
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Confirmed Payments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Name</th>
                   <th>Trans. ID</th>
                   <th>Amount</th>
                    <th>status</th>
                   <th>Comments</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  while ($row = dbFetchAssoc($result)) {
                  extract($row);
                  $originalDate = $mdate;
                  $newDate = date('M d, Y', strtotime($originalDate));
                ?>
                <tr>
                  <td><?php echo $payment_type ?></td>
                  <td><?php echo $payment_name?></td>
                  <td><?php echo $transactionid;?></td>
                   <td><?php echo $amount?></td>
                   <td><?php echo $status?></td>
                  <td><?php echo $comments;?></td>
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