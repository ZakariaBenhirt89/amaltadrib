<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "provider",
        "start",
        "end",
        "supervisor",
        "supervisor_email",
        "supervisor_phone",
        "goals",
        "guidlines",
        "students_id"
    ];

    /**
     * Get the Student that owns the Internship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Student()
    {
        return $this->belongsTo(Student::class, 'students_id', 'id');
    }
}
