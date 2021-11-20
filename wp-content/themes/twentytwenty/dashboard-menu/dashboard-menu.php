<?php 
	
	/*
	@package online-admission

	===========================
	        Admin page
	===========================
	*/

	function admission_add_menu_page()
	{
		add_menu_page( 'Online Admission', "Register User", "edit_posts", 'user_list', 'admission_student_list', 'dashicons-welcome-learn-more', 110 );
		/*add_action('admin_init','custom_setting');*/
		add_submenu_page( 'user_list', "selected-students", "User list", 'edit_posts', 'user_list', 'admission_student_list', 110 );

		add_submenu_page( 'user_list', "selected-students", "Approve User", 'edit_posts', 'selected_students', 'selected_students', 110 );

		// add_submenu_page( 'user_list', "student_details", "", 'edit_posts', 'student-details', 'student_details', 110 );

		add_submenu_page( 'user_list', "Applicant-list", "All Memories", 'edit_posts', 'memories_list', 'memories_list_function', 110 );

		add_submenu_page( 'user_list', "studnet-documents", "All Approve Memories", 'edit_posts', 'approve_memories', 'approve_memories_list', 110 );

	}
	add_action('admin_menu','admission_add_menu_page');

	/*function custom_setting(){
	}*/
	function admission_student_list(){
		require_once get_template_directory() . '/dashboard-menu/admission-student-list.php';
	}

	/*student details*/
	function student_details(){
		require_once get_template_directory() . '/dashboard-menu/admission-student-details.php';
	}

	/*student details*/
	function student_approve(){
		require_once get_template_directory() . '/dashboard-menu/admission-student-approve.php';
	}

	/*Selected students*/
	function selected_students(){
		require_once get_template_directory() . '/dashboard-menu/admission-selected-students.php';
	}

	/*applicant list*/
	function memories_list_function(){
		require_once get_template_directory() . '/dashboard-menu/admit-student-list.php';
	}

	function approve_memories_list(){
		require_once get_template_directory() . '/dashboard-menu/student-document.php';
	}
 ?>