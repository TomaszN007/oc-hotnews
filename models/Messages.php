<?php namespace Datacenterppnt\Hotnews\Models;

use Model;

/**
 * messages Model
 */
class Messages extends Model
{
  
    use \October\Rain\Database\Traits\Validation;
  
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

    public $rules = [
        'title'   => 'required|between:1,255',
        'message' => 'required',
        'status'  => 'required|between:1,3|numeric'
    ];

    public function scopePublished( $query )
    {
      $today = new \DateTime();
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