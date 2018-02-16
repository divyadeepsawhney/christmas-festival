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
    echo "<h1>Welcome to Christmas Festival</h1>";

    echo '<input type="submit" name="save_settings" class="button button-primary" value="Save">';


}

