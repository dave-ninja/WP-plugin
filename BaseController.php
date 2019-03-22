<?php
namespace Inc\Base;

class BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin_name;
    public $managers = array();

    function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
        $this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
        $this->plugin_name = plugin_basename( dirname( __FILE__, 3 ) . '/ninja.php' );

        $this->managers = array(
        	'cpt_manager' => 'Activate CPT Manager',
	        'taxonomy_manager' => 'Activate Taxonomy Manager',
	        'media_widget' => 'Activate Media Widget',
	        'gallery_manager' => 'Activate Gallery Manager',
	        'testimonial_manager' => 'Activate Testimonial Manager',
	        'templates_manager' => 'Activate Templates Manager',
	        'login_manager' => 'Activate Ajax Login/Signup',
	        'membership_manager' => 'Activate Membership Manager',
	        'chat_manager' => 'Activate Chat Manager'
        );


    }

    public function activated(string $data)
	{
		$option = get_option( 'ninja_plugin' );
		return isset( $option[$data] ) ? $option[$data] : false;
	}
    
    protected static function dd($data){
        echo "<pre>";
            print_r($data);
        echo "</pre>";
        die();
    }
    
    protected static function dump($data){
        echo "<pre>";
            print_r($data);
        echo "</pre>";
    }
}