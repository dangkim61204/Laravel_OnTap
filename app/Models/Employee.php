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
        "id",
        "name",
        "email",
        "phone",
        "startDate",
        // "endDate",
        "gender",
        "position",//chức vụ
        "status",
        "department_id"

    ];
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
