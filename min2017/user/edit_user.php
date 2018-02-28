<?php
if (!defined('WEB_ROOT')) {
  exit;
}

if (isset($_GET['userId']) && $_GET['userId'] > 0) {
  $userId = $_GET['userId'];
} else {
  header('Location: index.php');
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT * FROM tbl_users u, tbl_accounts a, tbl_address ad WHERE u.id = a.user_id AND ad.user_id = u.id AND u.id = $userId";
$result = dbQuery($sql);   
extract(dbFetchAssoc($result));


?> 
      <div class="row">
                    <div class="col-md-5">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Edit User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=updateusr" method="post" enctype="multipart/form-data" id="acclogin">
      <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $id; ?>"> </td>
  <div class="form-group has-feedback">
    <label>Firstname</label>
        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required autocomplete="off" 
        value="<?php echo $fname?>">
      </div>
      <div class="form-group has-feedback">
        <label>Lastname</label>
        <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required autocomplete="off" 
        value="<?php echo $lname?>">
      </div>
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Enter Username" name="username" required autocomplete="off" 
        value="<?php echo $username?>">
      </div>
      <div class="form-group has-feedback">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" required autocomplete="off" 
        value="<?php echo $phone?>">
      </div>
      <div class="form-group has-feedback">
        <label>Email</label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email" required autocomplete="off" 
        value="<?php echo $email?>">
      </div>
      <div class="form-group has-feedback">
        <label>Country</label>
        <select class="form-control mlc-select" id="country_is" name="country_is">
          <option selected = "selected" disabled = "disabled" value="">---Select Country---</option>
          <option value="GH" <?php if($country=="GH") echo 'selected="selected"'; ?>>Ghana</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <label>Account Type</label>
        <select class="form-control mlc-select" id="default_is" name="default_is">
          <option selected = "selected" disabled = "disabled" value="">Select Payment Type</option>
          <option id="blue" value="MobileMoney" <?php if($acct_type=="MobileMoney") echo 'selected="selected"'; ?>>Mobile Money</option>
        </select>
      </div>
            <div class="form-group has-feedback">
              <label>Mobile Money Name</label>
        <input type="text" class="form-control" placeholder="Enter Mobile Money Name" name="mmname" required autocomplete="off" 
        value="<?php echo $acct_name?>">
      </div>
            <div class="form-group has-feedback">
              <label>Mobile Money Number</label>
        <input type="text" class="form-control" placeholder="Enter Mobile Money Number" name="mmnumber" required autocomplete="off" 
        value="<?php echo $acct_number?>">
      </div>

      <div class="row">

        <div class="col-xs-12">
          <input name="submitButton" type="submit" id="submitButton" style="background-color: #00BDCA; border-color:#00BDCA " value="Update Account!" class="btn btn-primary btn-block btn-flat" >
        </div>
      </div>
    </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->