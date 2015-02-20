<?php
/*
Plugin Name: Enzymes 3
Plugin URI: http://wordpress.org/extend/plugins/enzymes3/
Description: Boost your content injecting custom fields and properties.
Version: 1.0
Author: Andrea Ercolino
Author URI: http://andowebsit.es/blog/noteslog.com/
License: GPLv2 or later
*/

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( '<script>
    window.location.href="https://wordpress.org/plugins/enjections/";
</script>' );

define('ENZYMES3_PRIMARY', __FILE__);
require_once dirname( ENZYMES3_PRIMARY ) . '/src/Enzymes3/Plugin.php';

$enzymesPlugin = new Enzymes3_Plugin();
