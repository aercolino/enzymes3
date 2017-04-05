<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_activate_plugin() {
	Nzymes_Plugin::on_activation();

	// Without the following call to WP_Roles->reinit(), my roles were right only when read from the database.
	// If there was an empty database, like when starting tests from scratch, my nzymes.* capabilities were absent,
	// even if they had been just added with the call above!

	WP_Roles();
}

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../nzymes.php';
	add_action( 'init', '_manually_activate_plugin');
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';

