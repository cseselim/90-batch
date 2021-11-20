<?php 
	
	/*
	@package online-admission

	===========================
	       Admin page css
	===========================
	*/

function dashboard_admission_page_css()
{
	wp_enqueue_style( 'bootstrap.min.css', get_template_directory_uri().'/inc/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );
	
	wp_enqueue_style( 'datepicker3', get_template_directory_uri().'/inc/assets/admin-css/bootstrap-datepicker3.min.css', array(), '1.0.0', 'all' );
	
	wp_enqueue_style( 'admission', get_template_directory_uri().'/inc/assets/admin-css/admission.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'admission-datatable', get_template_directory_uri().'/inc/assets/admin-css/jquery.dataTables.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri().'/inc/assets/js/bootstrap.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'datepicker.min.js', get_template_directory_uri().'/inc/assets/admin-css/js/bootstrap-datepicker.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'datatable-js', get_template_directory_uri().'/inc/assets/admin-css/js/datatables.min.js', array(), '1.0.0', true );

	wp_enqueue_script( 'datatable-pdf-js', get_template_directory_uri().'/inc/assets/admin-css/js/pdfmake.min.js', array(), '1.0.0', true );
	
	wp_enqueue_script( 'vfs_fonts.js', get_template_directory_uri().'/inc/assets/admin-css/js/vfs_fonts.js', array(), '1.0.0', true );

	wp_enqueue_script( 'admin-js', get_template_directory_uri().'/inc/assets/admin-css/js/admin-custom.js', array(), '1.0.0', true );
}
add_action('admin_enqueue_scripts','dashboard_admission_page_css');