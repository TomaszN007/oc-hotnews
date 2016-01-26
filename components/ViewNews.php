<?php

namespace Datacenterppnt\Hotnews\Components;

use Cms\Classes\ComponentBase;
use Datacenterppnt\Hotnews\Models\ViewNews as SingleNews;

class ViewNews extends ComponentBase
{

  /**
   * @var model
   */
  public $post;

  public function componentDetails()
  {
    return [
        'name' => 'View single news',
        'description' => 'Wyświetla strone z pojedyńczą aktualnością'
    ];
  }

  public function defineProperties()
  {
    return [
        'slug' => [
            'title' => 'Parametr wyszukiwania wiadomości',
            'description' => 'Wyświetlanie pojedyńczej aktualności',
            'default' => '{{ :slug }}',
            'type' => 'string'
        ]
    ];
  }

  public function onRun()
  {
    $this->post = SingleNews::viewSingleNews( [
                'slug' => $this->property( 'slug' )
            ] )->first();

    // #origin:
    // https://github.com/octobercms/october/issues/563#issuecomment-61360021
    
    if( $this->post === null ) // news not found hit 404 message
    {
      $this->setStatusCode(404);
      return $this->controller->run('404');
    }
    
  }

}
