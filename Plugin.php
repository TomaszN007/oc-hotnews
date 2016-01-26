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
        'description' => 'datacenterppnt.hotnews::lang.plugin.description',//  Pojedyńcze i wielokrotne wiadomości na stronie',
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
            'tab' => 'datacenterppnt.hotnews::lang.plugin.premission_hotnews_all_title',
            'label' => 'datacenterppnt.hotnews::lang.plugin.premission_hotnews_all'
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
            'label' => 'datacenterppnt.hotnews::lang.plugin.menu_hotnews',
            'url' => Backend::url( 'datacenterppnt/hotnews/messages' ),
            'icon' => 'icon-fire',
            'permissions' => ['datacenterppnt.hotnews.all' ],
            'order' => 500,
            'sideMenu' => [
                'messages' => [
                    'label' => 'datacenterppnt.hotnews::lang.plugin.menu_hotnews',
                    'icon' => 'icon-fire',
                    'url' => Backend::url( 'datacenterppnt/hotnews/messages' ),
                    'permissions' => ['datacenterppnt.hotnews.all' ],
                ],
                'news' => [
                    'label' => 'datacenterppnt.hotnews::lang.plugin.menu_news',
                    'icon' => 'icon-file-text-o',
                    'url' => Backend::url( 'datacenterppnt/hotnews/news' ),
                    'permissions' => ['datacenterppnt.hotnews.all' ],
                ],
            ]
        ],
    ];
  }

}
