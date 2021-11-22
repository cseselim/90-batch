<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

<!-- <div class="slider_section" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/slider_image.jpg')">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="slider_content">
				<h3>Narayanganj ’90</h3>
				<h1>Class Reunion</h1>
			</div>
		</div>
	</div>
</div> -->

<div class="school_slider">
	<div class="owl-carousel owl-theme school_carousel">
        <div class="item">
          <img src="<?php echo get_template_directory_uri(); ?>/image/slider-1.jpg">
           <div class="slider_overlay"></div>
        </div>
        <div class="item">
          <img src="<?php echo get_template_directory_uri(); ?>/image/slider-2.jpg">
            <div class="slider_overlay"></div>
        </div>
        <div class="item">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/slider_image.jpg">
            <div class="slider_overlay"></div>
        </div>
	</div>
	<div class="row slider_content_row">
		<div class="col-md-12 text-center">
			<div class="slider_content">
				<h3>Narayanganj ’90</h3>
				<h1>Class Reunion</h1>
			</div>
		</div>
	</div>
</div><!--slider-area-end-->

<div class="event_section">
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<div class="event_title">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/header-top.png')">
					<h1>When & Where</h1>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<?php
				$args = array( 
					'post_type'   => 'post',
					'cat'=>'3',
					'posts_per_page' => '3',
					'order' => 'DESC',
				);
				$events = new WP_Query( $args );

			?>
			<?php 
 				if ( $events->have_posts() ) :
 					while( $events->have_posts() ) : $events->the_post()
 			 ?>
			<div class="col-md-4 col-sm-4 col-4">
				<div class="event_content" style="padding-bottom: 40px">
					<?php the_post_thumbnail('full'); ?>
					<div class="event_icon">
						<?= get_post_meta(get_the_ID(), 'Events-icon', TRUE); ?>
					</div>
					<h3><?= the_title() ?></h3>
					<div>
						<?= the_content() ?>
					</div>
				</div>
			</div>
		<?php 
			endwhile;
			endif
		  ?>
			<!-- <div class="col-md-4 col-sm-4 col-4">
				<div class="event_content">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/event-2.jpg')">
					<div class="event_icon">
						<i class="fas fa-home"></i>
					</div>
					<h3>Dinner</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint.</p>

					<ul>
						<li><a href="#"><i class="fas fa-link"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i style="padding: 6px 9px;" class="fab fa-facebook-f"></i></a></li>
					</ul>
				</div>
			</div> -->
		</div>
	</div>
</div>

<div class="classment_section" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/class_bg.jpg')">
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
		<div class="row">
			<div class="col-md-6" style="text-align: right;">
				<div class="student_more">
					<a href="<?php echo home_url('register'); ?>">Register Now</a>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="student_more">
					<a href="<?php echo home_url('paid-users'); ?>">View All</a>
				</div>	
			</div>
		</div>
	</div>
</div>


<div class="event_section" style="padding-bottom:70px;">
	<div class="container-fluid">
		<div class="row text-center">
			<div class="col-md-12">
				<div class="event_title">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/header-top.png')">
					<h1>Gallery</h1>
					<p>A class reunion is a meeting of former classmates, typically organized at or near their former school by one or a group of the class members on or around an anniversary of their graduation, e.g. 5 years later.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-3 p-0">
					<?= do_shortcode('[foogallery id="29"]') ?>
			</div>
			<div class="col-3 p-0">
					<?= do_shortcode('[foogallery id="46"]') ?>
			</div>
			<div class="col-3 p-0">
					<?= do_shortcode('[foogallery id="47"]') ?>
			</div>
			<div class="col-3 p-0">
					<?= do_shortcode('[foogallery id="49"]') ?>
			</div>
		</div>
	</div>
</div>

<div class="event_section">
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
		</div>
		<div class="row text-center">
			<div class="col-md-12">
				<div class="student_more">
					<a href="<?php echo home_url('all-memories'); ?>">View All</a>
				</div>	
			</div>
		</div>
	</div>
</div>
</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
