<?php 

    add_action( 'admin_head', 'wpse245372_admin_user_css' );

    add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
      
    function my_custom_dashboard_widgets() {
     
        wp_add_dashboard_widget('custom_help_widget', 'Applicant Activites', 'custom_dashboard_help');
    }
     
    function custom_dashboard_help() {
        global $wpdb; 
        $student_apply_table = $wpdb->prefix.'student_profiles';
        $numRows = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE  status='1' AND (class='Two' or class='Three' or class='Four' or class='Five' or class='Six')");
        $today = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE date(created_at) = CURDATE() AND status='1'");
        /*$one = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='one' AND status='1' AND approved_status='0' ");*/
        $Two = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='Two' AND status='1'");
        $Three = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='Three' AND status='1'");
        $Four = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='Four' AND status='1'");
        $Five = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='Five' AND status='1'");
        $Six = $wpdb->get_var( "SELECT COUNT(*) FROM $student_apply_table WHERE class='Six' AND status='1'");
        echo '
            <div class="admission_table">
            <div class="row admission_row_one">
            <div class="col-3">
                <div class="all_applicant">
                    <h3>' .$numRows. '</h3>
                    <h4>All Applicants</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="all_applicant tody_a">
                    <h3>' .$today. '</h3>
                    <h4>Todays Applicants</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="all_applicant bangla">
                    <h3>' .$Two. '</h3>
                    <h4>Class Two</h4>
                </div>
            </div>
            <div class="col">
                <div class="all_applicant bangla">
                    <h3>' .$Three. '</h3>
                    <h4>Class Three</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="all_applicant bangla">
                    <h3>' .$Four. '</h3>
                    <h4>Class Four</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="all_applicant bangla">
                    <h3>' .$Five. '</h3>
                    <h4>Class Five</h4>
                </div>
            </div>
            <div class="col-3">
                <div class="all_applicant bangla">
                    <h3>' .$Six. '</h3>
                    <h4>Class Six</h4>
                </div>
            </div>
        </div>
        </div>
        ';
    }

?>