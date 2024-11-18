<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "result_link",
        "release_date",
    ];
    protected $casts = [
        'release_date' => 'datetime', // Cast the release_date to a Carbon instance
    ];


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
