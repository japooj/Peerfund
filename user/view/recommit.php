<div class="row">
        <section class="content-header">
      <h1>
        Recommit Help
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo WEB_ROOT; ?>view/index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Pages</li>
        <li class="active"><?php echo $pageTitle ?></li>
      </ol>
    </section><br>
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Recommitment</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <form class="form-horizontal" action="<?php echo WEB_ROOT;?>view/process.php?action=recommitment" method="post">
              <input type="hidden" name="id" value="<?php echo $_SESSION['hlbank_user']['id'];?>" />
                  <div class="form-group">
                    <div class="col-sm-10">
                     <select class="form-control" name="dreamName" required>
                       <option value="" selected = "selected" disabled = "disabled">---Select A Package---</option>
                       <option value="1" class="p1">Package: 100-1000 (0-7days) 100%</option>
                     </select>
                    </div>
                  </div>
              <div class="form-group">
                    <div class="col-sm-10">
                     <input type="text" class="form-control" size="40" name="dreamAmnt" min="5" max="10" 
                     placeholder="Enter amount here" required />
     
                    </div>
                  </div>
                  <div class="box-footer">
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
                </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>

      