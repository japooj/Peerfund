<?php 
       $userID = $_SESSION['hlbank_user']['user_id'];

       $sql="SELECT SUM(amount) FROM tbl_referrals WHERE userid='$userID' AND status ='approved'";
       $result = dbQuery($sql);
       while ($row = dbFetchAssoc($result)) {
        $total = $row['SUM(amount)'];
       }
?>
        <div class="row">
              <section class="content-header">
      <h1>
        My Referrals
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
              <button type="button" class="btn bg-olive margin" style="float: right" onclick="approveReferrals()">
                [<?php echo  $total?>GHC] Withdraw</button>
              <h3 class="box-title">Referrals</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="" class="table table-bordered table-responsive">

                <thead>
                <tr>
                  <th>Username</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
                </thead>
                 <tbody>
                  <?php 
                  $sql="SELECT username, phone, amount, status FROM tbl_referrals WHERE userid='$userID'";
                  $result = dbQuery($sql);
                  while ($row = dbFetchAssoc($result)) {
                  ?>
                <tr>
                  <td><?php echo $row['username']?></td>                
                  <td><?php echo $row['phone']?></td>
                   <th><?php echo $row['amount']?></th>
                  <td><?php echo $row['status']?></td>
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
              <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
             <p>
            <strong>Your Referral Link: 
            <a href="https://peerfundgh.com/user/register.php?ref=<?php echo $_SESSION['hlbank_user']['referral_code'];?>" target='_blank'>https://peerfundgh.com/user/register.php?ref=<?php echo $_SESSION['hlbank_user']['referral_code'];?></a>
            </strong>
          </p>
              
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>

      <script type="text/javascript">
          function approveReferrals(){
            var approval = <?php echo $total?>;
            if(approval < 500){
              alert('Sorry! Your bonus is less than 500GHC');
              return;
            }
            var confirmation = confirm(`Click ok to confirm Withdraw`);

            if(confirmation){

              $.post('perform_upgrade.php').then((response)=>{
                if(response)
                window.location = window.location;
                console.log(reponse);
              },(err)=>{
                console.log(err);
              })
            }
          }
        </script>