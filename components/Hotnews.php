<?php

namespace Datacenterppnt\Hotnews\Components;

use Cms\Classes\ComponentBase;
use Datacenterppnt\Hotnews\Models\Messages;

class Hotnews extends ComponentBase
{

  public function componentDetails()
  {
    return [
        'name' => 'Hotnews Component',
        'description' => 'Wyświetla najważniejsze wiadomości'
    ];
  }

  public function defineProperties()
  {
    return [
        'maxItems' => [
            'title' => 'Wyświetl maksymalnie',
            'description' => 'Ile elementów ma zostać wyświetlonych',
            'default' => 1,
            'type' => 'string',
            'validationPattern' => '^[0-9]+$',
            'validationMessage' => 'The Max Items property can contain only numeric symbols'
        ]
    ];
  }
  
  /**
   *  Function : messages
   *  
   *  @return array
   */
  public function messages()
  {
    return Messages::published()
            ->orderBy( 'published_at', 'desc' )
            ->take( $this->property( 'maxItems', 1 ) )
            ->get();
  }

}
