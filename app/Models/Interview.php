<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $table = 'interviews';
    protected $primaryKey = 'InterviewID';
    public $timestamps = false;

    protected $fillable = [
        'ApplicationID',
        'HRStaffID',
        'DateTime',
        'Status',
        'Remarks'
    ];

    // Interview belongs to an Application
    public function application()
    {
        return $this->belongsTo(\App\Models\Application::class, 'ApplicationID', 'ApplicationID');
    }

    // Interview belongs to an HR Staff
    public function hrStaff()
    {
        return $this->belongsTo(\App\Models\HRStaff::class, 'HRStaffID', 'HRStaffID');
    }
}
