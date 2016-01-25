<?php

namespace Datacenterppnt\Hotnews;

use Backend;
use System\Classes\PluginBase;

/**
 * hotnews Plugin Information File
 */
class Plugin extends PluginBase
{
  // CKEditor is the best [with skins]!!
  // public $require = ['Shahiemseymor.Ckeditor'];

  /**
   * Returns information about this plugin.
   *
   * @return array
   */
  public function pluginDetails()
  {
    return [
        'name' => 'Hotnews',
        'description' => 'Pojedyńcze i wielokrotne wiadomości na stronie',
        'author' => 'Tomasz Nowak',
        'icon' => 'icon-fire'
    ];
  }

  /**
   * Registers any front-end components implemented in this plugin.
   *
   * @return array
   */
  public function registerComponents()
  {
    return [
        'Datacenterppnt\Hotnews\Components\hotnews' => 'cHotnews',
        'Datacenterppnt\Hotnews\Components\news' => 'cNews',
    ];
  }

  /**
   * Registers any back-end permissions used by this plugin.
   *
   * @return array
   */
  public function registerPermissions()
  {
    return [
        'datacenterppnt.hotnews.all' => [
            'tab' => 'hotnews',
            'label' => 'Zarządzanie komponentem Hotnews'
        ],
    ];
  }

  /**
   * Registers back-end navigation items for this plugin.
   *
   * @return array
   */
  public function registerNavigation()
  {
    return [
        'hotnews' => [
            'label' => 'Hotnews',
            'url' => Backend::url( 'datacenterppnt/hotnews/messages' ),
            'icon' => 'icon-fire',
            'permissions' => ['datacenterppnt.hotnews.all' ],
            'order' => 500,
            'sideMenu' => [
                'messages' => [
                    'label' => 'Hotnews',
                    'icon' => 'icon-fire',
                    'url' => Backend::url( 'datacenterppnt/hotnews/messages' ),
                    'permissions' => ['datacenterppnt.hotnews.all' ],
                ],
                'news' => [
                    'label' => 'Aktualności',
                    'icon' => 'icon-file-text-o',
                    'url' => Backend::url( 'datacenterppnt/hotnews/news' ),
                    'permissions' => ['datacenterppnt.hotnews.all' ],
                ],
            ]
        ],
    ];
  }

}
