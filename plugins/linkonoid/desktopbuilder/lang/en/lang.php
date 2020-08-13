<?php return [

    'plugin' => [
        'name' => 'Desktop Builder',
        'description' => 'Makes desktop application on OctoberCMS base',
    ],

    'permissions' => [
        'tab' => 'Desktop Builder',
        'settings' => 'Settings',
    ],

    'settings' => [
    	'menu_label' => 'Base settings',
    	'menu_description' => 'Desktop App Builder base settings',
        'fields' => [
	        'app_name' => 'Application name',
	        'app_url' => 'Application Path (/appUrlPath...)',
	        'app_width' => 'Application screen width',
	        'app_height' => 'Application screen height',
	        'app_resize' => 'Application screen resize enable',
	        'tcp_port' => 'TCP application port (default: 8080)',
	        'fastcgi_port' => 'PHP FastCGI port (default: 9000)',
	        'port_rand' => 'Randomize TCP-port',
	        'port_rand_description' => 'Every time you application start. For application security.',
	        'server_mode_enable' => 'Server mode',
	        'server_mode_enable_description' => 'Mode uses for parallel works in sharing mode (local WEB-server)',
	        'systray_menu' => [
	        	'label' => 'System Tray menu',
	        	'type' => 'Tray menu type',
	        	'types' => [
		        	'url' =>'Link URL',
		        	'cmd' =>'Shell CMD',
	        	],
	        	'name' => 'Menu name',
	        	'url' => 'Shell CMD or Url (/urlPath...)',
	        	'separator' => 'Use suffix separator',
	        ]
	    ],
        'tabs' => [
	        'app' => 'Application settings',
	        'protocols' => 'Ports settings',
	        'systray' => 'Systray menu',
	    ],
    ],

];