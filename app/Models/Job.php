<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table = "job_listing";

    protected $fillable = [
        'title', 
        'organization', 
        'job_type', 
        'location', 
        'eligibility', 
        'vacancies', 
        'application_start_date', 
        'application_end_date', 
        'job_status'
    ];

    protected $casts = [
        'application_start_date' => 'date',
        'application_end_date' => 'date',
    ];


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
