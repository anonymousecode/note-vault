<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Base model for MongoDB

class Note extends Model
{
    protected $fillable = ['title','content','user_id' ];

    
    protected $connection = 'mongodb';
    protected $collection = 'notes';
}
