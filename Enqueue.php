<?php
namespace Inc\Base;
use \Inc\Base\BaseController;
class Enqueue extends BaseController
{
    function register() {
        add_action('admin_enqueue_scripts', array($this,'enqueue'));
    }
    
    function enqueue() {
        wp_enqueue_style('mypluginstyle_ninja', $this->plugin_url . 'assets/css/mystyle.css');
        wp_enqueue_script('mypluginjs_ninja', $this->plugin_url . 'assets/js/myscripts.js');
    }
}