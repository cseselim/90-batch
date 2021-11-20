<?php
/**
 * Provide a public-facing view for the reset password form
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.daffodilsw.com/
 * @since      1.0.0
 *
 * @package    Wp_Mp_Register_Login
 * @subpackage Wp_Mp_Register_Login/public/partials
 */

?>
<?php 
if(isset($_GET['wpmp_reset_password_token'])){
$is_url_has_token = $_GET['wpmp_reset_password_token']; }else{
$is_url_has_token ='';
 } ?>
<div id="wpmpResetPasswordSection" class="container-fluid <?php echo empty($is_url_has_token) ? 'hidden' : 'ds' ?>">
    <div class="row">
        <div class="col-lg-12 col-md-12"> 
            <?php
            $wpmp_form_settings = get_option('wpmp_form_settings');

            $resetpassword_form_heading = empty($wpmp_form_settings['wpmp_resetpassword_heading']) ? 'Reset Password' : $wpmp_form_settings['wpmp_resetpassword_heading'];
            $resetpassword_button_text = empty($wpmp_form_settings['wpmp_resetpassword_button_text']) ? 'Reset password' : $wpmp_form_settings['wpmp_resetpassword_button_text'];
            $returntologin_button_text = empty($wpmp_form_settings['wpmp_returntologin_button_text']) ? 'Return to Login' : $wpmp_form_settings['wpmp_returntologin_button_text'];           

            ?>
            <h3><?php _e($resetpassword_form_heading, $this->plugin_name); ?></h3>

            <div id="wpmp-resetpassword-loader-info" class="wpmp-loader" style="display:none;">
                <!--<img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__)); ?>"/>
                <span><?php /*_e('Please wait ...', $this->plugin_name); */?></span>-->
            </div>
            <div id="wpmp-resetpassword-alert" class="alert alert-danger" role="alert" style="display:none;"></div>

            <form name="wpmpResetPasswordForm" id="wpmpResetPasswordForm" method="post">
                <?php
                // check if the url has token
                if (!$is_url_has_token) :

                    ?>
                    <!--<div class="form-group">
                        <label for="email"><?php _e('Email', $this->plugin_name); ?></label>
                        <input type="text" class="form-control" name="wpmp_rp_email" id="wpmp_rp_email" placeholder="Email">
                    </div>
                    <input type="hidden" name="wpmp_current_url" id="wpmp_current_url" value="<?php echo get_permalink(); ?>" />-->
                    <div class="main_reset_field">
                        <div class="form-group">
                            <label for="email"><?php _e('Phone Number', $this->plugin_name); ?></label>
                            <input type="text" class="form-control" name="wpmp_phone" id="wpmp_phone" placeholder="phone number">
                        </div>
                        <input type="hidden" name="wpmp_current_url" id="wpmp_current_url" value="<?php echo home_url(); ?>" />
                    </div>
                    
                    <div class="rest_input_field">
                        <div class="form-group">
                            <label for="email"><?php _e('Email', $this->plugin_name); ?> <span style="color:red">*</span></label>
                            <input type="text" class="form-control" name="wpmp_rp_emai" id="wpmp_rp_emai" placeholder="Email">
                        </div>
    
                        <input type="hidden" name="wpmp_current_url" id="wpmp_current_url" value="<?php echo home_url(); ?>" />
                    </div>
                    
                    <?php
                else:

                    ?>
                    <div class="form-group">
                        <label for="newpassword"><?php _e('New password', $this->plugin_name); ?></label>
                        <input type="password" class="form-control" name="wpmp_newpassword" id="wpmp_newpassword" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <label for="confrim password"><?php _e('Confirm Password', $this->plugin_name); ?> </label>
                        <input type="password" class="form-control" name="wpmp_password2" id="wpmp_password2" placeholder="Confirm Password" >
                    </div>
                    <input type="hidden" name="wpmp_rp_email" id="wpmp_rp_email" value="<?php echo $_GET['email'] ?>" />
                    <input type="hidden" name="wpmp_reset_password_token" id="wpmp_reset_password_token" value="<?php echo $_GET['wpmp_reset_password_token']; ?>" />

                <?php
                endif;

                ?>
                <?php
                // this prevent automated script for unwanted spam
                if (function_exists('wp_nonce_field'))
                    wp_nonce_field('wpmp_resetpassword_action', 'wpmp_resetpassword_nonce');

                ?>
                <button type="submit" id="primary_one" class="btn btn-primary"><?php _e($resetpassword_button_text, $this->plugin_name); ?></button>
                <button type="button" id="btnReturnToLogin" class="btn btn-primary"><a href="javascript:void(0);"><?php _e($returntologin_button_text, $this->plugin_name); ?></a></button>

            </form>

        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('.rest_input_field').hide();
    });
</script>
