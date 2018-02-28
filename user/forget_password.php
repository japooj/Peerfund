<?php
require_once './library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';


if (isset($_POST['submitButton'])) {
   $result = doReset();

  if ($result != '') {
    $errorMessage = $result;
  }   
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Forget Password</title>
<link rel="stylesheet" href="login.css">
<link href="../css/bootstrapn.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="../css/stylen.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>




</head>    
    <body>
<div class="top-header">
  <div class="container">
    <div class="top-header-main">
      <div class="col-md-8 header-address">
        <ul>
          <li><span class="phone"> </span> <h6>(+233) 0552104641 / 0542572660 / 0508595585</h6></li>
          <li><span class="email"> </span><h6><a href="">support@peerfundgh.com</a></h6></li>
        </ul>
      </div>
      <div class="col-md-4 top-social">
          <ul>
            <li><a style="color: #ffffff" href="https://t.me/joinchat/GQRtAU4fSnWuiyLPu0tdwQ" target="_blank">Join on Telegram</a></li>
          </ul>
      </div>
      
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!--header-top end here-->
<!--header start here-->
  <!-- NAVBAR
    ================================================== -->
<div class="header w3l">
  <div class="fixed-header">  

        <div class="navbar-wrapper">
          <div class="container">
            <nav class="navbar navbar-inverse navbar-static-top">
                 <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <div class="logo">
                         <h1><a class="navbar-brand" href=""><img src="../images/logo.jpg"  alt=""></a></h1>
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                <nav class="cl-effect-16" id="cl-effect-16">
                  <ul class="nav navbar-nav">
                   <li><a  href="../" data-hover="Home">Home</a></li>
                    <li><a   href="../how-it-works" data-hover="How It Works">How It Works</a></li>
                    <li><a  href="../contact" data-hover="Contact">Contact</a></li> 
            <li><a href="../user/login.php" data-hover="Log In">Log In</a></li>
            <li><a href="../user/register.php" data-hover="Register">Register</a></li>            
                  </ul>
                </nav>

                </div>
                <div class="clearfix"> </div>
                 </nav>
              </div>
               <div class="clearfix"> </div>
        </div>
   </div>
</div>
            <!-- Start cSlider -->
  <div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php echo $errorMessage?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        
        
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off" required>
       
      </div>
      <div class="row">
        <div class="col-xs-8">
 
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submitButton" style="background-color: #00BDCA; border-color:#00BDCA ">Reset Password</button>
          <a href="login.php">Back to login</a>
        </div>
        <!-- /.col -->
      </div>
    </form>


  </div>
  <!-- /.login-box-body -->
</div>
       <!--contact end here-->
<!--copy rights start here-->
<div class="copy-rights">
  <div class="container">
    <div class="copy-rights-main">
       <p>© 2018 PeerFund GH. All Rights Reserved</p>

    </div>
  </div>
</div>
<!--copy rights end here-->
     
        <!-- ScrollUp button end -->
      
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="bootstrap/js/bootstrap.min.js"></script> 
<!-- iCheck --> 
<script src="plugins/iCheck/icheck.min.js"></script> 

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf('://')+1)) : '';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : '';
po.src = '//peerfundgh.com/support/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(leaveamessage)/true?r='+referrer+'&l='+location;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
    </body>
</html>