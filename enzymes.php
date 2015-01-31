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
require_once 'src/EnzymesPlugin.php';

$enzymesPlugin = new EnzymesPlugin();



// ---------------------------------------------------------------------------------------------------------------------
// The following code will allow old version 2 enzymes sequences to work exactly as they did.
// Important: put "require_once 'enzymes.2/enzymes.php';" always after "$enzymesPlugin = new EnzymesPlugin();"
require_once 'enzymes.2/enzymes.php';
// ---------------------------------------------------------------------------------------------------------------------
