<?php
/**
 * Provide a public-facing view for the plugin
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
<style>
    .glyphicon-ok,.glyphicon-remove{
        display:none !important;
    }
</style>
<div id="wpmpRegisterSection" class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-8 col-md-12"> 
            <?php
            $wpmp_form_settings = get_option('wpmp_form_settings');
            $form_heading = empty($wpmp_form_settings['wpmp_signup_heading']) ? 'Register' : $wpmp_form_settings['wpmp_signup_heading'];

            // check if the user already login
            if (!is_user_logged_in()) :

                ?>

                <form name="wpmpRegisterForm" id="wpmpRegisterForm" method="post" enctype="multipart/form-data">
                    <!--<h3><?php _e($form_heading, $this->plugin_name); ?></h3>-->

                    <div id="wpmp-reg-loader-info" class="wpmp-loader" style="display:none;">
                        <img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__)); ?>"/>
                        <span><?php _e('Please wait ...', $this->plugin_name); ?></span>
                    </div>
                    <div id="wpmp-register-alert" class="alert alert-danger" role="alert" style="display:none;"><p style="float: left;margin-right: 14px;"></p> <a href="<?= home_url() ?>" >Click here to login</a></div>
                    <?php if ($token_verification): ?>
                        <div class="alert alert-info" role="alert"><?php _e('Your account has been activated, you can login now.', $this->plugin_name); ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="name"><?php _e('Name', $this->plugin_name); ?> <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="wpmp_fname" id="wpmp_fname" placeholder="User Name" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="phone"><?php _e('Mobile No', $this->plugin_name); ?> <span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="wpmp_username" id="wpmp_username" placeholder="Mobile No" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="other_school" name="school_name" style="font-size: 19px !important;height: 42px;margin-top: 22px;">
                            <option value="">Select School</option>
                            <option value="Adarsha School Narayanganj">Adarsha School Narayanganj </option>
                            <option value="Narayanganj High School">Narayanganj High School </option>
                            <option value="IET High School">IET High School</option>
                            <option value="Bar Academy">Bar Academy </option>
                            <option value="Govt. Girls High School">Govt. Girls High School </option>
                            <option value="Amlapara Girls High School">Amlapara Girls High School</option>
                            <option value="Joy Gobindo High School">Joy Gobindo High School </option>
                            <option value="BM Union High School">BM Union High School </option>
                            <option value="Morgan Girls High School">Morgan Girls High School</option>
                            <option value="Bibi Mariam High School">Bibi Mariam High School</option>
                            <option value="Horihor Para High School">Horihor Para High School</option>
                            <option value="Gono Bidya Niketon">Gono Bidya Niketon</option>
                            <option value="Adarsha Balika Uccho Biddalaya">Adarsha Balika Uccho Biddalaya</option>
                            <option value="Others">Others (Please mention your school name)</option>
                        </select>
                    </div>

                    <div class="form-group" id="other_school_field" style="display: none;">
                        <label for="phone">School Name<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="other_school_name" id="other_school_name" placeholder="School name" autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <label for="email"><?php _e('Email', $this->plugin_name); ?><span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="wpmp_email" id="wpmp_email" placeholder="Email" autocomplete="off">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Present Address:<span style="color:red">*</span></label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Present Address" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="file"><?php _e('Profile Image', $this->plugin_name); ?></label>
                        <input type="file" class="form-control" name="wpmp_pic" id="wpmp_pic" style="width: 35%;">
                    </div>

                    <div class="form-group">
                        <label for="password"><?php _e('Password', $this->plugin_name); ?> <span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="wpmp_password" id="wpmp_password" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="confrim password"><?php _e('Confirm Password', $this->plugin_name); ?> <span style="color:red">*</span></label>
                        <input type="password" class="form-control" name="wpmp_password2" id="wpmp_password2" placeholder="Confirm Password" >
                    </div>
                    

                    <?php if ($wpmp_form_settings['wpmp_enable_captcha'] == '1') { ?>
                        <div class="form-group">
                            <label class="control-label" id="captchaOperation"></label>

                            <input type="text" placeholder="Captcha answer" class="form-control" name="wpmp_captcha" />

                        </div>
                    <?php } ?>

                    <input type="hidden" name="wpmp_current_url" id="wpmp_current_url" value="<?php echo get_permalink(); ?>" />
                    <input type="hidden" name="redirection_url" id="redirection_url" value="<?php echo get_permalink(); ?>" />

                    <?php
                    // this prevent automated script for unwanted spam
                    if (function_exists('wp_nonce_field'))
                        wp_nonce_field('wpmp_register_action', 'wpmp_register_nonce');

                    ?>
                    <button type="submit" class="btn btn-primary" style="padding: 6px 18px;font-size: 19px;background:#46BE52;border:1px solid #46BE52">
                        <?php
                        $submit_button_text = empty($wpmp_form_settings['wpmp_signup_button_text']) ? 'Register' : $wpmp_form_settings['wpmp_signup_button_text'];
                        _e($submit_button_text, $this->plugin_name);

                        ?></button>
                </form>
                <?php
            else:
                $current_user = wp_get_current_user();
                $logout_redirect = (empty($wpmp_form_settings['wpmp_logout_redirect']) || $wpmp_form_settings['wpmp_logout_redirect'] == '-1') ? '' : $wpmp_form_settings['wpmp_logout_redirect'];

                echo 'Logged in as <strong>' . ucfirst($current_user->user_login) . '</strong>. <a href="' . wp_logout_url(get_permalink($logout_redirect)) . '">Log out ? </a>';
            endif;

            ?>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function(){
        jQuery('#other_school').change(function(){
            var name = jQuery(this).val();
            if (name == 'Others') {
                jQuery('#other_school_field').show();
            }else{
                jQuery('#other_school_field').hide();
            }
        })
    })
jQuery(document).on('click','.fa-calendar',function(){
   jQuery('#wpmp_date').focus();
});
</script>
