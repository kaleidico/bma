<?php

/*
Plugin Name: MailOptin - Standard
Plugin URI: https://mailoptin.io
Description: Best lead Generation, Email Automation & Newsletter WordPress Plugin.
Version: 2.2.14.0
Author: MailOptin Team
Contributors: collizo4sky
Author URI: https://mailoptin.io
Text Domain: mailoptin
Domain Path: /languages
*/

require __DIR__ . '/vendor/autoload.php';

define('MAILOPTIN_SYSTEM_FILE_PATH', __FILE__);
define('MAILOPTIN_VERSION_NUMBER', '2.2.14.0', true);

add_action('init', 'mo_mailoptin_load_plugin_textdomain', 0);
function mo_mailoptin_load_plugin_textdomain()
{
    load_plugin_textdomain('mailoptin', false, dirname(plugin_basename(__FILE__)) . '/languages');
}

MailOptin\Core\Core::init();
MailOptin\Connections\Init::init();
MailOptin\Libsodium\Libsodium::get_instance()->init_old_standard();