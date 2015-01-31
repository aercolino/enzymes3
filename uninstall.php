<?php

if (basename(dirname(__FILE__)) != dirname(WP_UNINSTALL_PLUGIN))
{
    return;
}

require dirname(__FILE__) . '/src/Enzymes3/Plugin.php';
Enzymes3_Plugin::on_uninstall();
