 <table class="form-table">
     <tr valign="top">
    <th colspan="2">
        <h2>Register Form Settings</h2>
    </th>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Register form heading", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_signup_heading" value='<?php echo (!empty($wpmp_settings['wpmp_signup_heading'])) ? $wpmp_settings['wpmp_signup_heading'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the heading of the Register from (Default: Register)", $this->plugin_name); ?></em>


    </td>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Register button text", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_signup_button_text" value='<?php echo (!empty($wpmp_settings['wpmp_signup_button_text'])) ? $wpmp_settings['wpmp_signup_button_text'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the text of the Register button (Default: Register)", $this->plugin_name); ?></em>


    </td>
</tr>


<tr valign="top">
    <th scope="row">
        <label><?php _e("Enable captcha on registration form", $this->plugin_name); ?></label>
    </th>
    <td>

        <input  type="checkbox" name="wpmp_enable_captcha" value= '1' class='wide' <?php echo (!empty($wpmp_settings['wpmp_enable_captcha']) && $wpmp_settings['wpmp_enable_captcha'] == '1' ) ? 'checked="checked"' : ''; ?> />

        <em><?php _e("Enable captcha at the time of registration.", $this->plugin_name); ?></em>


    </td>
</tr>


<tr valign="top">
    <th colspan="2">
        <h2>Login Form Settings</h2>
    </th>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Login form heading", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_signin_heading" value='<?php echo (!empty($wpmp_settings['wpmp_signin_heading'])) ? $wpmp_settings['wpmp_signin_heading'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the heading of the Login from (Default: Login)", $this->plugin_name); ?></em>


    </td>
</tr>


<tr valign="top">
    <th scope="row">
        <label><?php _e("Login button text", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_signin_button_text" value='<?php echo (!empty($wpmp_settings['wpmp_signin_button_text'])) ? $wpmp_settings['wpmp_signin_button_text'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the text of the Login button (Default: Login)", $this->plugin_name); ?></em>


    </td>
</tr>

<tr valign="top">
    <th colspan="2">
        <h2>Reset Password Form Settings</h2>
    </th>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Reset Password form heading", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_resetpassword_heading" value='<?php echo (!empty($wpmp_settings['wpmp_resetpassword_heading'])) ? $wpmp_settings['wpmp_resetpassword_heading'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the heading of the Reset Password (Default: Reset Password)", $this->plugin_name); ?></em>


    </td>
</tr>


<tr valign="top">
    <th scope="row">
        <label><?php _e("Forgot Password button text on login form", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_forgot_password_button_text" value='<?php echo (!empty($wpmp_settings['wpmp_forgot_password_button_text'])) ? $wpmp_settings['wpmp_forgot_password_button_text'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the text of the Forgot Password button (Default: Forgot Password)", $this->plugin_name); ?></em>


    </td>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Reset Password button text on Reset Password form", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_resetpassword_button_text" value='<?php echo (!empty($wpmp_settings['wpmp_resetpassword_button_text'])) ? $wpmp_settings['wpmp_resetpassword_button_text'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the text of the Reset Password button (Default: Reset Password)", $this->plugin_name); ?></em>


    </td>
</tr>

<tr valign="top">
    <th scope="row">
        <label><?php _e("Return to Login button text on Reset Password form", $this->plugin_name); ?></label>
    </th>
    <td>
        <input type="text" name="wpmp_returntologin_button_text" value='<?php echo (!empty($wpmp_settings['wpmp_returntologin_button_text'])) ? $wpmp_settings['wpmp_returntologin_button_text'] : ''; ?>' class='wide' />
        <em><?php _e("Enter here the text of the Return to login button (Default: Return to Login)", $this->plugin_name); ?></em>


    </td>
</tr>


<tr valign="top">
    <th scope="row">
        <label><?php _e("Enable forgot password link on login form", $this->plugin_name); ?></label>
    </th>
    <td>

        <input  type="checkbox" name="wpmp_enable_forgot_password" value= '1' class='wide' <?php echo (!empty($wpmp_settings['wpmp_enable_forgot_password']) && $wpmp_settings['wpmp_enable_forgot_password'] == '1' ) ? 'checked="checked"' : ''; ?> />

        <em><?php _e("Enable forgot password link on login form.", $this->plugin_name); ?></em>


    </td>
</tr>
 </table>
