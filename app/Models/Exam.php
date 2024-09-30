<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'exam_date',
        'qualification'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
