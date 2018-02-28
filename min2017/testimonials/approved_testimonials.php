<div class="col-md-12">
<div class="box-header with-border">
          <h3 class="box-title">Testimonials</h3>
        </div>
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_2" data-toggle="tab">Approved Testimonials</a></li>
            </ul>
            <div class="tab-content">
<h3 class="box-title">Testimonials</h3>
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
                <div class="row">
                <div class="box-body">
                <p>All approved testimonials from users </p>
                <div class="table-responsive">
                <div class="box-body">
              <!-- /.table-responsive -->
            </div>
            <table class="table">
              <tbody>
                <?php $requests = getTestimonials();$i=1;
                // $request here is pending_testimonials
                 ?>
                <?php foreach($requests as $request) { ?>
                  <?php if($request['approval'] ){ ?>

                    <tr>
                      <td></span>Full Name</td>
                      <td><?php echo $request['fullname']; ?></td>
                    </tr>
                    <tr>
                      <td>User(s) Level</td>
                      <td><?php echo $request['level']; ?></td>
                    </tr>
                    <tr>
                      <td>Testimonial</td>
                      <td><?php echo $request['message']; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?php echo $request['email'] ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><?php  echo (!$request['approval'])?  'Pending':'Approved'; ?></td>
                    </tr>
                    
                      <?php  
                    }
                        } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>


          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
    </div>

        <script type="text/javascript">


          function approveDownline(id,target_level,fullname,approval){

            if(approval == 'approved'){
              alert('Action not allowed');
              return;
            }
            var confirmation = confirm(`Click ok to confirm upgrade for ${fullname}`);

            if(confirmation){

              //issue upgrade http request

              var data ={
                id: id,
                target_level: target_level,
              };

              $.post('perform_upgrade.php',data).then((response)=>{
                if(response)
                window.location = window.location;
                console.log(reponse);
              },(err)=>{
                console.log(err);
              })
            }
          }
        </script>
