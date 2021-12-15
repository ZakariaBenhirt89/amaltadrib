<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "salary",
        "position",
        "provider",
        "location",
        "supervisor",
        "supervisor_email",
        "supervisor_phone",
        "start",
        "end",
        "contract_type",
        "description",
        "students_id"
    ];
}
