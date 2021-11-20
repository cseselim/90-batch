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



    add_action( 'wp_ajax_all_applicant_students', 'all_applicant_students' );
    add_action( 'wp_ajax_nopriv_all_applicant_students', 'all_applicant_students' );

    function all_applicant_students(){

    global $wpdb;
    $search_action = $_POST['search_action'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    
    if($search_action == 'no'){
         $student_data = $wpdb->get_results(' 
         SELECT stu_profile.ID,stu_profile.user_login,stu_profile.display_name
        FROM '. $wpdb->prefix.'users AS stu_profile
        WHERE stu_profile.status=0 ');   
    }else{
        $student_data = $wpdb->get_results(' 
         SELECT stu_profile.ID,stu_profile.user_login,stu_profile.display_name
        FROM '. $wpdb->prefix.'users AS stu_profile
        WHERE stu_profile.status=0 AND date(stu_profile.created_at) BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');  
    }

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'index_no' => $value->user_login,
              'student_name' => $value->display_name,
              /*'father_name' => $value->father_name,*/
              // 'category' => $value->parents_category,
              /*'mother_name' => $value->mother_name,
              'contact_no' => $value->contact_no,
              'class' => $value->class,
              'shift' => $value->shift,*/
              /*'category' => $value->category,*/
              'action' => '<button class="approves" id="'.$value->ID.'">Approve</button> | <a class="single_view" href="'.admin_url("admin.php?page=student-details&id=$value->user_id").'">View</a>',
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
        $student_apply_table = $wpdb->prefix.'users';
        $result = $wpdb->update($student_apply_table, array('status' => '1'), array('ID' => $student_id));
        if($result){
            // $student_user_id = $wpdb->get_row(' 
            // SELECT user_id FROM '.$wpdb->prefix.'student_profiles  
            // WHERE user_id=' .$student_id. '');
            // $parent_mobile = get_userdata($student_user_id->parent_id);
            // send_sms_selected_student($parent_mobile->user_login);
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
         SELECT stu_profile.ID,stu_profile.user_login,stu_profile.display_name
        FROM '. $wpdb->prefix.'users AS stu_profile
        WHERE stu_profile.status=1 '); 
    }else{
        $student_data = $wpdb->get_results(' 
         SELECT stu_profile.ID,stu_profile.user_login,stu_profile.display_name
        FROM '. $wpdb->prefix.'users AS stu_profile
        WHERE stu_profile.status=1 AND date(stu_profile.created_at) BETWEEN "'.$start_date.'" AND "'.$end_date.'" ');
    }

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'index_no' => $value->user_login,
              'student_name' => $value->display_name,
              /*'father_name' => $value->father_name,*/
              // 'category' => $value->parents_category,
              /*'mother_name' => $value->mother_name,
              'contact_no' => $value->contact_no,
              'class' => $value->class,
              'shift' => $value->shift,*/
              /*'category' => $value->category,*/
              'action' => '<button class="unapproves" id="'.$value->ID.'">Unapprove</button> | <a class="single_view" href="'.admin_url("admin.php?page=student-details&id=$value->ID").'">View</a>',
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
        $student_apply_table = $wpdb->prefix.'users';
        $result = $wpdb->update($student_apply_table, array('status' => '0'), array('ID' => $student_id));

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



    add_action( 'wp_ajax_all_memories', 'all_memories' );
    add_action( 'wp_ajax_nopriv_all_memories', 'all_memories' );

    function all_memories(){

    global $wpdb;
    
        $student_data = $wpdb->get_results(' 
        SELECT stu_profile.id,stu_profile.name,stu_profile.school_name,stu_profile.m_text
        FROM '. $wpdb->prefix.'memories AS stu_profile
        WHERE stu_profile.status=0');   

        $return_json = array();
        $i = 0;
        foreach ($student_data as $key => $value) { $i++;
            $return_json[] = array(
              'srl' => $i,    
              'name' => $value->name,
              'student_name' => $value->school_name,
              'm_text' => $value->m_text,
              'action' => '<button style="border: none;
                background: #3AC87A;
                color: #fff;
                padding: 0px 5px 2px 5px;
                border-radius: 4px;
                cursor: pointer;" class="m_approves" id="'.$value->id.'">Approve</button>',
            );
        }
        $response['data'] = $return_json;
        wp_send_json($response);
    }

    add_action( 'wp_ajax_memories_approve', 'memories_approve' );
    add_action( 'wp_ajax_nopriv_memories_approve', 'memories_approve' );

    function memories_approve(){
        $student_id = trim($_POST['student_id']);
        global $wpdb;
        $student_apply_table = $wpdb->prefix.'memories';
        $result = $wpdb->update($student_apply_table, array('status' => '1'), array('id' => $student_id));
        if($result){
            // $student_user_id = $wpdb->get_row(' 
            // SELECT user_id FROM '.$wpdb->prefix.'student_profiles  
            // WHERE user_id=' .$student_id. '');
            // $parent_mobile = get_userdata($student_user_id->parent_id);
            // send_sms_selected_student($parent_mobile->user_login);
            echo json_encode($result);   
        }
    }

 ?>