<?php
/*
Plugin Name: Banner Ads Rotator
Plugin URI: http://pickplugins.com
Description: Usefull banenr ads rotator.
Version: 1.0.1
Author: paratheme, pickplugins
Author URI: http://paratheme.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

define('bar_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
define('bar_plugin_dir', plugin_dir_path( __FILE__ ) );
define('bar_wp_url', 'https://wordpress.org/plugins/banner-ads-rotator/' );
define('bar_wp_reviews_url', 'http://wordpress.org/support/view/plugin-reviews/banner-ads-rotator' );
define('bar_pro_url','http://pickplugins.com/' );
define('bar_demo_url', 'http://www.pickplugins.com/demo/banner-ads-rotator/' );
define('bar_conatct_url', 'http://pickplugins.com/contact' );
define('bar_qa_url', 'http://pickplugins.com/qa/' );
define('bar_plugin_name', 'Banner Ads Rotator' );
define('bar_share_url', 'https://wordpress.org/plugins/banner-ads-rotator/' );
define('bar_tutorial_video_url', '//www.youtube.com/embed/8OiNCDavSQg?rel=0' );

require_once( plugin_dir_path( __FILE__ ) . 'includes/bar-meta.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/bar-functions.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/Browser.php');
require_once( plugin_dir_path( __FILE__ ) . 'includes/geoplugin.class.php');




function bar_init_scripts()
	{

		wp_enqueue_script('jquery');
		
		wp_enqueue_script('bar_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'bar_js', 'bar_ajax', array( 'bar_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('bar_style', bar_plugin_url.'css/style.css');		
	
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'bar_color_picker', plugins_url('/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );



		//ParaAdmin
		wp_enqueue_style('ParaAdmin', bar_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_style('ParaDashboard', bar_plugin_url.'ParaAdmin/css/ParaDashboard.css');		
		//wp_enqueue_style('ParaIcons', bar_plugin_url.'ParaAdmin/css/ParaIcons.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));

		
		
		
	}
add_action("init","bar_init_scripts");


register_activation_hook(__FILE__, 'bar_activation');


function bar_activation()
	{
		$bar_version= "1.0";
		update_option('bar_version', $bar_version); //update plugin version.
		
		$bar_customer_type= "free"; //customer_type "pro"
		update_option('bar_customer_type', $bar_customer_type); //update plugin version.
		
		
		
	global $wpdb;
        $sql = "CREATE TABLE IF NOT EXISTS " . $wpdb->prefix . "bar_info"
                 ."( UNIQUE KEY id (id),
					id int(100) NOT NULL AUTO_INCREMENT,
					bannerid  int(10) NOT NULL,
					event  VARCHAR( 50 ) NOT NULL,
					date  DATE NOT NULL,
					time  TIME NOT NULL,
					city  VARCHAR( 50 ) NOT NULL,
					country  VARCHAR( 50 ) NOT NULL,
					browser  VARCHAR( 50 ) NOT NULL,
					platform  VARCHAR( 50 ) NOT NULL
					
					)";
		$wpdb->query($sql);
		
		
		
		
		
		
		
		
		
		
	}

add_filter('widget_text', 'do_shortcode');

add_action('admin_menu', 'bar_menu_init');


	
function bar_menu_settings(){
	include('bar-settings.php');	
}





function bar_menu_init()
	{
		
		add_submenu_page('edit.php?post_type=ads_banner', __('Help & Upgrade','menu-wpt'), __('Help & Upgrade','menu-wpt'), 'manage_options', 'bar_menu_settings', 'bar_menu_settings');

	}





?>