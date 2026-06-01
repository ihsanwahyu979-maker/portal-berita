<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mongodb';
    
    /**
     * The collection associated with the model.
     *
     * @var string
     */
    protected $collection = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'region',
        'category',
        'image_url',
        'author_name',
        'view_count',
        'is_featured',
        'tags',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'view_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tags' => 'array',
    ];
}
