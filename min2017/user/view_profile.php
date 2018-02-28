<?php
if (!defined('WEB_ROOT')) {
  exit;
}

if (isset($_GET['userId']) && (int)$_GET['userId'] > 0) {
  $userId = (int)$_GET['userId'];
} else {
  header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT * FROM tbl_users u, tbl_accounts a, tbl_address ad WHERE u.id = a.user_id AND ad.user_id = u.id AND u.id = $userId";
$result = dbQuery($sql);   
extract(dbFetchAssoc($result));
?> 
<div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo WEB_ROOT; ?>dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $fname.' '.$lname?></h3>

              <p class="text-muted text-center">Account Status: [<?php echo $is_active == 'False'? 'Block' : 'Active'; ?>]</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $username?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo $phone?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $email?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Profile Details</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
              
                  <p>
                   <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>First Name</b> <a class="pull-right"><?php echo $fname?></a>
                </li>
                <li class="list-group-item">
                  <b>Last Name</b> <a class="pull-right"><?php echo $lname?></a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $username?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $email?></a>
                </li>
                <li class="list-group-item">
                  <b>Account Status</b> <a class="pull-right"><?php echo $is_active == 'False'? 'Block' : 'Active'; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Registeration Date</b> <a class="pull-right"><?php echo $bdate?></a>
                </li>
                <li class="list-group-item">
                  <b>Referral Code</b> <a class="pull-right"><?php echo $referral_code?></a>
                </li>
                <li class="list-group-item">
                  <b>Referred By</b> <a class="pull-right"><?php echo $original_referral_by?></a>
                </li>
                <li class="list-group-item">
                  <b>IP Adddress</b> <a class="pull-right"><?php echo $ip?></a>
                </li>
                 <li class="list-group-item">
                  <b>Country</b> <a class="pull-right"><?php echo $country?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile Money Name</b> <a class="pull-right"><?php echo $acct_name?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile Money Number</b> <a class="pull-right"><?php echo $acct_number?></a>
                </li>
                
              </ul>
                  </p>

                </div>
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>