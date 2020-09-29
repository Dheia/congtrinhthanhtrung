<?php namespace Linkonoid\DesktopBuilder\Models;

use Model;
use Lang;
use File;
use Yaml;

/**
 * @package linkonoid\desktopbuilder
 * @author Max Barulin (https://github.com/linkonoid)
 */

class Settings extends Model
{
    public $implement = [
        'System.Behaviors.SettingsModel',
        //'RainLab.Translate.Behaviors.TranslatableModel',
    ];

    //public $translatable = [];

    public $settingsCode = 'linkonoid_desktopbuilder_settings';

    public $settingsFields = 'fields.yaml';

    public function __construct() {
        parent::__construct();
    }

    private function normalizePath($path) {
        return str_replace('\\','/',$path);
    }

    public function getTypeOptions()
    {
        return trans('linkonoid.desktopbuilder::lang.settings.fields.systray_menu.types');
    }

    public function afterSave()
    {
    	$systray_menu = [];

        if (!empty($this->value['systray_menu'])) foreach ($this->value['systray_menu'] as $key => $value) $systray_menu[] = [
	        'name' => $value['name'],
	        'type' => $value['type'],
	        'url' => $value['url'],
	        'separator' => $value['separator']
        ];

        $arr = [
	        'app_name' => $this->value['app_name'],
	        'app_url' => $this->value['app_url'],
	        'app_width' => $this->value['app_width'],
	        'app_height' => $this->value['app_height'],
	        'app_resize' => $this->value['app_resize'],
	        'tcp_port' => $this->value['tcp_port'],
	        'fastcgi_port' => $this->value['fastcgi_port'],
	        'tcp_port_rand' => $this->value['tcp_port_rand'],
	        'server_mode_enable' => $this->value['server_mode_enable'],
	        'systray_menu' => $systray_menu
        ];

		File::put('plugins/linkonoid/desktopbuilder/config/fields.yaml', Yaml::render($arr));
    }
}