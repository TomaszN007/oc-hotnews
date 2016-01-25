<?php

namespace Datacenterppnt\Hotnews\Components;

use Cms\Classes\ComponentBase;
use Datacenterppnt\Hotnews\Models\News as NewsModel;
use Cms\Classes\Page;
use Redirect;

class News extends ComponentBase
{

  public $news;
  
  public function componentDetails()
  {
    return [
        'name' => 'Aktualności',
        'description' => 'Wyświetlanie aktualności na stronie'
    ];
  }

  public function defineProperties()
  {
    return [
        'pageNumber' => [
            'title' => 'Identyfikator aktualności',
            'description' => 'Zmienna to listowania aktualności na stronie',
            'type' => 'string',
            'default' => '{{ :page }}'
        ],
        'postsPerPage' => [
            'title' => 'Ilośc aktualności na stornie',
            'type' => 'string',
            'validationPattern' => '^[0-9]+$',
            'validationMessage' => 'Wpisz wartośc liczbową',
            'default' => '10'
        ],
        'noPostsMessage' => [
            'title' => 'Komunikato o braku stron',
            'type' => 'string',
            'default' => 'Brak aktualaności',
            'showExternalParam' => false
        ],
        'postPage' => [
            'title' => 'Strona która wyświetla aktualność',
            'description' => 'Wskaż stronę, która będzie pokazywała pojedyńczą aktualność',
            'type' => 'dropdown',
            'default' => 'news/post'
        ]
    ];
  }

  public function getPostPageOptions()
  {
    return Page::sortBy( 'baseFileName' )->lists( 'baseFileName', 'baseFileName' );
  }

  public function onRun()
  {
    $this->page['postPage'] = $this->property('postPage');
    $this->page['pageParam'] = $this->paramName('pageNumber');
    $this->page['noPostsMessage'] = $this->property('noPostsMessage');
    
    $this->news = $this->page['news'] = NewsModel::published()->viewNews( [
            'page'    => $this->property('pageNumber'),
            'perPage' => $this->property('postsPerPage')
    ] );
    
    if ($pageNumberParam = $this->paramName('pageNumber')) {
        $currentPage = $this->property('pageNumber');

        if ($currentPage > ($lastPage = $this->news->lastPage()) && $currentPage > 1) {
            return Redirect::to($this->currentPageUrl([$pageNumberParam => $lastPage]));
        }
    }
  }

  function news()
  {
    return $this->news;
  }

}
