<?php include './config/config.php'; ?>
<?php include './libraries/Database.php'; ?>
<?php include './helpers/format_helper.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MSM MACHINE</title>

  <link rel="icon" type="image/ico" href="favicon.ico" /> 
  <link rel="shortcut icon" type="image/ico" href="favicon.ico" /> 
  

  <!-- Bootstrap core CSS-->
  <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="./css/sb-admin.css" rel="stylesheet">


  <link  href="./css/datepicker.css" rel="stylesheet">
  <link  href="./css/main.css" rel="stylesheet">

 <!-- Bootstrap core JavaScript-->
 
 


 


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">


        <!-- Navigation-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="profile.php">MSM MACHINE</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" >
          <a class="nav-link" href="profile.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
   
		
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">

          </div>
          <!-- /Card Columns-->
        </div>

      <!-- Example DataTables Card-->
      
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-wrench"></i> Work Orders</div>
        <div class="card-body">
          <div class="table-responsive">
 
        <div class="col-sm-12 blog-main">
			<?php if(isset($_GET['msg'])) : ?>
				<div class="alert alert-success"><?php echo htmlentities($_GET['msg']); ?></div>
			<?php endif; ?>



