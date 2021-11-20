<?php 
	
	/*
	@package online-admission

	===========================
	        Admin page
	===========================
	*/

	function admission_add_menu_page()
	{
		add_menu_page( 'Online Admission', "Admission", "edit_posts", 'student_list', 'admission_student_list', 'dashicons-welcome-learn-more', 110 );
		/*add_action('admin_init','custom_setting');*/
		add_submenu_page( 'student_list', "selected-students", "Student list", 'edit_posts', 'student_list', 'admission_student_list', 110 );

		add_submenu_page( 'student_list', "selected-students", "Approve students", 'edit_posts', 'selected_students', 'selected_students', 110 );

		add_submenu_page( 'student_list', "student_details", "", 'edit_posts', 'student-details', 'student_details', 110 );

		add_submenu_page( 'student_list', "Applicant-list", "Applicant List", 'edit_posts', 'applicant_list', 'admit_card_list', 110 );

		add_submenu_page( 'student_list', "studnet-documents", "Studnet document", 'edit_posts', 'studnet-document', 'student_documents', 110 );

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
	function admit_card_list(){
		require_once get_template_directory() . '/dashboard-menu/admit-student-list.php';
	}

	function student_documents(){
		require_once get_template_directory() . '/dashboard-menu/student-document.php';
	}
 ?>