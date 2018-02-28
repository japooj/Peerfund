<?php
  $sql = "SELECT * FROM tbl_users u, tbl_address ad WHERE u.id = ad.user_id";
  $result = dbQuery($sql);

?>
      <div class="row">
                    <div class="col-md-5">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add New User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
    <form action="processUser.php?action=add_new" method="post" enctype="multipart/form-data" id="acclogin">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['username']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Mobile Number" name="phone" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['phone']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email" name="email" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['email']);}?>">
      </div>
      <div class="form-group has-feedback">
        <select class="form-control mlc-select" id="country_is" name="country_is">
          <option selected = "selected" disabled = "disabled" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['country_is']);}?>">---Select Country---</option>
          <option value="GH">Ghana</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control mlc-select" id="default_is" name="default_is">
          <option selected = "selected" disabled = "disabled" value="">Select Payment Type</option>
          <option id="blue" value="MobileMoney">Use Mobile Money</option>
        </select>
        <div id="MobileMoney" class="colors" style="display:none"> <br>
          <div class="form-group">
            <input id="number" type="text" name="mmname" class="form-control" maxlength="16" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['mmname']);}?>" placeholder="Enter Mobile Money Name" autocomplete="off">
          </div>
           <div class="form-group">
            <input id="number" type="text" name="mmnumber" class="form-control" maxlength="16" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['mmnumber']);}?>" placeholder="Enter Mobile Money Number" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="form-group has-feedback"> 
        <input type="password" class="form-control" placeholder="Password" name="pass" required autocomplete="off">
 </div>
      <div class="form-group has-feedback"> 
        <input type="password" class="form-control" placeholder="Retype Password" name="password" required autocomplete="off">
       </div>
    <!-- referral_by input -->
            <!-- referral_by input -->
          <div class="form-group has-feedback">
            <div class="">
              <?php if(isset($_GET['ref_err']) && $_GET['ref_err']){ ?>
                <div class="alert alert-dang">
                  <p>Sponsor name does not exit</p>
                </div>
              <?php }
              printf('<input class="form-control" type="text" placeholder="Enter sponsor name" name="referral_by" value="%s" required>',$_GET['ref']);
              ?>
            </div>
          </div>
          <!-- end referral_by -->
      <div class="row">
         
        <div class="col-xs-12">
          <input name="submitButton" type="submit" id="submitButton" value="Submit" class="btn btn-primary btn-block btn-flat" >
        </div>
      </div>
    </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->