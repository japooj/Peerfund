<?php 
$id = $_SESSION['hlbank_user']['id'];
$sql="SELECT * FROM tbl_transaction where status='confirmed' and user_id='$id'";
$result = dbQuery($sql);
?>
        <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Testimonials</h3>
            </div>
            <!-- /.box-header -->
                <div class="box-body">
               <?php if(isset($_GET['flash'])) {?>

               <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php if($_GET['flash']){ ?>
                 <i class="icon fa fa-check"></i>Testimonial added successfully!
                  <?php }else{ ?>
                   <i class="icon fa fa-check"></i>Thank you, but it seems you have submitted a testimonial already!
                    <?php } ?>
              </div>
            <?php } ?>
           
            <div class="box-body">
               <p>Write your testimonial</p>
                 <form class="form-horizontal form-label-left" action="add_testimonial.php" method="post">
                 <div class="box-body">
               <div class="form-group">
                  <label for="exampleInputEmail1">Share your Testimonial</label>
                  <textarea class="form-control" name="message" minlength='4' spellcheck='true' required></textarea>

                </div>

                <input type="text" class='hidden' name="user_id" value="<?php echo $_SESSION['hlbank_user']['id']; ?>">
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Send your Testimonial</button>
              </div>
            </form>
             </div>
            </div>

            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>