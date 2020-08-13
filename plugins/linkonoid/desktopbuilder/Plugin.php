<?php namespace Linkonoid\DesktopBuilder;

use Lang;
use Backend;
use System\Classes\PluginBase;

/**
 * @package linkonoid\desktopbuilder
 * @author Max Barulin (https://github.com/linkonoid)
 */

class Plugin extends PluginBase
{

    /**
     * Register settings for this plugin.
     * These settings will be available on the settings page of October CMS.
     * @return array The available settings for this plugin.
     */
    public function registerSettings()
    {
        return [
            'settings' => [
                'label'       => Lang::get('linkonoid.desktopbuilder::lang.settings.menu_label'),
                'description' => Lang::get('linkonoid.desktopbuilder::lang.settings.menu_description'),
                'category'    => 'DesktopBuilder',
                'icon'        => 'icon-desktop',
                'class'       => 'Linkonoid\DesktopBuilder\Models\Settings',
                'order'       => 500,
                'keywords'    => 'DesktopBuilder',
                'permissions' => ['linkonoid.desktopbuilder.access_settings']
            ]
        ];
    }
}
