 <header class="main-header" style="background-color: #00BDCA; border-color:#00BDCA " >
    <!-- Logo -->
    <a href="" class="logo" style="background-color: #00BDCA; border-color:#00BDCA ">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PFG</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" ><b>
       PeerFund GH
</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-color: #00BDCA; border-color:#00BDCA ">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button" style="background-color: #00BDCA; border-color:#00BDCA ">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 messages</li>
              
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 notifications</li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 0 tasks</li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="">You have been logged in as: [ <?php echo $id = $_SESSION['hlbank_user']['username']; ?> ] </a>
          </li>

        </ul>
      </div>
    </nav>
  </header>