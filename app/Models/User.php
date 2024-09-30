<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

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
        'preference' => 'array', // Cast 'preference' field as array
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
