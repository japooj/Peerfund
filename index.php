<!DOCTYPE HTML>
<html>
<head>
<title>PeerFund GH | Home</title>
<link href="css/bootstrapn.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/stylen.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<!--google fonts-->

</head>
<body>
<!--header-top start here-->
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
			    	<li><a style="color: #ffffff" href="https://t.me/joinchat/GQRtAU4fSnWuiyLPu0tdwQ" target="_blank">Join us on Telegram</a></li>
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
			                   <h1><a class="navbar-brand" href=""><img src="images/logo.jpg"  alt="" height="40" width=""></a></h1>
			              </div>
			          </div>
		            <div id="navbar" class="navbar-collapse collapse">
		            <nav class="cl-effect-16" id="cl-effect-16">
		              <ul class="nav navbar-nav">
		               <li><a  class="active"  href="" data-hover="Home">Home</a></li>
		                <li><a  href="how-it-works" data-hover="How It Works">How It Works</a></li>
		                <li><a href="contact" data-hover="Contact">Contact</a></li>	
						<li><a href="user/login.php" data-hover="Log In">Log In</a></li>
						<li><a href="user/register.php" data-hover="Register">Register</a></li>						
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
<!--header end here-->
<!--banner  start hwew-->
<div class="banner">
	<div class="container">
		<div class="banner-main">
			<h4>PEERFUND GH</h4>
			<h2>100% Interest<i class="fa fa-money"></i> On Your Pledges</h2>		
			<span class="ban-line"> </span>	
			<p>A financial global community of the same aim to bring financial support between themselves.</p>
		    <a href="user/register.php">Join Now!</a>
		</div>
    </div>
</div>
<!--BANNER END HERE-->
<!--welcome strat here-->
<div class="welcome" style="text-align: center;">
	<div class="container we-choose-rit">
		<h3>Welcome To PeerFund GH</h3>
			 	<p>PeerFund GH is a community of selfless people who are helping each other financially.
 "Give and it shall be given unto you in 2 folds (100% ROI)".<br>
we are here to make your dream come true.You do not need to refer people before you will earn. Join us today and rejoice tomorrow.</p>	
	</div>
</div>
<?php
require_once './user/library/config.php';
require_once './user/library/functions.php';

$sql = "SELECT u.username, ts.message FROM tbl_users u, testimonials ts WHERE u.id = ts.user_id AND ts.approval='1'";
$result = dbQuery($sql);
?>
<div class="welcome" style="text-align: center;">
	<div class="container we-choose-rit">
		<h3>Testimonials</h3>
			<?php 
			  if ($appStatus = 1) {
			?>
		    
		    	<?php
while ($row = dbFetchAssoc($result)) {
	$name = $row['username'];
	$message = $row['message'];
	$appStatus = $row['approval'];
	?>
	<marquee>
<div class="view view-first" style="color: #000; text-align: center;"> 
<p style="color: #000">[Message:] <?php echo $message ?></p>
<h5>[Username]: <?php echo $name ?></h5>
</div>
</marquee>
	<?php
}
		    	?>

			<?php
			}else{
			?>
		    <marquee><p>There are no testimonials at the moment</p></marquee>
			<?php
			}
			?>
	</div>
</div>

<div class="news">
	<div class="container">
		<div class="news-main">
			<div class="col-md-12 we-choose-rit">
				<h3>Frequently Asked Questions</h3>
			           <div class="menu_vertical">
				         	 	<section class="accordation_menu">
								  <div>
								    <input id="label-1" name="lida" type="radio" checked/>
								   <label for="label-1" id="item1"><i class="ferme"> </i><span class="m_5">Who can join PeerFund</span><i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
								    <div class="content1" id="a1">
				  			   	 		<p>Anyone 18 years upwards with as little as GHC100 minimum extra cash is welcome to join.</p>
								    </div>
								  </div>
								  <div>
								    <input id="label-2" name="lida" type="radio"/>
								    <label for="label-2" id="item2"><i class="icon-leaf" id="i2"></i>How to provide help(PH)?<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
								    <div class="content1" id="a2">
					  			   	 	<p>Once you signed in, on your dashboard click on "Provide Help"</p>     
								    </div>
								  </div>
								  <div>
								    <input id="label-3" name="lida" type="radio"/>
								    <label for="label-3" id="item3"><i class="icon-trophy" id="i3"></i>How to get help(GH)?<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
								    <div class="content1" id="a3">
						  			   	 	<p>Once you have provided help, wait for the 7th day and request payment.</p>
								    </div>
								  </div>
								   <div>
								    <input id="label-4" name="lida" type="radio"/>
								    <label for="label-4" id="item4"><i class="icon-trophy" id="i4"></i>How to get in touch with support<i class="icon-plus-sign i-right1"></i><i class="icon-minus-sign i-right2"></i></label>
								    <div class="content1" id="a4">
						  			   	<p>Support team can be accessed via the Support page.</p>
								    </div>
								  </div>
								 </section>
                      </div>
			</div>
		</div>
	</div>
</div>
<!--why we choose end here-->
<!--copy rights start here-->
<div class="copy-rights">
	<div class="container">
		<div class="copy-rights-main">
			 <p>© 2018 PeerFund GH. All Rights Reserved</p>

		</div>
	</div>
</div>
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

      	 
