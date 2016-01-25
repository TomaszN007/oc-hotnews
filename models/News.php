<?php namespace Datacenterppnt\Hotnews\Models;

use Model;

/**
 * news Model
 */
class News extends Model
{

    use \October\Rain\Database\Traits\Sluggable;
    use \October\Rain\Database\Traits\Validation;
    
    /**
     * @var string The database table used by the model.
     */
    public $table = 'datacenterppnt_hotnews_news';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    public $rules = [
        'title'   => 'required|between:1,150',
        'slug'    => ['between:1,150', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i'],
        'small_content' => 'required',
        'status'  => 'required|between:1,3|numeric'
    ];
    
    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    protected $slugs = ['slug' => 'title'];

    protected $dates = ['published_at'];

    public function beforeCreate()
    {
        $this->statistics = 0;

        if ($this->published_at == '') {
            $this->published_at = date('Y-m-d H:i:00');
        }
    }
    
}