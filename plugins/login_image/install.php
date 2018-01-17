<?php

$plugin = rex_plugin::get('klxm_defaults', 'login_image');

if (!$plugin->hasConfig()) {
    $plugin->setConfig('bild', 'out5_login_image.jpg');
    $plugin->setConfig('status', 'deaktiviert');    
}
