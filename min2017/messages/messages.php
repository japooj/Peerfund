<?php
  $sql = "SELECT * FROM tbl_messages WHERE level='Admin'";
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
              <h3 class="box-title">All Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Body</th>
                   <th>Date</th>
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
                  <td><?php echo $title ?></td>
                  <td><?php echo $body?></td>
                  <td><?php echo $newDate;?></td>
 
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