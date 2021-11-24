<?php 
	if (!is_user_logged_in())
     {
         echo "<script>location.href = '" . home_url() . "';</script>";
     }
 ?>
<!DOCTYPE html>
<html lang="bn">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="online admission">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
    
    <link rel="icon" href="https://classtune.com/img/favi.png" type="image/x-icon" />
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300;400;600;700;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/font-awesome.min.css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/bootstrap-datepicker3.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/formValidation.min.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/student-dashboard.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/inc/assets/css/student-dashboard-responsive.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<?php global $wpdb; ?>
	<?php
        $user_id = get_current_user_id();
        $user_table = $wpdb->prefix.'users';
        $user_info = $wpdb->prefix.'user_infos';
        $user_data = $wpdb->get_row( "SELECT user.display_name,user.user_email,user_info.image FROM $user_table AS user
            INNER JOIN $user_info AS user_info  ON user.ID = user_info.user_id
            WHERE user.ID = $user_id" );
     ?>
	<div class="container-fluid dashboard_header_c">
	    <div class="container">
	      <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand dasb_logo" href="">
                  <img src="<?php bloginfo('template_directory'); ?>/image/CT-Logo.png" alt="logo" />
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                      <li class="nav-item">
                        <a class="nav-link" href="<?= home_url() ?>/download-admit">Download document</a>
                      </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                   <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                    <?php if($user_data->image == ""){ ?>
                        <img src="<?php bloginfo('template_directory'); ?>/image/default.png"/> <?= $user_data->display_name ?>
                    <?php }else{ ?>
                        <img src="<?= $user_data->image ?>"/>  <?= $user_data->display_name ?>
                    <?php } ?>
                    
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <!-- <a class="dropdown-item" href="<?php echo home_url() ?>/parent-profile-edit">Edit Profile</a>
                      <a class="dropdown-item" href="<?php echo home_url() ?>/parent-change-password">Change Password</a>
                      <div class="dropdown-divider"></div> -->
                      <a class="dropdown-item" href="<?php echo wp_logout_url(home_url()) ?>">Logout</a>
                    </div>
                  </li>
                </form>
              </div>
            </nav>  
	    </div>
	</div>