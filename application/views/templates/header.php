<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" id="bootstrap-css" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free-5.6.3-web/css/all.min.css');?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/DataTables/datatables.css');?>"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css');?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-3.3.1/jquery-3.3.1.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/DataTables/datatables.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/moment.js/moment.min.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
    </head>
    <body>
    
      <img src="<?php echo base_url('assets/img/backgrounds/bg.jpg');?>" id="bg-image" />
      <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-primary sticky-top">
        <ul class="navbar-nav mr-auto">
          <!--<li class="nav-item">
            <a href="#menu-toggle" class="btn btn-light-outline nav-link" id="menu-toggle"><span class="fas fa-bars"></span></a>
          </li>-->
          <li class="nav-item">
            <a class="navbar-brand" href="#">Online E-Query System</a>
          </li>
        </ul>
        <div class="nav-item my-2 my-lg-0">
          <a class="navbar-brand" href="#">Butuan City Mission Academy</a>
        </div>
      </nav>
      <div id="wrapper" class="toggled">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
              <li>
                <div class="profile-userpic ">
                  <img class="d-flex align-items-center" src="https://scontent.fceb1-1.fna.fbcdn.net/v/t1.0-9/37058989_2277003782315410_7144235440386605056_n.jpg?_nc_cat=111&_nc_ht=scontent.fceb1-1.fna&oh=9c091a921cdfb63f441e1659dfcf5c47&oe=5CFEB225" class="img-responsive" alt="">
                </div>
              </li>
              <li>
                <div class="d-flex align-items-center "><h6>Welcome, JV Ty!</h6></div>
              </li>
              <li>
                <a <?php if($activePage === "dashboard"):?>class="active"<?php endif;?> href="<?php echo site_url('main')?>">
                  <i class="fas fa-home"></i> Home 
                </a>
              </li>
              <li>
                <a <?php if($activePage === "users"):?>class="active"<?php endif;?> href="<?php echo site_url('users')?>">
                  <i class="fas fa-users"></i> Manage Users  
                </a>
              </li>
              <li>
                <a <?php if($activePage === "students"):?>class="active"<?php endif;?> href="<?php echo site_url('students')?>">
                  <i class="fas fa-user-graduate"></i> Manage Students  
                </a>
              </li>
              <li>
                <a <?php if($activePage === "accounts"):?>class="active"<?php endif;?> href="<?php echo site_url('accounts')?>">
                  <i class="fas fa-briefcase"></i> Accounts
                </a>
              </li>
              <li>
                <a <?php if($activePage === "grades"):?>class="active"<?php endif;?> href="<?php echo site_url('grades')?>">
                  <i class="fas fa-list-ol"></i> Grades
                </a>
              </li>
              <li>
                <a <?php if($activePage === "calendar"):?>class="active"<?php endif;?> href="<?php echo site_url('calendar')?>">
                  <i class="fas fa-calendar"></i> School Calendar
                </a>
              </li>
              <li>
                <a href="<?php echo site_url('login')?>">
                  <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
              </li>
              <li>
          </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container-fluid">
                
              
              
      
