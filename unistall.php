<?php
if(!defined('WP_UNISTALL_PLUGIN')){ die; }

delete_option( 'spfp_posttype' );
delete_site_option( 'spfp_posttype' );
delete_option( 'spfp_version' );
delete_site_option( 'spfp_version' );
delete_option( 'spfp_active' );
delete_site_option( 'spfp_active' );

unregister_post_type( 'spfp-group' );
unregister_post_type( 'spfp' );
?>
