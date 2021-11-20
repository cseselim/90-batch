<?php
	include "../../../../wp-blog-header.php";

	$filename = "student-data-for-school.csv";
	$fp = fopen('php://output', 'w');


	$query = array(
		'Student Id',
		'Student Name',
		'Class',
		'Shift',
		'Blood Group',
		'Gender',
		'Date of Birth',
		'Father Name',
		'Father date Birth',
		'Father Occupation',
		'Father Mobile No',
		'Father Income',
		'Father Office Address',
		'Mother Name',
		'Mother date Birth',
		'Mother Occupation',
		'Mother Mobile No',
		'Phone',
		'Present Address',
		'Parmanent Address',
		'Religion',
		'Category',
		'Previous School',
    	'Payment ID',
    	'trxID',
    	'Gateway',
    	'Amount',
    	'Payment Date',
	);

	foreach ($query as  $value) {
		$header[] = $value;
	}	

	header('Content-type: application/csv');
	header('Content-Disposition: attachment; filename='.$filename);
	fputcsv($fp, $header);


	global $wpdb;
	$user_id = get_current_user_id();
	$student_csv_data = $wpdb->get_results(' 
        SELECT profile_s.index_no, profile_s.student_name,profile_s.class,profile_s.shift,profile_s.blood_group,profile_s.student_sex,profile_s.birth_date,profile_s.father_name,profile_s.f_birth_date, profile_s.father_occupation, profile_s.father_contact,profile_s.f_income,profile_s.f_office_address, profile_s.mother_name,profile_s.m_birth_date,profile_s.mother_occupation, profile_s.mother_contact, profile_s.contact_no, profile_s.present_address, profile_s.parmanent_address, profile_s.religion_id, profile_s.parents_category,profile_s.last_school_name,csv_payment.paymentID, csv_payment.trxID,csv_payment.gateway, csv_payment.amount, csv_payment.datatime
        FROM '.$wpdb->prefix.'student_profiles AS profile_s
        INNER JOIN '. $wpdb->prefix.'payments AS csv_payment
        ON profile_s.user_id  =  csv_payment.student_id WHERE profile_s.status="1" ORDER BY profile_s.index_no ASC', ARRAY_A);
	/*echo "<pre>";
	print_r($student_csv_data);*/

	foreach ($student_csv_data as  $value) {
		fputcsv($fp, $value);
	}
	exit;
?>
	


