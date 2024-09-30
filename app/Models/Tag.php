<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function result()
    {
        return $this->belongsToMany(Result::class);
    }

    public function job()
    {
        return $this->belongsToMany(Job::class);
    }
    
    public function exam()
    {
        return $this->belongsToMany(Exam::class);
    }


}
