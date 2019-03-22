<?php
namespace Inc\Base;
use \Inc\Base\BaseController;
class SettingsLinks extends BaseController
{
    public function register() {
        add_filter("plugin_action_links_$this->plugin_name", array($this, 'settings_link'));
    }
    
    function settings_link($links) {
        $settings_link = '<a href="options-general.php?page=ninja_plugin">Settings</a>'; // admin.php
        array_push($links,$settings_link);
        return $links;
    }
}