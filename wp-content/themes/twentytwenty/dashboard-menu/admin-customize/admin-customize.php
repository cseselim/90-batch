<?php 

/**
 * wp-admin top bar screen option disable.
 */
function wpb_remove_screen_options() { 
if(!current_user_can('manage_options')) {
return false;
}
return true; 
}
add_filter('screen_options_show_screen', 'wpb_remove_screen_options');


/**
 * wp-admin menu controll css for user.
 */
function wpse245372_admin_user_css() {
    $user = wp_get_current_user();
    if ( in_array( 'administrator', (array) $user->roles ) ) {
       echo '
        <style>
            #custom_help_widget{display:none}
        </style>
       ';
    } elseif ( in_array( 'editor', (array) $user->roles ) ) {
       echo '<style> 
            #menu-comments,#menu-tools,#wp-admin-bar-new-content,#wp-admin-bar-comments,#menu-media,#menu-pages,#dashboard_activity,#dashboard_right_now,#dashboard_quick_press,#dashboard_primary{
                display:none
            }
            #wpbody-content #dashboard-widgets .postbox-container {
                width: 100%;
            }
            #update-nag, .update-nag, #footer-upgrade, #wp-admin-bar-wp-logo {
              display: none;
            }
            #footer-thankyou {
                font-style: italic;
                display: none;
            }
            
       </style>';
    } elseif ( in_array( 'contributor', (array) $user->roles ) ) {
       echo '<style> 
            #menu-comments,#menu-tools,#wp-admin-bar-new-content,#wp-admin-bar-comments{
                display:none
            }
            #wpbody-content #dashboard-widgets .postbox-container {
                width: 100%;
            }
            #update-nag, .update-nag, #footer-upgrade, #wp-admin-bar-wp-logo {
                display: none;
            }
            #footer-thankyou {
                font-style: italic;
                display: none;
            }
       </style>';
    } else {
       // What Everyone Else Gets
    }
}

/*dashboard custom widged*/
require_once 'dashboard-content.php';
