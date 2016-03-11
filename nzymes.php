<?php
/*
Plugin Name: Nzymes
Plugin URI: http://wordpress.org/plugins/nzymes/
Description: Boost your content injecting custom fields and properties.
Version: 1.0
Author: Andrea Ercolino
Author URI: http://andowebsit.es/blog/noteslog.com
License: GPLv2 or later
*/

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( '<script>
    window.location.href="https://wordpress.org/plugins/nzymes/";
</script>' );

define('NZYMES_PRIMARY', __FILE__);
require_once dirname( NZYMES_PRIMARY ) . '/src/Nzymes/Plugin.php';

$enzymesPlugin = new Nzymes_Plugin();
