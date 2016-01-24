<?php

namespace Datacenterppnt\Hotnews;

use Backend;
use System\Classes\PluginBase;

/**
 * hotnews Plugin Information File
 */
class Plugin extends PluginBase
{

  /**
   * Returns information about this plugin.
   *
   * @return array
   */
  public function pluginDetails()
  {
    return [
        'name' => 'hotnews',
        'description' => 'Pojedyńcze/Wielokrotne wiadomości wyświetlane na stronie',
        'author' => 'datacenterppnt',
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
            'label' => 'Zarzadzanie hotnews\'ami'
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
            ]
        ],
    ];
  }

}
