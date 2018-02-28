      <div class="row">
                    <div class="col-md-12">
          <!-- MAP & BOX PANE -->
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">Approved TEstimonials</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Message</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
               <tbody>
                <?php $requests = getTestimonials();$i=1;
                // $request here is pending_testimonials
                 ?>
                <?php foreach($requests as $request) { ?>
                  <?php if($request['approval'] ){ ?>

                    <tr>
                      <td><?php echo $request['username']; ?></td>
                   
                      
                      <td><?php echo $request['message']; ?></td>
                    
                      <td><?php echo $request['date'] ?></td>
                    
                      <td><?php  echo (!$request['approval'])?  'Pending':'Approved'; ?></td>
                    </tr>

                    
                      <?php  
                    }
                        } ?>
                    </tbody>
                  </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
      <!-- /.row -->
       
    
   