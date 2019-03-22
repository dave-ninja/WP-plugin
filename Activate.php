<?php
namespace Inc\Base;
class Activate
{
    static function plugin_activation(){
        // event
        flush_rewrite_rules();

	    $default = array();
        if( ! get_option('ninja_plugin') ) {
	        update_option( 'ninja_plugin',$default );
        }

	    if( ! get_option('ninja_plugin_cpt') ) {
		    update_option( 'ninja_plugin_cpt',$default );
	    }
    }
}