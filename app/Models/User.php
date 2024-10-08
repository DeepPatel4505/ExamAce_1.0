<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    use HasFactory, Notifiable; // Use Notifiable trait for password reset notifications, etc.

    protected $fillable = [
        'username',
        'firstName',
        'lastName',
        'email',
        'password',
        'age',
        'preference',
        'qualification',
    ];

    protected $casts = [
        'preference' => 'array', 
    ];

    protected $hidden = [
        'password', 
        'remember_token', 
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

