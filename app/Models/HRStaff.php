<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HRStaff extends Model
{
    protected $table = 'hr_staff';
    protected $primaryKey = 'HRStaffID';
    public $timestamps = true;

    protected $fillable = [
        'Name',
        'Email',
        'Department',
        'Role',
        'Status',
        'Remarks',
    ];
}
