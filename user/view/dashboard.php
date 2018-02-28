<?php 
 $userID = $_SESSION['hlbank_user']['id'];
 $usrName = $_SESSION['hlbank_user_name'];
 $ipAddress = $_SERVER['REMOTE_ADDR'];
 $currentDate = date("d M Y");

 $sql="SELECT count(*) AS totalUsr FROM tbl_users";
 $result = dbQuery($sql);
 $row = dbFetchAssoc($result);
 $countUsers = $row['totalUsr'];

 $sql="SELECT * FROM tbl_transaction WHERE user_id='$userID' ORDER BY id DESC LIMIT 1";
 $result = dbQuery($sql);
 while ($row = dbFetchAssoc($result)){
    $status = $row['status'];
    $period = $row['period'];
 }

$sql1="SELECT * FROM tbl_transaction WHERE user_id='$userID' ORDER BY id ASC LIMIT 1";
$result1 = dbQuery($sql1);
while ($row1 = dbFetchAssoc($result1)){
       $status1 = $row1['status'];
       $period1 = $row1['period'];
}

$sql="SELECT count(*) AS totalReq FROM withdraw_requests WHERE user_id='$userID'";
$result = dbQuery($sql);
while ($row1 = dbFetchAssoc($result1)){
       $withReq = $row1['totalReq'];
}

$sql="SELECT * FROM withdraw_requests WHERE user_id='$userID' AND approval=0";
$result = dbQuery($sql);
while ($row = dbFetchAssoc($result)){
  $mgg='
  <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>Your withdrawal request is successful. Please wait while your request is been processed.
  </div>';
}

?>
  <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>view/"><i class="fa fa-home"></i> Home</a></li>
        <li class="active"><?php echo $pageTitle ?></li>
      </ol>
    </section>
    
      <div class="row">

        <div class="box-body">
          <?php
              if(!empty($_GET['message'])) {
              $message = $_GET['message'];
              echo '
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>'.$message.'
              </div>
              ';
            }else if(!empty($_GET['errmessage'])) {
               $message = $_GET['errmessage'];
              echo '
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fa fa-check"></i>'.$message.'
              </div>
              ';
            }
              ?>
 </div>
             <div class="col-md-12">
              <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12" style="float: right;">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Members</span>
              <span class="info-box-number"><?php echo $countUsers?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
             <div class="callout callout-info">
              <strong>Welcome, <?php echo $usrName;?></strong>
                <p>You have logged in from IP: <?php echo $ipAddress?> You log in on: <?php echo $currentDate; ?></p>
                 <p><strong>UPDATES: Please be aware that public updates and latest news on PeerFund GH will mostly be posted on the community's Telegram page <a href="https://t.me/joinchat/GQRtAU4fSnWuiyLPu0tdwQ" target="_blank">PeerFund GH</a></strong></p>
              </div>
            <table class="table table-bordered text-center table-responsive" id="activatepage">
                <tbody>
                <tr>
                   <td>
                   <a href="<?php echo WEB_ROOT; ?>view/?v=view_recommit">
                   <button type="button" class="btn btn-block btn-warning btn-flat"<?php if($status == "" || $status == "pending" || $status == "confirmed") echo 'disabled="disabled"';?>>Recommit</button></a>
                  </td>
                   <td>
                   <a href="<?php echo WEB_ROOT; ?>process/?action=request_withdraw">
                    <button type="button" class="btn btn-block btn-info btn-flat" onclick="approveWithdraw()" 
                    <?php if($status1 == "" || $status1 == "confirmed" || $status1 == "pending" || $period1 <= 3 || $period1 == 5 || $status1 == "processing") echo'disabled="disabled"';
                     ?> onclick="return confirm('Are you sure to Request withdrawal?')">Withdraw</button></a>
                  </td>
                </tr>
              </tbody>
            </table>
                  <?php $requests =getUpgradeRequest($_SESSION['hlbank_user']);?>
                  <?php foreach($requests as $request) {
                   ?>
                    <?php if($request['approval'] == 'pending'){
                     
                     
                     ?>
                    <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Receive Up</h3>
            </div>
                 <table id="bidsTable" class="table table-bordered table-responsive">
               
                <tbody>
                      <tr>
                  <th>Timer</th>
                  <th>Account</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Action</th>
                  
                </tr>
                 <tr>
                  
                  <td><p id="demo"></p></td>
                  <td><?php echo $request['acct_type'].' , '.$request['acct_name'].' , '.$request['acct_number'];?></td>
                   <td><?php echo $request['dream_amount']; ?></td>
                  <td><?php echo $request['phone']; ?></td>
                  <td><a href="<?php echo WEB_ROOT; ?>view/process.php?action=approveuser&userId=<?php echo $request['id']?>" class="btn btn-sm btn-success btn-flat" onclick="return confirm('Are you sure to confirm payment receipt?')">Accept Request</a></td>
                
                </tr>
                        </tbody>
                    </table>
                    
            <!-- /.box-body -->
          </div>
                        <?php  }} ?>
    
                  <?php $requests2 =getUpgradeRequest2($_SESSION['hlbank_user']);?>

                  <?php foreach($requests2 as $request2) {?>
                    <?php if($request2['approval'] == 'pending'){ 
                      ?>
                    <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">Pay Up</h3>
            </div>
                 <table id="" class="table table-bordered table-responsive">
               
                <tbody>
                      <tr>
                  <th>Timer</th>
                  <th>Account</th>
                  <th>Phone</th>
                  <th>Amount</th>
                  <th>Action</th>
                  
                </tr>
                 <tr>
                  
                  <td><p id="demo"></p></td>
                  <td><?php echo $request2['acct_type'].' , '.$request2['acct_name'].' , '.$request2['acct_number'];?></td>
                   <td><?php echo $request2['dream_amount']; ?></td>
                  <td><?php echo $request2['phone']; ?></td>
                  
                
                </tr>
                        </tbody>
                    </table>
                    
            <!-- /.box-body -->
          </div>
                        <?php  }} ?>
                    
          <div class="box box-primary">

            <div class="box-header with-border">
              <h3 class="box-title">Maturing PH</h3>
            </div>
              <table id="tbl" class="table table-bordered table-responsive">
                <thead>
                <tr>
                  <th>Amount  (GHC)</th>
                  <th>Date</th>
                  <th>On Maturity</th>
                  <th>Mature On</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                  <?php


            $sql="SELECT * FROM tbl_transaction WHERE user_id='$userID' ORDER BY id ASC";
            $result = dbQuery($sql);
            while ($row = dbFetchAssoc($result)) {
            $dmamnt = $row['dream_amount'];
            $dnamnt = $row['donation_amount'];
            $fstatus = $row['status'];

            switch ($fstatus) {
              case 'pending':
                $value = "Pending";
                break;

                case 'confirmed':
                $value = "Confirmed";
                break;

                case 'recommit':
                $value = "Recommit";
                break;

                case 'processing':
                $value = "Wait for matching";
                break;

                case 'matured':
                $value = "processing";
                break;

                 case 'paid':
                $value = "paid";
                break;

              
              default:
                # code...
                break;
            }

            $timestamp = strtotime($row['date']);
            $date = date('M d, Y', $timestamp);
            $time = date('h:m A', $timestamp);

            $timestamp_mature = strtotime($row['mature_on']);
            $date_mature = date('M d, Y', $timestamp_mature);
            $time_mature = date('h:m A', $timestamp_mature);
          
                  
                  ?>
                <tr>
                  <td><?php echo $dmamnt;?></td>
                  <td><?php echo $date.' '.' /'.' '.$time;?></td>
                   <th><?php echo $dnamnt;?></th>
                  <td><?php echo $date_mature.' '.' /'.' '.$time?></td>
                  <td class="text-green"><?php echo $value;?></td>
                </tr>
               <?php
             }
               ?>
                </tbody>
              </table>
          </div>

</div>
           <?php 
$sql="SELECT * FROM upgrade_requests WHERE user_id='$userID' OR parent_id='$userID' AND approval='pending'";
$result = dbQuery($sql);
while ($row = dbFetchAssoc($result)) {
  $dmamnt = $row['updated_at'];
}
?>   

      </div>

<
        <script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $dmamnt ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  var distance = 1;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);


  
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s"+distance++;
    

  // Display the result in the element with id="demo"
  

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

</script>

<script type="text/javascript">
                              function approveDownline(){

          var confirmation = confirm(`Click ok to confirm received of payment`);

          if(confirmation){
            $.post('<?php echo WEB_ROOT; ?>view/perform_upgrade.php').then((response)=>{
              if(response)
              window.location = window.location;
              console.log(reponse);
            },(err)=>{
              console.log(err);
            })
          }
        }
                    </script>
