<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'graphical_console';
$app['version'] = '2.3.20';
$app['release'] = '1';
$app['vendor'] = 'ClearFoundation';
$app['packager'] = 'ClearFoundation';
$app['license'] = 'GPLv3';
$app['license_core'] = 'LGPLv3';
$app['description'] = lang('graphical_console_app_description');
$app['inline_help'] = array(
    lang('graphical_console_browser_warning') => lang('graphical_console_browser_warning_help'),
    lang('graphical_console_what_next') => lang('graphical_console_what_next_help'),
    lang('graphical_console_command_line') => lang('graphical_console_command_line_help'),
);

/////////////////////////////////////////////////////////////////////////////
// App name and categories
/////////////////////////////////////////////////////////////////////////////

$app['name'] = lang('graphical_console_app_name');
$app['category'] = lang('base_category_system');
$app['subcategory'] = lang('base_subcategory_settings');
$app['menu_enabled'] = FALSE;

/////////////////////////////////////////////////////////////////////////////
// Packaging
/////////////////////////////////////////////////////////////////////////////

$app['requires'] = array(
    'app-network',
);

$app['core_requires'] = array(
    'clearos-console',
    'dbus-x11',
    'gconsole',
    'ratpoison',
    'urw-fonts',
    'xorg-x11-drivers',
    'xorg-x11-server-Xorg',
    'xorg-x11-xinit',
);

$app['core_file_manifest'] = array( 
   'graphical_console' => array('target' => '/var/clearos/base/access_control/public/graphical_console'),
   'hushlogin' => array('target' => '/var/lib/clearconsole/.hushlogin'),
   'xinitrc' => array('target' => '/var/lib/clearconsole/.xinitrc'),
   'Xdefaults' => array('target' => '/var/lib/clearconsole/.Xdefaults'),
);
