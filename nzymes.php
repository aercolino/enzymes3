<?php
/*
Plugin Name: Nzymes
Plugin URI: http://wordpress.org/plugins/nzymes/
Description: Boost your blog with safe PHP injections. <a href="https://github.com/aercolino/nzymes/blob/master/nzymes-manual.md">Documentation</a> | <a href="https://www.paypal.me/AndreaErcolino"><strong>Donate</strong></a>
Version: 1.0.0
Author: Andrea Ercolino
Author URI: http://github.com/aercolino
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {License URI}.
*/

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( '<script>
    window.location.href="https://wordpress.org/plugins/nzymes/";
</script>' );

define('NZYMES_VERSION', '1.0.0');
define('NZYMES_PRIMARY', __FILE__);
require_once dirname( NZYMES_PRIMARY ) . '/src/Nzymes/Plugin.php';

$nzymesPlugin = new Nzymes_Plugin();
