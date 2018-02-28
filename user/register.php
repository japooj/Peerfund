<?php
require_once './library/config.php';
require_once './library/functions.php';

$errorMessage = '&nbsp;';

if (isset($_POST['submitButton'])) {
    $result = doRegister();
    if ($result != '') {
        $errorMessage = $result;
    }
}

?>
<!DOCTYPE HTML>
<html>
<head>
<title>PeerFund GH</title>
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
<!--google fonts-->
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>



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
                    <li><a href="../how-it-works" data-hover="How It Works">How It Works</a></li>
                    <li><a  href="../contact" data-hover="Contact">Contact</a></li> 
            <li><a href="../user/login.php" data-hover="Log In">Log In</a></li>
            <li><a class="active" href="../user/register.php" data-hover="Register">Register</a></li>            
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
        <!-- Start home section -->
       
            <!-- Start cSlider -->
  <div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
     <?php echo $errorMessage?>
<form action="" method="post" enctype="multipart/form-data" id="acclogin">
  <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter First Name" name="fname" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['fname']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Last Name" name="lname" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['lname']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Username" name="username" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['username']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['phone']);}?>">
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Enter Email" name="email" required autocomplete="off" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['email']);}?>">
      </div>
      <div class="form-group has-feedback">
        <select class="form-control mlc-select" id="country_is" name="country_is">
          <option selected = "selected" disabled = "disabled" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['country_is']);}?>">---Select Country---</option>
          <option value="GH">Ghana</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control mlc-select" id="default_is" name="default_is" required>
          <option selected = "selected" disabled = "disabled" value="">Select Payment Type</option>
          <option id="blue" value="MobileMoney">Mobile Money</option>
        </select>
        <div id="MobileMoney" class="colors" style="display:none"> <br>
          <div class="form-group">
            <input id="number" type="text" name="mmname" class="form-control" maxlength="16" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['mmname']);}?>" placeholder="Enter Mobile Money Account Name" autocomplete="off" required>
          </div>
           <div class="form-group">
            <input id="number" type="text" name="mmnumber" class="form-control" maxlength="16" value="<?php if( isset($_GET['ref_err']) && $_GET['ref_err']){ print( $_GET['mmnumber']);}?>" placeholder="Enter Mobile Money Account Number" autocomplete="off" required>
          </div>
        </div>
      </div>
      <div class="form-group has-feedback"> 
        <input type="password" class="form-control" placeholder="EnterPassword" name="pass" required autocomplete="off" required>
 </div>
      <div class="form-group has-feedback"> 
        <input type="password" class="form-control" placeholder="Retype Password" name="password" required autocomplete="off" required>
       </div>
    <!-- referral_by input -->
            <!-- referral_by input -->
          <div class="form-group has-feedback">
            <div class="">
              <?php if(isset($_GET['ref_err']) && $_GET['ref_err']){ ?>
                <div class="alert alert-dang">
                  <p><p style="color: red">Sorry! Referral name does not exit.</p></p>
                </div>
              <?php }
              printf('<input class="form-control" type="text" placeholder="Enter referral name" name="referral_by" value="%s">',$_GET['ref']);
              ?>
            </div>
          </div>
          <!-- end referral_by -->
      <div class="row">
         <div class="col-xs-12">
              <div class="checkbox icheck" style="padding-left: 16px;">
                <label>
                  <input name="agree" type="checkbox" value="yes" id="agree" class="squaredFour" required value="">Having read the <span style="text-decoration: underline; color: red"><em>warning</em></span>, i am well aware fully of risks. Being in sound mind, i have decided to become a member of Peer Fund GH
                </label>
              </div>
            </div>
        <div class="col-xs-12">
          <input name="submitButton" type="submit" id="submitButton" style="background-color: #00BDCA; border-color:#00BDCA " value="Join Now!" class="btn btn-primary btn-block btn-flat" >
        </div>
      </div>
    </form>
    <br>
Have an account? <a href="login.php" class="text-center">Login to your Account! </a> 
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

<script type="text/javascript">
  $(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#default_is').change(function(){
        $('.colors').hide();
        $('#' + $(this).val()).show();
    });

});</script> 

<script>
      $(function() {    // Makes sure the code contained doesn't run until
      //     all the DOM elements have loaded

      $('#colorselector').change(function(){
        $('.MobileMoney').hide();
        $('#' + $(this).val()).show();
      });

      $('#my-modal').modal('show');
    });

    var but=$('#submitButton');
    but.attr('disabled','disabled');
    $('#agree').change(function(e){
      if(this.checked)
      {
        but.removeAttr('disabled');
      }
      else
      {
        but.attr('disabled','disabled')
      }
    });
  </script>
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