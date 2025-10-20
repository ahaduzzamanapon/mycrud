<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class SeoSetting
 * @package App\Models
 * @version October 20, 2025, 2:30 pm +06
 *
 * @property string $page
 * @property string $title
 * @property string $meta_description
 * @property string $meta_keywords
 */
class SeoSetting extends Model
{
    use SoftDeletes;

    public $table = 'seo_settings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    protected $primaryKey = 'id';

    public $fillable = [
        'page',
        'title',
        'meta_description',
        'meta_keywords'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'page' => 'string',
        'title' => 'string',
        'meta_description' => 'string',
        'meta_keywords' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'page' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
