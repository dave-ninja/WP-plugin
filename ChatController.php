<?php
namespace Inc\Base;
use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class ChatController extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();
	public $subpages = array();

    function register()
    {
	    if( ! $this->activated('chat_manager') ) return;

	    $this->settings = new SettingsApi();
	    $this->callbacks = new AdminCallbacks();
	    $this->setSubPages();
	    $this->settings->addPages($this->pages)->addSubPages($this->subpages)->register();
        //add_action('init', array($this,'activate'));
    }

	function setSubPages()
	{
		$this->subpages = array(
			array(
				'parent_slug'=> 'ninja_plugin',
				'page_title' => 'Chat',
				'menu_title' => 'Chat Manager',
				'capability' => 'manage_options',
				'menu_slug'  => 'ninja_chat',
				'callback'   => array($this->callbacks, 'chatDashboard'),
			)
		);
	}
    
    function activate() {
        $args = [
            'public'    => true,
            'labels'             => array(
    			'name'               => 'Chats',
    			'singular_name'      => 'Chat',
    			'add_new'            => 'Add new',
    			'add_new_item'       => 'Add new Ninja',
    			'edit_item'          => 'Edit Ninja',
    			'new_item'           => 'New ninja',
    			'view_item'          => 'View ninja',
    			'search_items'       => 'Search ninja',
    			'not_found'          => 'Ninja not found',
    			'not_found_in_trash' => 'In trash not found ninja',
    			'parent_item_colon'  => '',
    			'menu_name'          => 'Ninjas'
    		  ),
            'menu_icon' => 'dashicons-universal-access',
            'menu_position' => 2,
            'taxonomies' => ['category','post_tag'],
	        'has_archive' => true,
        ];
        //register_post_type('ninja',$args);
    }
}