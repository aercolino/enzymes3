<?php
/*
Plugin Name: Nzymes
Plugin URI: http://wordpress.org/plugins/nzymes/
Description: Boost your WordPress blog with PHP injections.
Version: 1.0.0
Author: Andrea Ercolino
Author URI: http://andowebsit.es/blog/noteslog.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( '<script>
    window.location.href="https://wordpress.org/plugins/nzymes/";
</script>' );

define('NZYMES_PRIMARY', __FILE__);
require_once dirname( NZYMES_PRIMARY ) . '/src/Nzymes/Plugin.php';

$enzymesPlugin = new Nzymes_Plugin();
