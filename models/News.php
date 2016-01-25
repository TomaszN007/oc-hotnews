<?php

namespace Datacenterppnt\Hotnews\Models;

use Model;

/**
 * news Model
 */
class News extends Model
{

  use \October\Rain\Database\Traits\Sluggable,
      \October\Rain\Database\Traits\Validation;

  /**
   * @var string The database table used by the model.
   */
  public $table = 'datacenterppnt_hotnews_news';

  /**
   * @var array Guarded fields
   */
  protected $guarded = ['*' ];
  
  /**
   * @var array $rules field validation
   */
  public $rules = [
      'title' => 'required|between:1,150',
      'slug' => ['between:1,150', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i' ],
      'small_content' => 'required',
      'status' => 'required|between:1,3|numeric'
  ];

  /**
   * @var array Fillable fields
   */
  protected $fillable = [ ];
  
  /**
   * @var array slug creation
   */
  protected $slugs = ['slug' => 'title' ];
  
  /**
   * @var datetime
   */
  protected $dates = ['published_at' ];

  /**
   * 
   * @param object $query
   * @return object
   */
  public function scopePublished( $query )
  {
    $today = new \DateTime();
    return $query
                    ->where( 'status', '=', 1 )
                    ->where( 'published_at', '<', $today->format( 'Y-m-d H:i:s' ) );
  }

  public function beforeCreate()
  {
    if ( $this->published_at == '' )
    {
      $this->published_at = date( 'Y-m-d H:i:00' );
    }
  }

  public function scopeViewNews( $query, $options )
  {
    extract( array_merge( [
        'page' => 1,
        'perPage' => 10
                    ], $options ) );

    return $query->paginate( $perPage, $page );
  }

}
