<?php

/**

* Plugin Name: WooCommerce Custom Tab Lite

* Plugin URI: http://www.phoeniixx.com/

* Description: This is not just a plugin ,Tab Manager allows you to add Multiple Tab on every Product page.

* Version: 1.0

* Author: Phoeniixx Team

* Author URI: http://www.phoeniixx.com/

* License: GPL2

*/ 
 
if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    // Put your plugin code here

ob_start();
// wp_admin_table for list of tabs

require_once('wp_table.php');
require_once('tabs.php');
require_once('add_tab.php');
require_once('all_tabs.php'); 
require_once('settings.php');   

  // add menu or sub_menu

  add_action('admin_menu','pctm_custum_tab');
	function pctm_custum_tab(){

        $page_title="Custom Tab";
        $menu_title="Tab Manager";
        $capability="manage_options";
        $menu_slug="pctm-tab-manager";
        $function=NULL;
        $icon_url=plugin_dir_url( __FILE__ )."images/logo-wp.png";
        $position="26.1";
         add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	  	 add_submenu_page( "pctm-tab-manager", "List All", "All Tabs", "manage_options", "pctm-tab-manager", "pctm_list_all" );
         add_submenu_page( "pctm-tab-manager", "Add Tab", "Add Tabs", "manage_options", "pctm-add-tab", "pctm_add_tab" );
         add_submenu_page( "pctm-tab-manager", "Settings", "Settings", "manage_options", "pctm-change-settings", "pctm_change_settings" );
         
         
	}
   
}else{
    add_action('admin_notices', 'pctm_my_plugin_admin_notices');
    function pctm_my_plugin_admin_notices() {
    if (!is_plugin_active('plugin-directory/plugin-file.php')) {
        echo "<div class='error'><p>Please active WooCommerce First To Use WooCommerce Custom Tab Manager</p></div>";
    }
}
 }

ob_clean(); 
 
 ?>