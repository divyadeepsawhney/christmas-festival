<?php
/*
Plugin Name: Christmas Festival
Plugin URI: http://www.edeepie.com/christmas-festival
Description: This plugin will help to enable effects related to Christmas festival on your WordPress website.
Version: 0.1
Author: eDeepie
Author URI: http://edeepie.com
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

/**
 * Plugin Activation
 */
function christmas_festival_activation(){
    //Enable uninstall 
    register_uninstall_hook(__FILE__,'christmas_festival_uninstall');

    //Populate Data
    update_option('christmas_festival_snow_status','OFF');
}
register_activation_hook(__FILE__,'christmas_festival_activation');

/**
 * PLugin Uninstall
 */
function christmas_festival_uninstall(){
    delete_option('christmas_festival_snow_status');
}

/**
 * Admin Menu
 */
function christmas_festival_menu(){
    add_menu_page('Christmas Festival','Christmas Festival','manage_options','christmas-festival','christmas_festival_settings_page');
}
add_action('admin_menu','christmas_festival_menu');

/**
 * Settings Page
 */
function christmas_festival_settings_page(){
    if(isset($_POST['save_settings'])){ 
        //Save the settings in the DB
        update_option('christmas_festival_snow_status','ON');
        //Show notification
        echo 'Settings Saved!';
        
    }
    echo '<form method="post">';
    echo '<h1>Welcome to Christmas Festival</h1>';
    echo 'Enable Snow Effect <input type="checkbox" id="christmas-festival-snow" />';
    echo '<br />';
    echo '<input type="submit" name="save_settings" class="button button-primary" value="Save">';
    echo '</form>';

}

/**
 * Enqueue JS Script
 */
function my_enqueue( $hook ) {
    //if( 'christmas-festival.php' != $hook ) return;
    wp_enqueue_script( 'ajax-script',
        plugins_url( '/admin/js/christmas-festival-admin.js', __FILE__ ),
        array( 'jquery' )
    );
    $title_nonce = wp_create_nonce( 'christmas_festival' );
    wp_localize_script( 'ajax-script', 'my_ajax_obj', array(
       'ajax_url' => admin_url( 'admin-ajax.php' ),
       'nonce'    => $title_nonce,
    ) );
}
add_action( 'admin_enqueue_scripts', 'my_enqueue' );

/**
 * AJAX HANDLER
 */
function my_ajax_handler() {
    check_ajax_referer( 'christmas_festival' );
    update_option('christmas_festival_snow_status','ON');
    wp_send_json_success();
}
add_action( 'wp_ajax_christmas_festival_save_settings', 'my_ajax_handler' );
