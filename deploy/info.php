<?php

/////////////////////////////////////////////////////////////////////////////
// General information
/////////////////////////////////////////////////////////////////////////////

$app['basename'] = 'graphical_console';
$app['version'] = '2.4.0';
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
    'google-noto-kufi-arabic-fonts',
    'google-noto-sans-armenian-fonts',
    'google-noto-sans-bengali-fonts',
    'google-noto-sans-bengali-ui-fonts',
    'google-noto-sans-devanagari-fonts', // Hindi
    'google-noto-sans-devanagari-ui-fonts',
    'google-noto-sans-georgian-fonts',
    'google-noto-sans-gujarati-fonts',
    'google-noto-sans-gujarati-ui-fonts',
    'google-noto-sans-gurmukhi-fonts', // Panjabi
    'google-noto-sans-gurmukhi-ui-fonts',
    'google-noto-sans-hebrew-fonts',
    'google-noto-sans-kannada-fonts',
    'google-noto-sans-kannada-ui-fonts',
    'google-noto-sans-khmer-fonts',
    'google-noto-sans-khmer-ui-fonts',
    'google-noto-sans-korean-fonts',
    'google-noto-sans-lao-fonts',
    'google-noto-sans-lao-ui-fonts',
    'google-noto-sans-malayalam-fonts',
    'google-noto-sans-malayalam-ui-fonts',
    'google-noto-sans-myanmar-fonts',
    'google-noto-sans-myanmar-ui-fonts',
    'google-noto-sans-simplified-chinese-fonts',
    'google-noto-sans-sinhala-fonts',
    'google-noto-sans-tamil-fonts',
    'google-noto-sans-tamil-ui-fonts',
    'google-noto-sans-telugu-fonts',
    'google-noto-sans-telugu-ui-fonts',
    'google-noto-sans-thai-fonts',
    'google-noto-sans-thai-ui-fonts',
    'google-noto-serif-armenian-fonts',
    'google-noto-serif-georgian-fonts',
    'google-noto-serif-khmer-fonts',
    'google-noto-serif-lao-fonts',
    'google-noto-serif-thai-fonts',
    'google-noto-serif-fonts'
);

$app['core_file_manifest'] = array( 
   'graphical_console' => array('target' => '/var/clearos/base/access_control/public/graphical_console'),
   'hushlogin' => array('target' => '/var/lib/clearconsole/.hushlogin'),
   'xinitrc' => array('target' => '/var/lib/clearconsole/.xinitrc'),
   'Xdefaults' => array('target' => '/var/lib/clearconsole/.Xdefaults'),
);
