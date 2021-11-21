<?php 
	/*Template Name: Payment user*/
	get_header();
 ?>

<div class="classment_section" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/class_bg.jpg');padding-top: 125px;">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<div class="event_title">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/header-top.png')">
					<h1>Classmates</h1>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
			</div>
		</div>
		<div class="row text-center">

			<?php
				global $wpdb;
				$user_table = $wpdb->prefix.'users';
		        $user_info = $wpdb->prefix.'user_infos';
		        $user_data = $wpdb->get_results( "SELECT user.display_name,user.user_email,user_info.image FROM $user_table AS user
		            INNER JOIN $user_info AS user_info  ON user.ID = user_info.user_id
		            " );
		     foreach ($user_data as  $value) {
			?>

			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?= $value->image ?>"/>
					<div class="student_name">
						<h3><?= $value->display_name ?></h3>
						<!-- <p>Smith</p> -->
					</div>
				</div>
			</div><!---end-->
		<?php } ?>
			<!-- <div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/2.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div> --><!---end -->
		</div>
	</div>
</div>

 <?php

 get_footer()

 ?>