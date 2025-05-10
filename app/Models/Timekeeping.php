<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timekeeping extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'check_in',
        'check_out',
        'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
