<?php
/*
Plugin Name: Slider Post Full Page
Plugin URI: https://svilupporep.site/spfp
Description: Slider Post Pantalla completa.
Author: Robert Pérez
Author URI: https://svilupporep.site/robertperez
Text Domain: spfp
Domain Path: /languages/
Version: 0.0.9
*/

/**
 * DEFINE
 */
define( 'SPFP_VERSION', '0.0.7' );

define( 'SPFP_REQUIRED_WP_VERSION', '5.4' );

define( 'SPFP_TEXT_DOMAIN', 'spfp' );

define( 'SPFP_PLUGIN', __FILE__ );

define( 'SPFP_PLUGIN_BASENAME', plugin_basename( SPFP_PLUGIN ) );

define( 'SPFP_PLUGIN_NAME', trim( dirname( SPFP_PLUGIN_BASENAME ), '/' ) );

define( 'SPFP_PLUGIN_DIR',  dirname( SPFP_PLUGIN ) );

define( 'SPFP_PLUGIN_URL',  plugin_dir_url( __FILE__ ) );

define( 'SPFP_DIR_ASSET',  dirname( SPFP_PLUGIN ).'/assets'  );
define( 'SPFP_DIR_ASSET_VIEW', SPFP_DIR_ASSET.'/html' );
define( 'SPFP_DIR_ASSET_VIEWCACHE', SPFP_DIR_ASSET.'/viewcache' );
define( 'SPFP_DIR_ASSET_MEDIA', SPFP_DIR_ASSET.'/multimedia' );



require_once 'loader.php';

register_activation_hook( SPFP_PLUGIN, 'spfp_add_hook' );
function spfp_add_hook(){
	add_option( 'spfp_version', '0.0.7');
	add_option( 'spfp_posttype', 'spfp-group,spfp');
	add_option( 'spfp_active', 'true');
	load_plugin_textdomain( SPFP_TEXT_DOMAIN, false, plugin_dir_path( __FILE__ ) );
}


?>
