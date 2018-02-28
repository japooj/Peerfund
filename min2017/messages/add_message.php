<?php
  $sql = "SELECT * FROM tbl_messages WHERE user_id='2'";
  $result = dbQuery($sql);


  $sql1 = "SELECT * FROM admin";
  $result1 = dbQuery($sql1);
  $row1 = dbFetchAssoc($result1);
  $id = $row1['admin_id'];
?>
      <div class="row">
      <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">New Message</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo WEB_ROOT;?>messages/process.php?action=add_messages" method="post">
              <input type="hidden" name="id" value="<?php echo $id ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Subject</label>
                  <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Enter Subject">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Message</label>
                  <textarea class="form-control" name="body" placeholder="Enter Message Here"></textarea>
                 
                </div>
            
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send Message</button>
              </div>
            </form>
          </div>
          <!-- /.box -->





        </div>
      </div>
      <!-- /.row -->