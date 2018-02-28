<?php
$sql="SELECT id, username, is_active FROM tbl_users WHERE is_active='True'";
$result = dbQuery($sql);
?>
<div class="row">
                    <div class="col-md-5">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add GH Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <form action="<?php echo WEB_ROOT; ?>donations/process.php?action=addgh" method="post" enctype="multipart/form-data" id="acclogin">
      

      <div class="form-group has-feedback">
        <label>Username</label>
        <select class="form-control mlc-select" id="ghusername" name="ghusername">
          <option value="">---Select Username---</option>
          <?php
          while ($row = dbFetchAssoc($result)) {
          ?>
          <option value="<?php echo $row['id'];?>"><?php echo $row['username'];?></option>
          <?php
          }
          ?>
        </select>
      </div>
     
            <div class="form-group has-feedback">
              <label>Amount</label>
        <input type="text" class="form-control" placeholder="Enter GH Amount Here" name="ghamnt" required autocomplete="off" 
        value="">
      </div>

      <div class="row">

        <div class="col-xs-12">
          <input name="submitButton" type="submit" id="submitButton" style="background-color: #00BDCA; border-color:#00BDCA " value="Submit!" class="btn btn-primary btn-block btn-flat" >
        </div>
      </div>
    </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>