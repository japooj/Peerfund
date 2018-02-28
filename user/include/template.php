<?php
if (!defined('WEB_ROOT')) {
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pageTitle?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>plugins/pace/pace.min.css">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>dist/css/skins/_all-skins.min.css">
  <!-- Font Awesome -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini" onload="set_interval()"
onmousemove="reset_interval()"
onclick="reset_interval()"
onkeypress="reset_interval()"
onscroll="reset_interval()">
<!-- Site wrapper -->
<div class="wrapper">
 <?php 
 include('header.php');
 ?>

 <?php 
 include('menu.php');
 ?>

  <div class="content-wrapper">

    <section class="content">
     <?php
      require_once $content;   
      ?>

    </section>

  </div>


  <footer class="main-footer">
    <strong>Copyright &copy; 2018 PeerFund GH</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<script src="<?php echo WEB_ROOT;?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo WEB_ROOT;?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo WEB_ROOT;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo WEB_ROOT;?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo WEB_ROOT;?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo WEB_ROOT;?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo WEB_ROOT;?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo WEB_ROOT;?>dist/js/demo.js"></script>

<script>
   $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

// Add the following into your HEAD section
var timer = 0;
function set_interval() {
  // the interval 'timer' is set as soon as the page loads
  timer = setInterval("auto_logout()", 1200000);
  // the figure '10000' above indicates how many milliseconds the timer be set to.
  // Eg: to set it to 5 mins, calculate 5min = 5x60 = 300 sec = 300,000 millisec.
  // So set it to 300000
}

function reset_interval() {
  //resets the timer. The timer is reset on each of the below events:
  // 1. mousemove   2. mouseclick   3. key press 4. scroliing
  //first step: clear the existing timer

  if (timer != 0) {
    clearInterval(timer);
    timer = 0;
    // second step: implement the timer again
    timer = setInterval("auto_logout()", 1200000);
    // completed the reset of the timer
  }
}

function auto_logout() {
  // this function will redirect the user to the logout script
  window.location = "<?php echo WEB_ROOT; ?>view/timer.php";
}

// Add the following attributes into your BODY tag

</script>

<script type="text/javascript">
        $(function() {
    startRefresh();
});

function startRefresh() {
    setTimeout(startRefresh,1000);
    $.get('<?php echo WEB_ROOT; ?>view/processor.php', function(data) {
        //$('#content_div_id').html(data);
        //alert('hello');    
    });
}
      </script>

<script type="text/javascript">
const SELECT_RANGE = [
      {MIN:100, MAX:1000},//ADD AOTHER RANGES BY DOING COPY AND PASTE AND CHANGING THE MIN AND MAX VALS

  ];

  function getSelction(){
    //get value from select field
    return parseInt($('select[name=dreamName]').val());
  }

  function getInputValue(){
    //get the value from the input field
    return parseInt($('input[name=dreamAmnt]').val());
  }

  function isInAnyRange(select_index,value){
    var found = false;
    var i =  select_index - 1;//number obtained from select value value should correspond with index of range from SELECT_RANGE
    console.log('Value of select_index', i, 'value of input',value,'range is ',SELECT_RANGE[i]);
    if( (value >= SELECT_RANGE[i].MIN) && ( value <= SELECT_RANGE[i].MAX) ){
      found = true;
      // break;
    }
    return found;
  }

  
function showRangeError(value,input_value){
    if(!value || !isInputValueMultipleCompliant(input_value) ){
      event.preventDefault();//should prevent form submission if error present;
      alert('Sorry! Enter amount in multiples of 100GHC');
      console.log('Value not allowed');
    }
    console.log('value allowed');
  }

 function validateEntry(event){
    var select_value = getSelction();
    var input_value = getInputValue();
    var is_value_allowed = isInAnyRange(select_value,input_value);
    showRangeError(is_value_allowed,input_value);
  }

  function isInputValueMultipleCompliant(value){
    console.log('validating multiple compliancy');
    return ! Boolean( value % 100 ); // modulo of 0 means value is a multiple of hundred and thus negated to true after converting to bool
  }

  $('button[type=submit]').click(function(){
    console.log('Will submit if validation passes');
    validateEntry();
  });
      </script>

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
