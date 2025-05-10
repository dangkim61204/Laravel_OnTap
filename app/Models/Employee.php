<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        "full_name",
        "email",
        "phone",
        "startDate",
        "gender",
        "position",//chức vụ
        "status",
        "department_id"

    ];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function workSchedules()
    {
        return $this->hasMany(shift::class);
    }

    public function timekeepings()
    {
        return $this->hasMany(Timekeeping::class);
    }

    public function dayOffs()
    {
        return $this->hasMany(DayOff::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }
}
