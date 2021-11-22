<?php
    $user_id = get_current_user_id();
    $user_table = $wpdb->prefix.'users';
    $user_info = $wpdb->prefix.'user_infos';
    $user_data = $wpdb->get_row( "SELECT user.display_name,user.user_email,user_info.image FROM $user_table AS user
        INNER JOIN $user_info AS user_info  ON user.ID = user_info.user_id
        WHERE user.ID = $user_id" );
 ?>

<div class="col-lg-3 col-md-3 col-sm-3 col-12">
    <div class="admit-card-area">
        <div class="student_content">
            <h1><?= $user_data->display_name ?></h1>
            <p>online</p>
            <img src="<?= $user_data->image ?>">
            <ul>
            	<li><a href="<?php echo home_url() ?>/parent-profile-edit">Edit profile</a></li>
            	<li><a href="<?php echo home_url() ?>/parent-change-password">Password change</a></li>
            </ul>
        </div>
    </div>
	<div class="admit_menu_area">
        <div class="admit-menu">
            <ul>
                <li class="u_profile"><a href="<?php echo home_url() ?>/applicant-profile"><i class="fas fa-cogs"></i>Applicant Profile</a></li>
                <li class="u_profile"><a href="<?php echo home_url() ?>/apply-other-institute"><i class="fas fa-cogs"></i>Apply now</a></li>
                <li class="u_profile"><a href="<?php echo home_url() ?>/pending-apllication"><i class="fas fa-cogs"></i>Pending Application</a></li>
                <li class="a_download"><a href="<?php echo home_url() ?>/download-admit"><i class="fas fa-cogs"></i>Download Admit Card</a></li>
            </ul>
        </div>
    </div>
</div>