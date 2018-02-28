    <link href="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.js" type="text/javascript"></script>
<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>
<link href="<?php echo WEB_ROOT; ?>library/spry/confirmvalidation/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/confirmvalidation/SpryValidationConfirm.js" type="text/javascript"></script>
    <section class="content-header">
      <h1>
        My Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>view/index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Pages</li>
        <li class="active"><?php echo $pageTitle ?></li>
      </ol>
    </section>
    <br>
          <!-- /.row -->
                    <?php
                     $userID = $_SESSION['hlbank_user']['user_id'];
                     $sql="SELECT acct_name,acct_number,acct_type FROM tbl_accounts WHERE user_id='$userID'";
                     $result = dbQuery($sql);
                     while ($row = dbFetchAssoc($result)) {
                       $name = $row['acct_name'];
                       $number = $row['acct_number'];
                       $type = $row['acct_type']; 
                     }
                    ?>
              <div class="row">
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Accounts</h3>
            </div>
                   <div class="box-body">
                   <form action="<?php echo WEB_ROOT; ?>view/process.php?action=updateacct" method="post" class="form-horizontal">
                  <input type="hidden" name="id" value="<?php echo $_SESSION['hlbank_user']['user_id'];?>" />
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Account Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail" value="<?php echo $name?>" name="acctname" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Account Number</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail" value="<?php echo $number?>" name="acctnumber" disabled>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Payment Method</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail" value="<?php echo $type?>" name="acctnumber" disabled>
                              
                    </div>
                  </div>
                 
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
        <div class="row">
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Personal Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form class="form-horizontal" action="<?php echo WEB_ROOT; ?>view/process.php?action=perinfo" method="post">
            <input type="hidden" name="id" value="<?php echo $_SESSION['hlbank_user']['user_id'];?>" />
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Country</label>
                    <div class="col-sm-10">
                    <?php
                     $userID = $_SESSION['hlbank_user']['user_id'];
                     $sql="SELECT country FROM tbl_address WHERE user_id='$userID'";
                     $result = dbQuery($sql);
                     while ($row = dbFetchAssoc($result)) {
                       $country = $row['country'];
                     }
                    ?>
                      <select class="form-control" id="inputName" name="country">
                      <option value="GH" <?php if($country=="GH") echo 'selected="selected"'; ?>>Ghana</option>
                      </select>
                    </div>
                  </div>
                  <?php
                     $userID = $_SESSION['hlbank_user']['user_id'];
                     $sql="SELECT phone FROM tbl_users WHERE id='$userID'";
                     $result = dbQuery($sql);
                     while ($row = dbFetchAssoc($result)) {
                       $phone = $row['phone'];
                     }
                    ?>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Mobile Phone</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail" value="<?php echo $phone ?>" name="phone">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

       <div class="row">
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <form class="form-horizontal" action="<?php echo WEB_ROOT; ?>view/process.php?action=changepwd" method="post">
                  <input type="hidden" name="id" value="<?php echo $_SESSION['hlbank_user']['user_id'];?>"/>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                    <span id="sprypwd">
                      <input type="Password" class="form-control" id="inputName" placeholder="Password" name="pass">
                      <span class="textfieldRequiredMsg">Password is required.</span>
                      <span class="textfieldMinCharsMsg">Password must specify at least 6 characters.</span>
                      <span class="textfieldMaxCharsMsg">Password must specify at max 10 characters.</span>
                      <span class="textfieldInvalidFormatMsg">Password must be Integer.</span>
                    </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                    <span id="sprycpwd">
                  <input type="Password" class="form-control" id="inputEmail" placeholder="Confirm Password" name="cpass">
                       <span class="confirmRequiredMsg">Confirm Password is required.</span>
                       <span class="textfieldRequiredMsg">Confirm Password is required.</span>
                       <span class="confirmInvalidMsg">Confirm Password values don't match</span> 
                     </span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <script type="text/javascript">
var sprypass1 = new Spry.Widget.ValidationPassword("sprypwd", {minChars:6, maxChars: 12, validateOn:["blur", "change"]});
//Confirm Password
var spryconf1 = new Spry.Widget.ValidationConfirm("sprycpwd", "sprypwd", {minChars:6, maxChars: 12, validateOn:["blur", "change"]});
//-->
</script>
      <!-- /.row -->

      <!-- /.row -->