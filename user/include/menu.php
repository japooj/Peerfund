 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" >
        <div class="user-panel" >
        <div class="pull-left image">
          <img src="<?php echo WEB_ROOT; ?>dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SERVER['REMOTE_ADDR']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
        <li class="header">MAIN MENU</li>
        <li class="treeview" id="dashboardload">
          <a href="<?php echo WEB_ROOT; ?>view/">
            <i class="fa fa-home"></i> <span style="color: #ffffff">Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>view/?v=view_donate">
            <i class="fa fa-money"></i> <span style="color: #ffffff">Provide Help</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>view/?v=view_history"><i class="fa fa-folder"></i>History</a>
        </li>
       
        <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>view/?v=view_referrals"><i class="fa fa-users"></i>Referral(s)</a>
        </li>   

         <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>view/?v=view_profile">
            <i class="fa fa-cog"></i>
            <span style="color: #ffffff">My Profile</span>
          </a>
        </li>
        <li class="treeview">
          <a href="https://t.me/joinchat/GQRtAU4fSnWuiyLPu0tdwQ" target="_blank"><i class="fa fa-comments"></i>Telegram</a>
        </li>
        <li class="treeview">
          <a href="<?php echo WEB_ROOT; ?>?logout">
            <i class="fa fa-key"></i>
            <span style="color: #ffffff">Logout</span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>