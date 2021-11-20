<?php

function change_password_form() { ?>
	<style type="text/css">
		.p_new_pass_area{
			padding: 0px 20px 20px 20px;
		}
	</style>
	<div class="row">
	    <div class="col-12 col-sm-12 col-md-12">
        	<div class="p_new_pass_area">
                <form action="" method="post">
                	<div class="form-group">
                      <label for="current_password">Enter your current password:</label>
                      <input class="form-control" id="current_password" type="password" name="current_password" title="current_password" placeholder="current password" required>
                   </div>
        
                   <div class="form-group">
                      <label for="new_password">New password:</label>
                      <input class="form-control" id="new_password" type="password" name="new_password" title="new_password" placeholder="new password" required>
                   </div>
        
                   <div class="form-group">
                      <label for="confirm_new_password">Confirm new password:</label>
                      <input class="form-control" id="confirm_new_password" type="password" name="confirm_new_password" title="confirm_new_password" placeholder="confirm new password" required>
                   </div>
                    <input class="btn btn-success" type="submit" value="Change Password">
                </form>
            </div>
        </div>
    </div>
<?php } 


function change_password(){
global $wpdb;
if(isset($_POST['current_password'])){
          $_POST = array_map('stripslashes_deep', $_POST);
          $current_password = sanitize_text_field($_POST['current_password']);
          $new_password = sanitize_text_field($_POST['new_password']);
          $confirm_new_password = sanitize_text_field($_POST['confirm_new_password']);
          $user_id = get_current_user_id();
          $errors = array();
          $current_user = get_user_by('id', $user_id);
         // Check for errors
			if (empty($current_password) && empty($new_password) && empty($confirm_new_password) ) {
			$errors[] = 'All fields are required';
			}
			if($current_user && wp_check_password($current_password, $current_user->data->user_pass, $current_user->ID)){
			//match
			} else {
			    $errors[] = 'Current password is incorrect';
			}
			if($new_password != $confirm_new_password){
			    $errors[] = 'Confirm password does not match';
			}
			if(strlen($new_password) < 6){
			    $errors[] = 'Password is too short, minimum of 6 characters';
			}
			

			if(empty($errors)){
			    wp_set_password( $new_password, $current_user->ID );
			    echo '<p class="alert alert-success">Password successfully changed!</p>';
			} else {
			    foreach($errors as $error){
			        echo '<p class="alert alert-danger">';
			        echo "<strong>$error</strong>";
			        echo '</p>';
			    }
			}

		}

    }



function cp_form_shortcode(){
        change_password();
        change_password_form();
}
add_shortcode('changepassword_form', 'cp_form_shortcode');