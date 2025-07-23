<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // Base model for MongoDB
use MongoDB\Laravel\Auth\User as Authenticatable; // MongoDB user authentication
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $connection = 'mongodb';
    protected $collection = 'users';

    protected $fillable = [
        'name',
        'email',
        'security',
        'answer',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
