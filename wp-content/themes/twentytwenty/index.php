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

<div class="slider_section" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/slider_image.jpg')">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="slider_content">
				<h3>Narayanganj ’90</h3>
				<h1>Class Reunion</h1>
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
					<h1>When & Where</h1>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
				</div>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-md-4 col-sm-4 col-4">
				<div class="event_content">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/event-1.jpg')">
					<div class="event_icon">
						<i class="fas fa-home"></i>
					</div>
					<h3>School visit</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint.</p>

					<ul>
						<li><a href="#"><i class="fas fa-link"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i style="padding: 6px 9px;" class="fab fa-facebook-f"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-4">
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
			</div>
			<div class="col-md-4 col-sm-4 col-4">
				<div class="event_content">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/event-3.jpg')">
					<div class="event_icon">
						<i class="fas fa-home"></i>
					</div>
					<h3>Party</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.</p>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint.</p>

					<ul>
						<li><a href="#"><i class="fas fa-link"></i></a></li>
						<li><a href="#"><i class="fab fa-twitter"></i></a></li>
						<li><a href="#"><i style="padding: 6px 9px;" class="fab fa-facebook-f"></i></a></li>
					</ul>
				</div>
			</div>
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
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/1.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/2.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/3.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/4.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/5.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/6.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/7.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
			<div class="col-2 text-center mb-3">
				<div class="student_photo">
					<img src="<?php bloginfo('template_directory'); ?>/assets/images/1.jpg')"/>
					<div class="student_name">
						<h3>John</h3>
						<p>Smith</p>
					</div>
				</div>
			</div><!---end-->
		</div>
		<div class="row">
			<div class="col-md-6" style="text-align: right;">
				<div class="student_more">
					<a href="">Register Now</a>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="student_more">
					<a href="">View All</a>
				</div>	
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
			<div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> Run it up the flagpole turd polishing powerPointless, so pixel pushing, so organic growth. We need to dialog around your choice of work attire.
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')">
						</div>
						<div class="col-md-9 col-sm-9 col-9 card_col_two">
							<h4>June ’89</h4>
							<p class="school_name">Last school day</p>
						</div>
					</div>
				</div>
			</div><!---end-->
			<div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> Run it up the flagpole turd polishing powerPointless, so pixel pushing, so organic growth. We need to dialog around your choice of work attire.
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')">
						</div>
						<div class="col-md-9 col-sm-9 col-9 card_col_two">
							<h4>June ’89</h4>
							<p class="school_name">Last school day</p>
						</div>
					</div>
				</div>
			</div><!---end-->
			<div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> Run it up the flagpole turd polishing powerPointless, so pixel pushing, so organic growth. We need to dialog around your choice of work attire.
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')">
						</div>
						<div class="col-md-9 col-sm-9 col-9 card_col_two">
							<h4>June ’89</h4>
							<p class="school_name">Last school day</p>
						</div>
					</div>
				</div>
			</div><!---end-->
			<div class="col-md-4 col-sm-4 col-12 mb-4">
				<div class="prorile_card">
					<p>
						<i class="fas fa-quote-left"></i> Run it up the flagpole turd polishing powerPointless, so pixel pushing, so organic growth. We need to dialog around your choice of work attire.
					</p>
					<div class="row card_content">
						<div class="col-md-3 col-sm-3 col-3">
							<img class="card_img" src="<?php bloginfo('template_directory'); ?>/assets/images/test-1.jpg')">
						</div>
						<div class="col-md-9 col-sm-9 col-9 card_col_two">
							<h4>June ’89</h4>
							<p class="school_name">Last school day</p>
						</div>
					</div>
				</div>
			</div><!---end-->
		</div>
	</div>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="margin: 0px;">Add Memories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="applicant_form" enctype="multipart/form-data" autocomplete="off">
  				<div id="wpmp-reg-loader-info" class="wpmp-loader" style="text-align: center;margin-bottom: 17px; display: none;">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/ajax-loader.gif"/>
                    <span>Please wait ...</span>
                </div>
                <div id="wpmp-register-alert" class="alert alert-danger" role="alert" style="display:none;"></div>
                <div id="wpmp-mail-alert" class="alert alert-danger" role="alert" style="display:none;">
          </div>

          <div class="form-group row">
          	<div class="col-md-12">
          		<label for="inputSName" class="col-form-label" style="font-size: 15px;">name<span>*</span></label>
          		<input type="text" class="form-control" id="name" name="name" placeholder="Name">
          	</div>
					</div><!--field-->

					<div class="form-group row">
          	<div class="col-md-12">
          		<label for="inputSName" class="col-form-label" style="font-size: 15px;">Memories<span>*</span></label>
          		<textarea name="text" id="text" rows="2" style="height:66px"></textarea>
          	</div>
					</div><!--field-->

					<div class="form-group row">
          	<div class="col-md-12">
          		<label for="inputSName" class="col-form-label" style="font-size: 15px;">School Name<span>*</span></label>
          		<input type="text" class="form-control" id="school_name" name="school_name" placeholder="Name">
          	</div>
					</div><!--field-->

					<div class="form-group row">
          	<div class="col-md-12">
          		<label for="inputSName" class="col-form-label" style="font-size: 15px;">Image<span>*</span></label>
          		<input type="file" class="form-control" id="image" name="image">
          	</div>
					</div><!--field-->
					<div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary" value="Add Memories">Add Memories</button>
		      </div>
      </form>
      </div>
    </div>
  </div>
</div>
</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
