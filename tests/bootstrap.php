<?php

global $_project_dir;
$_project_dir = dirname(__DIR__);
require_once "$_project_dir/vendor/autoload.php";

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once "$_tests_dir/includes/functions.php";

function _manually_activate_plugin() {
	Nzymes_Plugin::on_activation();

    echo "\nnzymes:";

    global $wp_version;
    echo "\n  - WP_Version: $wp_version";
    echo "\n  - Roles: " . join(', ', wp_roles()->get_names() );
    echo "\n  - Administrator Capabilities: " . join(', ', array_keys(array_filter(get_role('administrator')->capabilities)));

    echo "\n  - " . Nzymes_Plugin::$options->name() . ": " . print_r(Nzymes_Plugin::$options->get(), true);
}

function _manually_load_plugin() {
    global $_project_dir;
	require "$_project_dir/nzymes.php";
	add_action( 'init', '_manually_activate_plugin');
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require "$_tests_dir/includes/bootstrap.php";
