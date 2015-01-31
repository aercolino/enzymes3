<?php
/*
Plugin Name: Enzymes 3
Plugin URI: http://wordpress.org/extend/plugins/enzymes3/
Description: Enrich your content with custom fields and properties.
Version: 1.0
Author: Andrea Ercolino
Author URI: http://andowebsit.es/blog/noteslog.com/
License: GPLv2 or later
*/


define('ENZYMES3_PRIMARY', __FILE__);
require_once dirname( ENZYMES3_PRIMARY ) . '/src/Enzymes3/Plugin.php';

$enzymesPlugin = new Enzymes3_Plugin();
