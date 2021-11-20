<?php 

    add_action( 'wp_ajax_add_memories', 'add_memories' );
    add_action( 'wp_ajax_nopriv_add_memories', 'add_memories' );
    function add_memories() {

        global $wpdb;
        $name = htmlspecialchars(trim($_POST['name']));
        $text = htmlspecialchars(trim($_POST['text']));
        $school_name = htmlspecialchars(trim($_POST['school_name']));

        $uploadedfile = $_FILES['image'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile && ! isset( $movefile['error'] ) ) {
                update_user_meta($user_id,'image', $movefile['url']);
            }
        $profile_image = $movefile['url'];

        global $wpdb;
        $table = $wpdb->prefix.'memories';

         $data = array(
                    'name' => $name,
                    'm_text' => $text,
                    'school_name'=> $school_name,
                    'image' => $profile_image,
                );

         $format = array('%s','%s','%s','%s');
        $result = $wpdb->insert($table,$data,$format);

        if ($result) {
            $response['logged_in'] = true;
            $response['reg_status'] = true;
            $response['success'] = "Memories create successfully";
        }
        wp_send_json($response);
    }


	add_action( 'wp_ajax_profile', 'profile' );
    add_action( 'wp_ajax_nopriv_profile', 'profile' );
    function profile() {

        global $wpdb;
    	$student_name = htmlspecialchars(trim($_POST['student_name']));
    	$birth_date = htmlspecialchars(trim($_POST['birth_date']));
        $birth_id = htmlspecialchars(trim($_POST['birth_id']));
    	$shift = htmlspecialchars(trim($_POST['shift']));
        $class = htmlspecialchars(trim($_POST['class']));
        /*$optional_subject = htmlspecialchars($_POST['optional_subject']);*/
    	$father_name = htmlspecialchars(trim($_POST['father_name']));
        $f_birth_date = htmlspecialchars(trim($_POST['f_birth_date']));
    	$father_occupation = htmlspecialchars(trim($_POST['father_occupation']));
        $f_income = htmlspecialchars(trim($_POST['f_income']));
        $f_office_address = htmlspecialchars(trim($_POST['f_office_address']));
    	$father_contact = htmlspecialchars(trim($_POST['father_contact']));
    	$mother_name = htmlspecialchars(trim($_POST['mother_name']));
        $m_birth_date = htmlspecialchars(trim($_POST['m_birth_date']));
    	$mother_occupation = htmlspecialchars(trim($_POST['mother_occupation']));
    	$mother_contact = htmlspecialchars(trim($_POST['mother_contact']));
    	$parents_category = htmlspecialchars(trim($_POST['parents_category']));
    	$present_address = htmlspecialchars(trim($_POST['present_address']));
    	$parmanent_address = htmlspecialchars(trim($_POST['parmanent_address']));
    	$contact_no = htmlspecialchars(trim($_POST['contact_no']));
    	$email_address = htmlspecialchars(trim($_POST['email_address']));
    	$student_sex = htmlspecialchars(trim($_POST['student_sex']));
        $religion_id = htmlspecialchars(trim($_POST['religion_id']));
        $blood_group = htmlspecialchars(trim($_POST['blood_group']));
    	$last_school_name = htmlspecialchars(trim($_POST['last_school_name']));
       /* $last_exam = htmlspecialchars(trim($_POST['last_exam']));
        $last_exam_roll = htmlspecialchars(trim($_POST['last_exam_roll']));
        $last_exam_result = htmlspecialchars(trim($_POST['last_exam_result']));*/
        $legal_guardian_name = htmlspecialchars(trim($_POST['legal_guardian_name']));
    	$relation_with_guardian = htmlspecialchars(trim($_POST['relation_with_guardian']));
    	$guardian_occupation_id = htmlspecialchars(trim($_POST['guardian_occupation_id']));
    	$guardian_income = htmlspecialchars(trim($_POST['guardian_income']));
    	$skill = htmlspecialchars(trim($_POST['skill']));
        $password = htmlspecialchars(trim($_POST['password']));
        $f_nid = htmlspecialchars(trim($_POST['f_nid']));
        $m_nid = htmlspecialchars(trim($_POST['m_nid']));

        $uploadedfile = $_FILES['profile_image'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile && ! isset( $movefile['error'] ) ) {
                update_user_meta($user_id,'profile_image', $movefile['url']);
            }
        $profile_image = $movefile['url'];

        $birth_uploadedfile = $_FILES['birth_certificate'];
        $birth_overrides = array( 'test_form' => false );
        $birth_movefile = wp_handle_upload( $birth_uploadedfile, $birth_overrides );
            if ( $birth_movefile && ! isset( $birth_movefile['error'] ) ) {
                update_user_meta($user_id,'registration_card', $birth_movefile['url']);
            }
        $birth_image = $birth_movefile['url'];

        if(isset($_FILES['testimonial_image'])){
            $testimonial_uploadedfile = $_FILES['testimonial_image'];
            $testimonial_overrides = array( 'test_form' => false );
            $testimonial_movefile = wp_handle_upload( $testimonial_uploadedfile, $testimonial_overrides );
            if ( $transcript_movefile && ! isset( $testimonial_movefile['error'] ) ) {
                update_user_meta($user_id,'testimonial_image', $testimonial_movefile['url']);
            }
            $testimonial_image = $testimonial_movefile['url'];
        }else{
            $testimonial_image = 'no';
        }

        global $wpdb;
        $table = $wpdb->prefix.'student_profiles';
    
     
        /*$ssc_rolls = $wpdb->get_results(' 
        SELECT ssc_roll
        FROM '. $wpdb->prefix.'ssc_rolls', ARRAY_A);
        $ssc_roll_match = array_column($ssc_rolls, 'ssc_roll');*/
        if(isset($profile_image) && isset($birth_image)){
            /*======user login data insert=========*/
            $userdata = array(
                'user_login' => apply_filters('pre_user_login', trim($_POST['contact_no'])),
                'user_pass' => apply_filters('pre_user_pass', trim($_POST['password'])),
                'user_email' => apply_filters('pre_user_email', $email_address),
                'first_name' => apply_filters('pre_user_first_name', trim($_POST['student_name'])),
                
                'role' => get_option('default_role'),
                'user_registered' => date('Y-m-d H:i:s')
            );
            // creating new user
            $user_id = wp_insert_user($userdata);
            if (!is_wp_error($user_id)) {
                $sql = $wpdb->prepare("INSERT INTO `onad_user_infos` (`user_id`,`phone`,`image`) values (%d,%s,%s)", $user_id,$contact_no,$profile_image);
                $wpdb->query($sql);
                /*======user login data insert code end=========*/

                $data = array(
                    'user_id' => $user_id,
                    'birth_id' => $birth_id,
                	'shift'=> $shift,
                    'class' => $class,
                    'student_name' => $student_name,
                    'father_name' => $father_name,
                    'f_nid' => $f_nid,
                    'f_birth_date' => $f_birth_date,
                    'father_occupation' => $father_occupation,
                    'f_income' => $f_income,
                    'f_office_address' => $f_office_address,
                    'father_contact' => $father_contact,
                    'mother_name' => $mother_name,
                    'm_nid' => $m_nid,
                    'm_birth_date' => $m_birth_date,
                    'mother_occupation' => $mother_occupation,
                    'mother_contact' => $mother_contact,
                	'parents_category'=> $parents_category,
                    'present_address' => $present_address,
                    'parmanent_address' => $parmanent_address,
                    'contact_no' => $contact_no,
                    'email_address' => $email_address,
                    'birth_date' => $birth_date,
                    'student_sex' => $student_sex,
                    'religion_id' => $religion_id,
                    'blood_group' => $blood_group,
                    'last_school_name' => $last_school_name,
                    'legal_guardian_name' => $legal_guardian_name,
                    'relation_with_guardian' => $relation_with_guardian,
                    'guardian_occupation_id' => $guardian_occupation_id,
                    'guardian_income' => $guardian_income,
                    'skill' => $skill,
                    'profile_image' => $profile_image,
                    'birth_image' => $birth_image,
                    'unit_certificate' => $testimonial_image,
                );
    
                $index_no = $wpdb->get_row( "SELECT max(index_no) as index_no FROM $table WHERE class = '" .$class. "'", ARRAY_A );
                    $new_index_no = $index_no['index_no'] + 1;
                    
                    if ($class == "Two") {
                        if (empty($index_no['index_no'])) {
                        $data['index_no'] = "20001";
                        }else{
                          $data['index_no'] = $new_index_no;
                        }
                    }elseif ($class == "Three") {
                        if (empty($index_no['index_no'])) {
                        $data['index_no'] = "30001";
                        }else{
                          $data['index_no'] = $new_index_no;
                        }
                    }elseif ($class == "Four") {
                        if (empty($index_no['index_no'])) {
                        $data['index_no'] = "40001";
                        }else{
                          $data['index_no'] = $new_index_no;
                        }
                    }elseif ($class == "Five") {
                        if (empty($index_no['index_no'])) {
                        $data['index_no'] = "50001";
                        }else{
                          $data['index_no'] = $new_index_no;
                        }
                    }else{
                        if (empty($index_no['index_no'])) {
                        $data['index_no'] = "60001";
                        }else{
                          $data['index_no'] = $new_index_no;
                        }
                    }

                $data['amount'] = "220";

                $format = array('%d','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');
                $result = $wpdb->insert($table,$data,$format);
                

                if ($result) {
                    $csv_fields_table = $wpdb->prefix.'csv_fields';
                    $stu_csv_data = array('user_id' => $user_id);
                    $stu_csv_format = array('%d');
                    $stu_csv_result = $wpdb->insert($csv_fields_table,$stu_csv_data,$stu_csv_format);

                    $parents_csv_fields = $wpdb->prefix.'parents_csv_fields';
                    $par_csv_data = array('user_id' => $user_id);
                    $par_csv_format = array('%d');
                    $par_csv_result = $wpdb->insert($parents_csv_fields,$par_csv_data,$par_csv_format);

                    $credentials = array();
                    $credentials['user_login'] = trim($_POST['contact_no']);
                    $credentials['user_password'] = trim($_POST['password']);

                    $user = wp_signon($credentials, false);
                    
                    // checking for authentication error
                    if (is_wp_error($user)) {
                        $response['error'] = __($wpmp_messages_settings['wpmp_login_error_message'], $this->plugin_name);
                    } else {
                        //global $wpdb;
                        wp_set_auth_cookie($user->data->ID);
                        // setting current logged in user
                        wp_set_current_user($user->data->ID, $user->data->user_login);
                        // Adding hook so that anyone can add action on user login
                        do_action('set_current_user');
                        
                        $response['logged_in'] = true;
                        $response['reg_status'] = true;
                        $response['success'] = "Profile create successfully";
                        /*$response['redirection_url'] = "<?= home_url() ?>/applicant-profile/";*/ 
                    }
                }else{
                    $user_table = 'onad_users';
                    $wpdb->delete( $user_table, array( 'ID' => $user_id ) );
                    $response['error'] = "Prifile is not created!";
                }
            }else{
                $response['error'] = $user_id->get_error_message();
            }    
        }else{
            $response['error'] = "Student Image Problem";
        }
        wp_send_json($response);
    }


    add_action( 'wp_ajax_edit_profile', 'edit_profile' );
    add_action( 'wp_ajax_nopriv_edit_profile', 'edit_profile' );
    function edit_profile() {

        $user_id = get_current_user_id();
        $student_id = trim($_POST['student_id']);
        $student_name = htmlspecialchars(trim($_POST['student_name']));
        $father_name = htmlspecialchars(trim($_POST['father_name']));
        $father_occupation = htmlspecialchars(trim($_POST['father_occupation']));
        $mother_name = htmlspecialchars(trim($_POST['mother_name']));
        $mother_occupation = htmlspecialchars(trim($_POST['mother_occupation']));
        $present_address = htmlspecialchars(trim($_POST['present_address']));
        $parmanent_address = htmlspecialchars(trim($_POST['parmanent_address']));
        $contact_no = htmlspecialchars(trim($_POST['contact_no']));
        $email_address = htmlspecialchars(trim($_POST['email_address']));
        $birth_date = htmlspecialchars(trim($_POST['birth_date']));
        $birth_id = htmlspecialchars(trim($_POST['birth_id']));
        $student_sex = htmlspecialchars(trim($_POST['student_sex']));
        $religion_id = htmlspecialchars(trim($_POST['religion_id']));
        $blood_group = htmlspecialchars(trim($_POST['blood_group']));
        $height = htmlspecialchars(trim($_POST['height']));
        $last_school_name = htmlspecialchars(trim($_POST['last_school_name']));
        $last_exam = htmlspecialchars(trim($_POST['last_exam']));
        $last_exam_roll = htmlspecialchars(trim($_POST['last_exam_roll']));
        $last_exam_result = htmlspecialchars(trim($_POST['last_exam_result']));
        $legal_guardian_name = htmlspecialchars(trim($_POST['legal_guardian_name']));
        $relation_with_guardian = htmlspecialchars(trim($_POST['relation_with_guardian']));
        $guardian_occupation_id = htmlspecialchars(trim($_POST['guardian_occupation_id']));
        $guardian_income = htmlspecialchars(trim($_POST['guardian_income']));
        $skill = htmlspecialchars(trim($_POST['skill']));
        $uploadedfile = $_FILES['profile_image'];
        $upload_overrides = array( 'test_form' => false );
        $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
            if ( $movefile && ! isset( $movefile['error'] ) ) {
                update_user_meta($user_id,'profile_image', $movefile['url']);
            }
        $profile_image = $movefile['url'];

        global $wpdb;
        $table = $wpdb->prefix.'student_profiles';
        if (isset($profile_image)) {
            $data = array(
            'student_name' => $student_name,
            'father_name' => $father_name,
            'father_occupation' => $father_occupation,
            'mother_name' => $mother_name,
            'mother_occupation' => $mother_occupation,
            'present_address' => $present_address,
            'parmanent_address' => $parmanent_address,
            'birth_date' => $birth_date,
            'birth_id' => $birth_id,
            'student_sex' => $student_sex,
            'religion_id' => $religion_id,
            'blood_group' => $blood_group,
            'height' => $height,
            'last_school_name' => $last_school_name,
            'last_exam' => $last_exam,
            'last_exam_roll' => $last_exam_roll,
            'last_exam_result' => $last_exam_result,
            'legal_guardian_name' => $legal_guardian_name,
            'relation_with_guardian' => $relation_with_guardian,
            'guardian_occupation_id' => $guardian_occupation_id,
            'guardian_income' => $guardian_income,
            'skill' => $skill,
            'profile_image' => $profile_image,
        );
        }else{
            $data = array(
            'student_name' => $student_name,
            'father_name' => $father_name,
            'father_occupation' => $father_occupation,
            'mother_name' => $mother_name,
            'mother_occupation' => $mother_occupation,
            'present_address' => $present_address,
            'parmanent_address' => $parmanent_address,
            'birth_date' => $birth_date,
            'birth_id' => $birth_id,
            'student_sex' => $student_sex,
            'religion_id' => $religion_id,
            'blood_group' => $blood_group,
            'height' => $height,
            'last_school_name' => $last_school_name,
            'last_exam' => $last_exam,
            'last_exam_roll' => $last_exam_roll,
            'last_exam_result' => $last_exam_result,
            'legal_guardian_name' => $legal_guardian_name,
            'relation_with_guardian' => $relation_with_guardian,
            'guardian_occupation_id' => $guardian_occupation_id,
            'guardian_income' => $guardian_income,
            'skill' => $skill,
        );
        }
        

        $result = $wpdb->update($table, $data, array('id' => $student_id,'user_id' => $user_id ));
        if ($result) {
            $response['reg_status'] = true;
            $response['success'] = "Profile successfully updated";
        }else{
            $response['error'] = "You don't change any value!";
        }
        wp_send_json($response);
    }



    add_action( 'wp_ajax_profile_update', 'profile_update' );
    add_action( 'wp_ajax_nopriv_profile_update', 'profile_update' );
    function profile_update(){

        $display_name = htmlspecialchars(trim($_POST['display_name']));
        $user_email = htmlspecialchars(trim($_POST['user_email']));

         $userdata = array(
                'ID' => get_current_user_id(),               
                'user_email' => apply_filters('pre_user_email', $user_email),
                'display_name' => apply_filters('pre_user_first_name', $display_name)
        );
        $user_id = wp_update_user($userdata);

        
        if($_FILES['profile_image']['size'] !=0 && $_FILES['profile_image']['error']==0){
                if ( ! function_exists( 'wp_handle_upload' ) ) {
                    require_once( ABSPATH . 'wp-admin/includes/file.php' );
                }
            $uploadedfile = $_FILES['profile_image'];
            $upload_overrides = array( 'test_form' => false );
            $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
                if ( $movefile && ! isset( $movefile['error'] ) ) {
                    update_user_meta($user_id,'profile_image', $movefile['url']);
                }
            $image = $movefile['url'];
        }

        global $wpdb;
        $table = $wpdb->prefix.'user_infos';

        if (isset($image)) {
            $user_image = $wpdb->update($table, array('image' => $image), array('user_id' => $user_id ));
        }

        if ($user_id) {
            $response['reg_status'] = true;
            $response['success'] = "Profile update successfull";
        }else{
            $response['error'] = "You don't change any value!";
        }
        wp_send_json($response);
     }


    add_action( 'wp_ajax_all_applicant_students', 'all_applicant_students' );
    add_action( 'wp_ajax_nopriv_all_applicant_students', 'all_applicant_students' );

    function all_applicant_students(){

    global $wpdb;
    $search_action = $_POST['search_action'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    
    if($search_action == 'no'){
         $student_data = $wpdb->get_results(' 
         SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND stu_profile.approved_status=0 AND class="One"');   
    }else{
        $student_data = $wpdb->get_results(' 
        SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND class="One" AND stu_profile.approved_status=0 AND date(stu_profile.created_at) BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');  
    }

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'index_no' => $value->index_no,
              'student_name' => $value->student_name,
              /*'father_name' => $value->father_name,*/
              'category' => $value->parents_category,
              /*'mother_name' => $value->mother_name,
              'contact_no' => $value->contact_no,
              'class' => $value->class,
              'shift' => $value->shift,*/
              /*'category' => $value->category,*/
              'action' => '<button class="approves" id="'.$value->user_id.'">Approve</button> | <a class="single_view" href="'.admin_url("admin.php?page=student-details&id=$value->user_id").'">View</a>',
            );
        }
        $response['data'] = $return_json;
        wp_send_json($response);
    }

    add_action( 'wp_ajax_students_approve', 'students_approve' );
    add_action( 'wp_ajax_nopriv_students_approve', 'students_approve' );

    function students_approve(){
        $student_id = trim($_POST['student_id']);
        global $wpdb;
        $student_apply_table = $wpdb->prefix.'student_profiles';
        $result = $wpdb->update($student_apply_table, array('approved_status' => '1'), array('user_id' => $student_id));
        if($result){
            $student_user_id = $wpdb->get_row(' 
            SELECT user_id FROM '.$wpdb->prefix.'student_profiles  
            WHERE user_id=' .$student_id. '');
            $parent_mobile = get_userdata($student_user_id->parent_id);
            send_sms_selected_student($parent_mobile->user_login);
            echo json_encode($result);   
        }
    }


    add_action( 'wp_ajax_all_approve_students', 'all_approve_students' );
    add_action( 'wp_ajax_nopriv_all_approve_students', 'all_approve_students' );

    function all_approve_students(){

    global $wpdb;
    $search_action = $_POST['search_action'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    if($search_action == 'no'){
         $student_data = $wpdb->get_results(' 
         SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND  stu_profile.approved_status=1');
    }else{
        $student_data = $wpdb->get_results(' 
        SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND stu_profile.approved_status=1 AND date(stu_profile.created_at) BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');
    }

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'index_no' => $value->index_no,
              'student_name' => $value->student_name,
              'father_name' => $value->father_name,
              'category' => $value->parents_category,
              'mother_name' => $value->mother_name,
              'contact_no' => $value->contact_no,
              'class' => $value->class,
              'shift' => $value->shift,
              /*'category' => $value->category,*/
              'action' => '<button class="unapproves" id="'.$value->user_id.'">Unapprove</button> | <a class="single_view" href="'.admin_url("admin.php?page=student-details&id=$value->user_id").'">View</a>',
            );
        }
        $response['data'] = $return_json;
        wp_send_json($response);
    }


    add_action( 'wp_ajax_unapprove_students', 'unapprove_students' );
    add_action( 'wp_ajax_nopriv_unapprove_students', 'unapprove_students' );

    function unapprove_students(){
        $student_id = trim($_POST['student_id']);
        global $wpdb;
        $student_apply_table = $wpdb->prefix.'student_profiles';
        $result = $wpdb->update($student_apply_table, array('approved_status' => '0'), array('user_id' => $student_id));

        echo json_encode($result);
    }
    
    
    function send_sms_selected_student($sms_number)
    {

        $text = Urlencode("Your admit card is available to download. You are requested to login in your account and download the admit card. - Bangladesh Navy College Dhaka.");
        $crl = curl_init();
        $url = "https://powersms.banglaphone.net.bd/httpapi/sendsms?userId=classtune&password=Classtune123&smsText=" .$text. "&commaSeperatedReceiverNumbers=" .$sms_number. "";
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_HEADER, 0);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($crl);
        curl_close($crl);

    }

    add_action( 'wp_ajax_all_applicant_list', 'all_applicant_list' );
    add_action( 'wp_ajax_nopriv_all_applicant_list', 'all_applicant_list' );

    function all_applicant_list()
    {
        global $wpdb;
    $search_action = $_POST['search_action'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    
    if($search_action == 'no'){
         $student_data = $wpdb->get_results(' 
         SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND stu_profile.approved_status=0 AND (class="One" or class="Two" or class="Three" or class="Four" or class="Five" or class="Six")');   
    }else{
        $student_data = $wpdb->get_results(' 
        SELECT stu_profile.user_id,stu_profile.index_no,stu_profile.student_name,stu_profile.father_name,stu_profile.mother_name,stu_profile.contact_no,stu_profile.class,stu_profile.shift,stu_profile.parents_category
        FROM '. $wpdb->prefix.'student_profiles AS stu_profile
        WHERE stu_profile.status=1 AND stu_profile.approved_status=0 AND date(stu_profile.created_at) BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');  
    }

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'index_no' => $value->index_no,
              'student_name' => $value->student_name,
              /*'father_name' => $value->father_name,
              'category' => $value->parents_category,
              'mother_name' => $value->mother_name,
              'contact_no' => $value->contact_no,*/
              'class' => $value->class,
              'shift' => $value->shift,
              /*'category' => $value->category,*/
              'action' => '<button class="approves" id="'.$value->user_id.'">Approve</button> | <a class="single_view" href="'.admin_url("admin.php?page=student-details&id=$value->user_id").'">View</a>',
            );
        }
        $response['data'] = $return_json;
        wp_send_json($response);
    }

 ?>