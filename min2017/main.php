
 <div class="row">

        <div class="col-lg-3">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                $sql="SELECT count(*) AS totalUsr FROM tbl_users WHERE is_active='True'";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);  

                $sql="SELECT count(*) AS totalBlc FROM tbl_users WHERE is_active='False'";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);           
              ?>
              <h3><?php echo $totalUsr?> / <?php echo $totalBlc?></h3>

              <p>Acive / Block Users</p>
            </div>
   
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3">
          <!-- small box -->
              <?php
                $sql="SELECT count(*) AS total FROM tbl_transaction WHERE status='pending'";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);            
              ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3 class="blink_me"><?php echo $total?></h3>
              <p>Total PH</p>
            </div>

           
          </div>
        </div>
        <!-- ./col -->
       <div class="col-lg-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 

               $sql="SELECT count(*) AS total FROM tbl_transaction WHERE status='paid'";
               $result = dbQuery($sql);
               $row = dbFetchAssoc($result);
               $total = $row['SUM(donation_amount)'];
               if ($total <= 0) {
                      $total = '0';
                    }else{
                       $total = $row['SUM(donation_amount)'];
                    }
              ?>
              <h3><?php echo $total?></h3>

              <p>Total GH</p>
            </div>

           
          </div>
        </div>
               <div class="col-lg-3">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 

               $sql="SELECT count(*) AS total FROM withdraw_requests WHERE approval='0'";
               $result = dbQuery($sql);
               $row = dbFetchAssoc($result);
               $total = $row['total'];
               
              ?>
              <h3><?php echo $total?></h3>

              <p>Withdrawal Request (s)</p>
            </div>

           
          </div>
        </div>
      </div>

 <div class="row">
       <div class="col-lg-3">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <?php 

               $sql="select SUM(dream_amount) from tbl_transaction where status ='pending' and period=1";
               $result = dbQuery($sql);
               $row = dbFetchAssoc($result);
               $total = $row['SUM(dream_amount)'];
               
              ?>
              <h3><?php echo $total?></h3>

              <p>PH Amount [GHC]</p>
            </div>
   
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3">
          <!-- small box -->
          <?php
               $sql="SELECT count(*) AS total FROM tbl_users WHERE is_active='False'";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);           
              ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3 class="blink_me"><?php echo $total?></h3>
              <p>Block Users</p>
            </div>

           
          </div>
        </div>
        <!-- ./col -->
<div class="col-lg-3">
          <!-- small box -->
          <?php
                $sql="SELECT count(*) AS total FROM testimonials WHERE approval=1";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);            
              ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3 class="blink_me"><?php echo $total?></h3>
              <p>Testimonials</p>
            </div>

           
          </div>
        </div>
      </div>
      <?php
  $sql = "SELECT u.id as usrid, a.user_id as aid, u.username as uusr, u.phone as uphone, a.donation_amount as adamnt, a.dream_amount as addamnt, a.date as dt, a.status as stst FROM tbl_users u, tbl_transaction a WHERE u.id=a.user_id AND a.status='Pending Order'";
  $result = dbQuery($sql);
?>
      <div class="row">
                    <div class="col-md-6">
          <!-- MAP & BOX PANE -->
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Members</h3>

              
            </div>
            <!-- /.box-header -->
            <?php
            $phstmt = $sql="SELECT * FROM tbl_users LIMIT 5";
            $phresult = dbQuery($phstmt);
            ?>
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>

                  <tr>
                    <th>Username</th>
                    <th>Time stamp</th>

                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                  while ($phrow = dbFetchAssoc($phresult)) {
                  ?>
                  <tr>
                    <td><span class="label label-success"><?php echo $phrow['username']?></span></td>
                    <td><?php echo $phrow['bdate']?></td>
                   
                  </tr>
               <?php
                }
               ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            
            <!-- /.box-footer -->
          </div>
        </div>
          <div class="col-md-6">

          <!-- MAP & BOX PANE -->
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Testimonials</h3>

            </div>
            <!-- /.box-header -->
            <table class="table">

              <tbody>
                <?php $requests = getTestimonials();$i=1;
                // $request here is pending_testimonials
                 ?>
                <?php foreach($requests as $request) {?>
                  <?php if(!$request['approval'] ){ ?>
                    <tr>
                      <td>Full Name</td>
                      <td><?php echo $request['username']; ?></td>
                    </tr>
                    <tr>
                      <td>Date</td>
                      <td><?php echo $request['date']; ?></td>
                    </tr>
                    <tr>
                      <td>Testimonial</td>
                      <td><?php echo $request['message']; ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><?php  echo (!$request['approval'])?  'Pending':'Approved'; ?></td>
                    </tr>
                    <tr><td colspan="2">

                    <button  class="btn btn-sm btn-danger btn-flat" onclick="declineTestimonial(<?php echo $request['t_id'];?>)"><i>Decline</i></button> 

                    <button  class="btn btn-sm btn-info btn-flat" onclick="approveTestimonial(<?php echo $request['t_id'];?>)"><i>Approve</i></button>

                    </td> </tr>
<?php  }
                    }?>
                     
                    </tbody>

                  </table>


            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
        </div>
      </div>
      <!-- /.row -->
      <script type="text/javascript">

        function declineTestimonial(id){


            var declineConfirmation = confirm(`Click ok to decline approval`);

            if(declineConfirmation){
              
              var data ={
                id: id,
              };

              $.post('<?php echo WEB_ROOT; ?>testimonials/?view=decline_testimonial',data).then((response)=>{
                if(response)
                window.location = window.location;
                console.log(reponse);
              },(err)=>{
                console.log(err);
              })
            }
          }

          function approveTestimonial(id){


            var confirmation = confirm(`Click ok to confirm approval`);

            if(confirmation){

              var data ={
                id: id,
              };

              $.post('<?php echo WEB_ROOT; ?>testimonials/?view=approve_testimonial',data).then((response)=>{
                if(response)
                window.location = window.location;
                console.log(reponse);
              },(err)=>{
                console.log(err);
              })
            }
          }
        </script>
       