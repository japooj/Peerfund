<?php 
$userID = $_SESSION['hlbank_user']['id'];
$sql="SELECT * FROM tbl_transaction WHERE user_id='$userID' AND status='paid' ORDER BY id DESC";
$result = dbQuery($sql); 
?>
        <div class="row">
              <section class="content-header">
      <h1>
        History
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>view/index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Pages</li>
        <li class="active"><?php echo $pageTitle ?></li>
      </ol>
    </section><br>
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">History</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-responsive">
                <thead>
                <tr>
                  <th>Amount  (GHC)</th>
                  <th>Date</th>
                  <th>Growth</th>
                  <th>Mature On</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                  while ($row = dbFetchAssoc($result)) {
                  $userStatus = $row['status'];

                  $phDate = $row['date'];
                  $phDate = date('M d, Y', strtotime($phDate));

                  ?>
                <tr>
                  <td><?php echo $row['dream_amount']?></td>
                                    
                  <td><?php echo $phDate?></td>
                   <th><?php echo $row['donation_amount']?></th>
                  <td><?php echo $row['mature_on']?></td>
                  <td class="text-green"><?php echo $userStatus?></td>
                   <td><a href="<?php echo WEB_ROOT; ?>view/?v=testimonials" id='testbtn' class="btn btn-success flat" 
                    >Testify</a></td>
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
        <!-- /.col -->
      </div>