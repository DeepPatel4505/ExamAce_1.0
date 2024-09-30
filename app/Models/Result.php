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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
