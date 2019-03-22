<?php
namespace Inc\Base;
class Deactivate
{
    static function plugin_deactivation(){
        // event
        flush_rewrite_rules();
    }
}