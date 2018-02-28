<link href="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.js" type="text/javascript"></script>
<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>
<link href="<?php echo WEB_ROOT; ?>library/spry/confirmvalidation/SpryValidationConfirm.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/confirmvalidation/SpryValidationConfirm.js" type="text/javascript"></script>

    <section class="content-header">
      <h1>
        User Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>view/index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Pages</li>
        <li class="active">User Profile</li>
      </ol>
    </section>
    <br>
        <div class="row">
        <div class="col-md-12">
       <div class="row">
        <div class="col-md-6">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                  <form class="form-horizontal" action="<?php echo WEB_ROOT; ?>account/process.php?action=changepwd" method="post">
                  <input type="text" name="id" value="<?php echo $_SESSION['hlbank_user']['admin_id'];?>"/>
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
                      <button type="submit" class="btn btn-danger">Save Changes</button>
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