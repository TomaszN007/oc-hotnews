<?php namespace Datacenterppnt\Hotnews\Models;

use Model;

/**
 * messages Model
 */
class Messages extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'datacenterppnt_hotnews_messages';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];
    
    protected $dates = ['published_at'];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function scopePublished( $query )
    {
      $today = new \DateTime();
      $today->setTimezone(new \DateTimeZone('Europe/Warsaw'));      
      
      return $query
              ->where( 'status', '=', 1 )
              ->where( 'published_at', '<', $today->format( 'Y-m-d H:i:s' ) );
    }
    
    public function beforeCreate()
    {
        if ($this->published_at == '') {
            $this->published_at = date('Y-m-d H:i:00');
        }
    }
}