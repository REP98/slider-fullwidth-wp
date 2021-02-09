<?php

require_once 'vendor/autoload.php';
if( ! class_exists('ACF') ) {
	define('SPFP_ACF_PAHT', SPFP_PLUGIN_DIR.'/vendor/advanced-custom-fields-pro');
	define('SPFP_ACF_URL', SPFP_PLUGIN_URL.'vendor/advanced-custom-fields-pro');
	
	require_once SPFP_ACF_PAHT.'/acf.php';
	
	/**
	 * SETTINGS
	 */
	add_filter( 'acf/settings/url', 'spfp_setting_acf');
	add_filter( 'acf/settings/path', 'spfp_setting_acf_path');
	add_filter( 'acf/settings/save_json', 'spfp_setting_json_save' );
	add_filter( 'acf/settings/load_json', 'spfp_setting_json_load' );

	function spfp_setting_acf($url) { return SPFP_ACF_URL."/"; }
	function spfp_setting_acf_path($path) { return SPFP_ACF_PAHT."/"; }
	function spfp_setting_json_save($path) { return SPFP_DIR_ASSET.'/acf'; }
	function spfp_setting_json_load($path) { 
		$path[] =  SPFP_DIR_ASSET.'/acf'; 
		return $path;
	}

}

require_once SPFP_PLUGIN_DIR.'/lib/admin/core.php';
require_once SPFP_PLUGIN_DIR.'/lib/admin/acf.php';

?>
