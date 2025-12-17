<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $primaryKey = 'ApplicationID';
    public $timestamps = false;

    protected $fillable = [
        'ApplicantID',
        'JobPostingID',
        'ApplicationDate',
        'Status',
        'Remarks'
    ];

    // Relationship: Application belongs to an Applicant
    public function applicant()
    {
        return $this->belongsTo(\App\Models\Applicant::class, 'ApplicantID', 'ApplicantID');
    }

    // Relationship: Application belongs to a Job Posting
    public function jobPosting()
    {
        return $this->belongsTo(\App\Models\JobPosting::class, 'JobPostingID', 'JobPostingID');
    }
}
