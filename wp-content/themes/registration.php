
 <?php 
	/*Template Name: registration*/
	get_header();
 ?>

<div class="event_section" style="padding-top: 150px">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<div class="event_title">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/header-top.png')">
					<h1>Memories</h1>
					<p style="margin-bottom: 27px;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary add_memories" data-toggle="modal" data-target="#exampleModal">
					  Add Memories
					</button>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
				global $wpdb;
		        $memories = $wpdb->get_results(' 
		        SELECT stu_profile.id,stu_profile.name,stu_profile.school_name,stu_profile.m_text,stu_profile.image
		        FROM '. $wpdb->prefix.'memories AS stu_profile
		        WHERE stu_profile.status=1');
		        foreach ($memories as  $value) {
			?>
			<div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> <?= $value->m_text ?>
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<!-- <img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')"> -->
							<img class="card_img" src="<?= $value->image ?>">
						</div>
						<div class="col-md-9 col-sm-9 col-9 my-auto">
							<h4><?= $value->name ?></h4>
							<p class="school_name"><?= $value->school_name ?></p>
						</div>
					</div>
				</div>
			</div><!---end-->
			<?php } ?>
			<!-- <div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> Run it up the flagpole turd polishing powerPointless, so pixel pushing, so organic growth. We need to dialog around your choice of work attire.
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')">
						</div>
						<div class="col-md-9 col-sm-9 col-9 my-auto">
							<h4>June ’89</h4>
							<p class="school_name">Last school day</p>
						</div>
					</div>
				</div>
			</div> --><!---end-->

			<?= do_shortcode('[wpmp_register_form]') ?>
		</div>
	</div>
</div>

 <?php

 get_footer()

 ?>