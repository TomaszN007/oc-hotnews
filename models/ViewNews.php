<?php

namespace Datacenterppnt\Hotnews\Models;

use Model;

/**
 * viewNews Model
 */
class ViewNews extends Model
{

  /**
   * @var string The database table used by the model.
   */
  public $table = 'datacenterppnt_hotnews_news';

  /**
   * @var array Guarded fields
   */
  protected $guarded = ['*' ];

  /**
   * @var array Fillable fields
   */
  protected $fillable = [ ];

  /**
   * @var datetime
   */
  protected $dates = ['published_at' ];

  /**
   *  Function : scopeViewBySlug
   *  
   *  @param object
   */
  public function scopeViewSingleNews( $query, $option )
  {
    if ( in_array( 'slug', $option ) )
    {
      $today = new \DateTime();

      return $query
                      ->where( 'slug', $option['slug'] )
                      ->where( 'status', '=', 1 )
                      ->where( 'published_at', '<', $today->format( 'Y-m-d H:i:s' ) );
    }
  }

}
