<?php

include_once 'connect.php';
session_start();
if(isset($_SESSION['admin'])) {
  if($_SESSION['admin'] == '@borolend' ) {

  }
  else {
    header('location: alogin.php');
  }
}else {
    header('location: alogin.php');
}


if(isset($_POST['update'])) {
  $u11 = $_POST['f11'];
  $u121 = $_POST['f121'];
  $u122 = $_POST['f122'];
  $u21 = $_POST['f21'];
  $u22 =$_POST['f22'];

  $sql = "UPDATE live_feed SET f11='$u11' , f121='$u121' , f122='$u122' , f21='$u21' , f22='$u22' WHERE id=1";
  if(mysqli_query($con,$sql)) {
    echo "<script>alert('LIVE FEED UPDATED')</script>";
  }
  else {
    echo "<script>alert('ERROR UPDATING LIVE FEED')</script>";
  }
}


if(isset($_POST['updaterisk'])) {
  $u11 = $_POST['min'];
  $u121 = $_POST['low'];
  $u122 = $_POST['med'];
  $u21 = $_POST['high'];
  $u22 =$_POST['vhigh'];

  $sql = "UPDATE live_feed SET f11='$u11' , f121='$u121' , f122='$u122' , f21='$u21' , f22='$u22' WHERE id=2";
  if(mysqli_query($con,$sql)) {
    echo "<script>alert('RISK UPDATED')</script>";
  }
  else {
    echo "<script>alert('ERROR UPDATING RISK')</script>";

  }

}


$e_check = $con->query("SELECT * FROM live_feed where id=1");
$row = $e_check->fetch_object();
$f11 = $row->f11;
$f121 = $row->f121;
$f122 = $row->f122;
$f21 = $row->f21;
$f22 =$row->f22;

$e_check = $con->query("SELECT * FROM live_feed where id=2");
$row1 = $e_check->fetch_object();
$min = $row1->f11;
$low = $row1->f121;
$med = $row1->f122;
$high = $row1->f21;
$vhigh =$row1->f22;

$e_check1 = $con->query("SELECT * FROM lender_individual");
$noli = $e_check1->num_rows;
$e_check2 = $con->query("SELECT * FROM lender_org");
$nolo = $e_check2->num_rows;
$e_check3 = $con->query("SELECT * FROM borrower_individual");
$nobi = $e_check3->num_rows;
$e_check4 = $con->query("SELECT * FROM borrower_business");
$nobb = $e_check4->num_rows;



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BOROLEND | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminstyle.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- <link rel="stylesheet" href="../css/mystyle.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
  .riskbox {
  border: 2px solid #222d32;
  background: #ffffff ;
  border-radius: 5px 5px 5px 5px;
}
 .riskbox .rbinner {
  background: ;
  padding-top: 10px;
  padding-bottom: 10px;
}
.riskbox .btn {
  padding-left: 40px;
  padding-right: 40px;
  margin-top: 35px;
}
.riskbox h5 {
  font-size: 16px;
}
.riskbox input.tf {
  border:1px solid #222d32;
  background: #ecf0f5;
}
  
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>L</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BORO</b>LEND</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Administrator - BOROLEND
                  <small><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        
        
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Registrations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/lender-registration.php"><i class="fa fa-circle-o"></i> Lenders</a></li>
            <li><a href="pages/tables/borrower-registration.php"><i class="fa fa-circle-o"></i> Borrowers</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/tables/loan-requests.php">
            <i class="fa fa-calendar"></i> <span>Loan Request</span>
          </a>
        </li>
        <li>
          <a href="pages/tables/lend-request.php">
            <i class="fa fa-calendar"></i> <span>Lending Request</span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/email.php">
            <i class="fa fa-calendar"></i> <span>Send Emails</span>
          </a>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
          </a>
        </li>
        
        
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $noli;?></h3>

              <p>Individual Lenders</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $nolo;?></h3>

              <p>Organization Lender</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $nobi;?></h3>

              <p>Indivisual Borrower</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $nobb;?></h3>

              <p>Organization Borrower</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          
            <div class="homebox1 col-lg-8 col-md-8 col-sm-10 col-xs-12">
                <div class="homebox1-inner">
                      <table class="table hometable">
                        <thead>
                            <tr>
                                <th style="opacity:0.5;">Live Feed</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                          <form action="" method="post">
                            <tr> 
                                <td style="float:left;"><input type="text" class="form-control" value="<?php echo $f11; ?>" name="f11" style="width:50%;" required><span class="s1"> % &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span class="s2" >Rs 68.5 </span> <span style="font-size:16px;">Lacs</span> <br/>
                                    Loan amount approved<br/>
                                </td>
                                <td><span class="s1"> <input type="text" class="form-control" value="<?php echo $f121; ?>" name="f121" style="width:50%;" required> %&nbsp;&nbsp;</span><span class="s3"> <input type="text" class="form-control" value="<?php echo $f122; ?>" name="f122" style="width:50%;" required>% &nbsp;<i class="fa fa-sort-asc"></i></span> <br/>
                                    Average interest rate<br/>
                                </td>
                            </tr>
                            <tr>
                                <td><span class="s1"> <input type="text" class="form-control" value="<?php echo $f21; ?>" name="f21" style="width:50%;" required>% &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span style="font-size:16px;">268 requests</span> <br/>
                                    Loan requests received<br/>
                                </td>
                                <td><span class="s1"><input type="text" class="form-control" value="<?php echo $f22; ?>" name="f22" style="width:50%;" required>% &nbsp;<i class="fa fa-sort-desc ipab1"></i> </span><br/>
                                    <span style="font-size:16px;">932 Offers</span> <br/>
                                    Investment Proposals<br/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tabbottom-line"><input type="submit" class="btn btn-success" name="update" value="UPDATE LIVE FEED"> </td>
                            </tr>
                          </form>
                        </tbody>
                    </table>
                    
                </div>
            </div>


          <!-- /.nav-tabs-custom -->

          <!-- Chat box -->
          
          <!-- /.box (chat box) -->

          <!-- TO DO List -->
          
          <!-- /.box -->

          <!-- quick email widget -->
          <div class="riskbox col-md-12">
            <div class="rbinner col-md-2">
              <form method="post">
              <h5>MINIMAL RISK</h5>
              <input type="text" class="form-control tf" value="<?php echo $min;?>" name="min">
            </div>
            <div class="rbinner col-md-2">
              <h5>LOW RISK</h5>
              <input type="text" class="form-control tf" value="<?php echo $low;?>" name="low">
            </div>
            <div class="rbinner col-md-2">
              <h5>MEDIUM RISK</h5>
              <input type="text" class="form-control tf" value="<?php echo $med;?>" name="med">
            </div>
            <div class="rbinner col-md-2">
              <h5>HIGH RISK</h5>
              <input type="text" class="form-control tf" value="<?php echo $high;?>" name="high">
            </div>
            <div class="rbinner col-md-2">
              <h5>VERY HIGH RISK</h5>
              <input type="text" class="form-control tf" value="<?php echo $vhigh;?>" name="vhigh">
            </div>
            <div class="rbinner col-md-2">
              <center><input type="submit" value="UPDATE" class="btn btn-success" name="updaterisk"></center>
            </div> </form>
          </div>
          

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <!-- Section -->
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b> All rights
    reserved.</b>
    </div>
    <strong>Copyright &copy; 2018 <a href="">EAGLE</a></strong>
  </footer>


  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
