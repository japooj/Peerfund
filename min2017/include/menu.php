 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>index.php/">
            <i class="fa fa-home"></i> <span>Dashboard</span>
          </a>
        </li>
        <div class="inner">
              <?php 

               $sql="SELECT count(*) AS total FROM withdraw_requests WHERE approval='0'";
               $result = dbQuery($sql);
               $row = dbFetchAssoc($result);
               $total = $row['total'];
               
              ?>
            </div>
         <li class="treeview">
          <a href="">
          <i class="fa fa-arrow-down"></i> 
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>Requests <span style="color: red">[<?php echo $total = $row['total']; ?>]</span>
          </a>
          <ul class="treeview-menu">
            <li style="color: #ffffff"><a href="<?php echo WEB_ROOT; ?>requests/?view=pending" style="color: #ffffff"><i class="fa fa-circle-o"></i>Pending Requests</a></li>
    <li style="color: #ffffff"><a href="<?php echo WEB_ROOT; ?>requests/?view=aprroved" style="color: #ffffff"><i class="fa fa-circle-o"></i>Approved Requests</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="">
            <i class="fa fa-money"></i>
            <span style="color: #ffffff">Financials</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
    <li ><a href="<?php echo WEB_ROOT; ?>donations/?view=add_gh" style="color: #ffffff"><i class="fa fa-circle-o"></i>Add GH</a></li>
    <li ><a href="<?php echo WEB_ROOT; ?>donations/?view=view_pending" style="color: #ffffff"><i class="fa fa-circle-o"></i>View PH</a></li>
    <li ><a href="<?php echo WEB_ROOT; ?>donations/?view=view_gh" style="color: #ffffff"><i class="fa fa-circle-o"></i>View GH</a></li>
    <li ><a href="<?php echo WEB_ROOT; ?>donations/?view=match" style="color: #ffffff"><i class="fa fa-circle-o"></i>
    Assign GH to PH</a></li>
          </ul>
        </li>
                <li class="treeview">
          <a href="">
            <i class="fa fa-users"></i>
            <span style="color: #ffffff">Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="<?php echo WEB_ROOT; ?>user/?view=view_blocked_users" style="color: #ffffff"><i class="fa fa-circle-o"></i>Blocked Users</a></li>
              <li><a href="<?php echo WEB_ROOT; ?>user/?view=view_active_users" style="color: #ffffff"><i class="fa fa-circle-o"></i>Active Users</a></li>
            <li><a href="<?php echo WEB_ROOT; ?>user/?view=users" style="color: #ffffff"><i class="fa fa-circle-o"></i>All Users</a></li>
          </ul>
        </li>
<?php
                $sql="SELECT count(*) AS total FROM testimonials WHERE approval=1";
                $result = dbQuery($sql);
                $row = dbFetchAssoc($result);
                extract($row);            
              ?>

                <li class="treeview">
          <a href="">
            <i class="fa fa-comments"></i>
            <span style="color: #ffffff">Testimonials <span style="color: orange">[<?php echo $total = $row['total']; ?>]</span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li style="color: #ffffff"><a href="<?php echo WEB_ROOT; ?>testimonials/?view=testimonials" style="color: #ffffff"><i class="fa fa-circle-o"></i>View Testimonials</a></li>
    
          </ul>
        </li>
             <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>index.php/">
            <i class="fa fa-cog"></i> <span>Change Password</span>
          </a>
        </li> 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>