<?php
function remove_menus () {
	/* Choose your prefer role for person */
    if(is_user_logged_in() && current_user_can('author')) || if (!(current_user_can('administrator')))
    {
        global $menu;
        $restricted = array(__('Downloads'),__('Contact'), __('Links'), __('Pages'), __('Appearance'), __('Tools'), __('Settings'), __('Comments'), __('Plugins'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
}
add_action('admin_menu', 'remove_menus');

function remove_menu_items_post_type() {
    if( !(current_user_can( 'administrator' ))):
        remove_menu_page( 'edit.php?post_type=post-type-name' );
    endif;
}
add_action( 'admin_menu', 'remove_menu_items_post_type' );

/* Remove Contact Form 7 Links from dashboard menu items if not admin */
if (!(current_user_can('administrator'))) {
	
	function remove_wpcf7() {
	    remove_menu_page( 'wpcf7' ); 
	}
    add_action('admin_menu', 'remove_wpcf7');
	
    function custom_menu_page_removing() {
    remove_menu_page('vc-welcome');
    }
    add_action( 'admin_init', 'custom_menu_page_removing' );
 }

// Hide wp logo
add_action( 'wp_before_admin_bar_render', function() {
global $wp_admin_bar;
$wp_admin_bar->remove_menu('wp-logo');
}, 7 );

// Hide new content in wp admin bar
function remove_new_content(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'new-content' );
}
add_action( 'wp_before_admin_bar_render', 'remove_new_content' );


?>
