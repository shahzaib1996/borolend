<?php

session_start();
if(isset($_SESSION['admin'])) {
  if($_SESSION['admin'] == '@borolend' ) {

  }
  else {
    header('location: ../../alogin.php');
  }
}else {
    header('location: ../../alogin.php');
}

include_once 'connect.php';

$result1 = $con->query("SELECT * FROM lender_individual where verify_status='0'");
$result2 = $con->query("SELECT * FROM lender_individual where verify_status='1'");


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lender Registrations</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
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
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
                  <a href="../../logout.php" class="btn btn-default btn-flat">Sign out</a>
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
        <li class="treeview">
          <a href="../../index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        
        
        
        
        
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Registrations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="lender-registration.php"><i class="fa fa-circle-o"></i> Lenders</a></li>
            <li><a href="borrower-registration.php"><i class="fa fa-circle-o"></i> Borrowers</a></li>
          </ul>
        </li>
        <li class="">
          <a href="loan-requests.php">
            <i class="fa fa-calendar"></i> <span>Loan Request</span>
          </a>
        </li>
        <li>
          <a href="lend-request.php">
            <i class="fa fa-calendar"></i> <span>Lending Request</span>
          </a>
        </li>
                <li>
          <a href="../mailbox/email.php">
            <i class="fa fa-calendar"></i> <span>Send Emails</span>
          </a>
        </li>
        <li>
          <a href="../calendar.html">
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
        LENDER
        <small>REGISTRATION</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Lender Registration</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Pending Registration</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>View Profile</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                if ($result1->num_rows > 0) {
                // output data of each row
                while($row1 = $result1->fetch_assoc()) {
                  echo "<tr>
                  <td>".$row1["type"]."-".$row1["id"]."</td>
                  <td>".$row1["fname"]." ".$row1["lname"]."</td>
                  <td>".$row1["email"]."</td>
                  <td>".$row1["mobile"]."</td>
                  <td><a href='admin-user-profile.php?id=".$row1['id']."&type=".$row1['type']."' class='btn btn-success'>View Profile</a></td>
                  
                </tr>";
                }
                } 

                ?>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>View Profile</th>
                  <th>--</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Approved Registrations</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>--</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                if ($result2->num_rows > 0) {
                // output data of each row
                while($row2 = $result2->fetch_assoc()) {
                  echo "<tr>
                  <td>".$row2["type"]."-".$row2["id"]."</td>
                  <td>".$row2["fname"]." ".$row2["lname"]."</td>
                  <td>".$row2["email"]."</td>
                  <td>".$row2["mobile"]."</td>
                  <td><a href='admin-user-profile.php?id=".$row2['id']."&type=".$row2['type']."' class='btn btn-success'>View Profile</a></td>
                </tr>";
                }
                } 

                ?>

                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>--</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
