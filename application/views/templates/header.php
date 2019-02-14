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
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/select2-4.0.5/dist/css/select2.min.css');?>"/>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/jquery-3.3.1/jquery-3.3.1.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/popper.js/popper.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/DataTables/datatables.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/moment.js/moment.min.js');?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/select2-4.0.5/dist/js/select2.min.js');?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    </head>
    <body>
      <img src="<?php echo base_url('assets/img/backgrounds/bg.jpg');?>" id="bg-image" />
      <nav class="navbar navbar-inverse navbar-expand-lg navbar-dark bg-primary sticky-top">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="btn btn-light-outline nav-link" id="menu-toggle" style="<?php 
                    if ($this->session->has_userdata('logged_in')){
                      if (current_url() == site_url('login'))
                      echo 'display: none;';
                    } else {
                      echo 'display: none;';
                    } 
                  ?>"><span class="fas fa-bars"></span></a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="#">Online E-Query System <?php
              if ($this->session->has_userdata('logged_in')){
                echo '- ' . $this->session->type;
              } else {
                echo '';
              } 
            ?></a>
          </li>
        </ul>
        <div class="nav-item my-2 my-lg-0">
          <a class="navbar-brand" href="#">Butuan City Mission Academy</a>
        </div>
      </nav>
      <div id="wrapper" class="<?php 
                    if ($this->session->has_userdata('logged_in')){
                      if (current_url() != site_url('login'))
                      echo 'toggled';
                    } else {
                      echo '';
                    } 
                  ?>">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
            <li>
              <div class="profile-userpic">
                  <div class="profcon">
                    <div id="profile">
                      <img id="pic" class="d-flex align-items-center image" class="img-responsive" alt="" style="opacity:0.2;" src="<?php 
                      if ($this->session->sex == 'Male') {
                        echo base_url('assets/img/profilepictures/avatarM.png');
                      } else {
                        echo base_url('assets/img/profilepictures/avatarF.png');
                      }?>">
                      <div class="overlay" id="profile">
                          <button class="btn img-responsive" data-toggle="modal" data-target="#UploadProfilePictureModal" id="profile">Update</button>
                      </div>
                    </div>
                    <div id="loaderprof">
                      <div class="loaderprof">
                        <div class="loader disable-selection loaderprof" id="loader-4" style="width:200px;">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li>
                <div class="d-flex align-items-center "><h6>Welcome, 
                  <?php 
                    if ($this->session->has_userdata('logged_in')) {
                      if ($this->session->sex == 'Male') {
                        echo 'Mr. ' . $firstname;
                      } else {
                        echo 'Ms. ' . $firstname;
                      }
                    } else {
                      echo 'Guest';
                    } 
                  ?>!</h6></div>
              </li>
              <li id="dashboardLink">
                <a <?php if($activePage === "dashboard"):?>class="active"<?php endif;?> href="<?php echo site_url('main')?>">
                  <i class="fas fa-home"></i> Home 
                </a>
              </li>
              <?php if($type == "Administrator"): ?>
                <li id="usersLink">
                  <a <?php if($activePage === "users"):?>class="active"<?php endif;?> href="<?php echo site_url('users')?>">
                    <i class="fas fa-users"></i> Manage Users  
                  </a>
                </li>
              <?php endif; if($type != "Teacher"):?>
                <li id="accountsLink">
                  <a <?php if($activePage === "accounts"):?>class="active"<?php endif;?> href="<?php echo site_url('accounts')?>">
                    <i class="fas fa-briefcase"></i> Accounts
                  </a>
                </li>
              <?php endif; if($type == "Teacher" || $type == "Administrator"):?>
                <li id="studentsLink">
                  <a <?php if($activePage === "students"):?>class="active"<?php endif;?> href="<?php echo site_url('students')?>">
                    <i class="fas fa-user-graduate"></i> Manage Classes  
                  </a>
                </li>
              <?php endif; if($type != "Treasurer"):?>
              <li id="gradesLink">
                <a <?php if($activePage === "grades"):?>class="active"<?php endif;?> href="<?php echo site_url('grades')?>">
                  <i class="fas fa-list-ol"></i> Grades
                </a>
              </li>
              <?php endif;?>
              <li id="calendarLink">
                <a <?php if($activePage === "calendar"):?>class="active"<?php endif;?> href="<?php echo site_url('calendar')?>">
                  <i class="fas fa-calendar"></i> School Calendar
                </a>
              </li>
              <li>
                <a href=""  data-toggle="modal" data-target="#changePasswordModal" id="changepasswordbtn">
                  <i class="fas fa-key"></i> Change Password
                </a>
              </li>
              <li>
                <a href="<?php echo site_url('logout')?>">
                  <i class="fas fa-sign-out-alt"></i> Log Out
                </a>
              </li>
              <li>
          </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Upload Profile Picture Modal -->
        <div id="UploadProfilePictureModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">  
                <h5 class="modal-title">Update Profile Picture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="" id="profilesubmit" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="uploadPic">Upload Picture</label>
                    <input type="file" class="form-control-file" id="image_file" name="file" size="20">
                  </div>
              </div>
              <div class="modal-footer">
                <label class="error form-label text-success" id="profilestatussuccess"></label>
	              <label class="error form-label text-danger" id="profilestatuserror"></label>
                <input type="submit" class="btn btn-primary" id="submitprofile" value="Upload">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeprofile">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Change Password Modal -->
        <div id="changePasswordModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">  
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form name="changepassword" id="changepassword" action="" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="form-label">Current Password</label>
                  <input type="password" class="form-control" name="currentPassword" id="currentPassword" size="25">
                  <label class="error text-danger" for="currentPassword" id="currentpassword_error">This field is required.</label>
                </div>
                <div class="form-group">
                  <label class="form-label">New Password</label>
                  <input type="password" class="form-control" name="newPassword" id="newPassword" size="25">
                  <label class="error text-danger" for="newPassword" id="newpassword_error">This field is required.</label>
                </div>
                <div class="form-group">
                  <label class="form-label">Retype New Password</label>
                  <input type="password" class="form-control" name="retypePassword" id="retypePassword" size="25">
                  <label class="error text-danger" for="retypePassword" id="retypepassword_error">This field is required.</label>
                </div>
              </div>
              <div class="modal-footer">
                <label class="error form-label text-success" id="changepasswordstatussuccess"></label>
	              <label class="error form-label text-danger" id="changepasswordstatuserror"></label>
                <button type="submit" class="btn btn-primary" id="submitpassword">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <div class="container-fluid">
                
              
              
      
