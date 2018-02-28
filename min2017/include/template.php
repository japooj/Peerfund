<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$self = WEB_ROOT . 'index.php';
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo WEB_ROOT;?>dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="<?php echo WEB_ROOT;?>plugins/pace/pace.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
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


  <footer class="main-footer" >
    <strong>Copyright &copy; 2018 PeerFund GH</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo WEB_ROOT;?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo WEB_ROOT;?>bootstrap/js/bootstrap.min.js"></script>

<script src="<?php echo WEB_ROOT;?>plugins/pace/pace.min.js"></script>


<script src="<?php echo WEB_ROOT;?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo WEB_ROOT;?>plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo WEB_ROOT;?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo WEB_ROOT;?>dist/js/demo.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": false,
      "info": true,
    });

    $("#example2").DataTable({
      "paging": true,
      "lengthChange": false,
      "ordering": false,
      "info": true,
    });
  });
</script>

<script type="text/javascript">
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });
</script>

 <script>
      $(function() {    // Makes sure the code contained doesn't run until
      //     all the DOM elements have loaded

      $('#colorselector').change(function(){
        $('.MobileMoney').hide();
        $('#' + $(this).val()).show();
      });

      $('#my-modal').modal('show');
    });


  </script>
  <script type="text/javascript">
  $(function() {    // Makes sure the code contained doesn't run until
                  //     all the DOM elements have loaded

    $('#default_is').change(function(){
        $('.colors').hide();
        $('#' + $(this).val()).show();
    });

});</script> 

</body>
</html>
