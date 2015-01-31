<?php

if (basename(dirname(__FILE__)) != dirname(WP_UNINSTALL_PLUGIN))
{
    return;
}

require 'src/Enzymes3Plugin.php';
Enzymes3Plugin::on_uninstall();
