<?php
/*
Plugin Name: Custom CSS
Plugin URI: http://freshface.net
Description: Add custom CSS, LESS and JS code to your WordPress site
Version: 1.4.0
Author: FRESHFACE
Author URI: http://freshface.net
Dependency: fresh-framework
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


require_once dirname(__FILE__).'/fresh-framework/framework/init/class.ffFrameworkVersionManager.php';
ffFrameworkVersionManager::getInstance()->addVersion('1.8.16', dirname(__FILE__).'/fresh-framework/framework/bootstrap.php', dirname(__FILE__).'/fresh-framework', plugin_dir_url(dirname(__FILE__).'/fresh-framework/freshplugin.php'), true );
