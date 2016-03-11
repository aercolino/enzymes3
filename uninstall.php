<?php

if (basename(dirname(__FILE__)) != dirname(WP_UNINSTALL_PLUGIN))
{
    return;
}

require dirname(__FILE__) . '/src/Nzymes/Plugin.php';
Nzymes_Plugin::on_uninstall();
