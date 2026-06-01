<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Submission extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'submissions';

    protected $fillable = [
        'title',
        'content',
        'author_name',
        'email',
        'phone',
        'image_url',
        'status', // pending, approved, rejected
    ];
}
