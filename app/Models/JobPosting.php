<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    protected $table = 'job_postings'; // ✅ matches your actual table name
    protected $primaryKey = 'JobPostingID'; // ✅ matches your PK
    public $timestamps = true; // ✅ because you have created_at and updated_at

    protected $fillable = [
        'Title',
        'Department',
        'Requirements',
        'Status',
    ];
}
