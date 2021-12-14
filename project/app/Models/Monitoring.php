<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    use HasFactory;


    protected $fillable = [
        "title",
        "place",
        "start",
        "end",
        "services_id",
        "students_id",
        "description"
    ];

    /**
     * Get the Student that owns the Monitoring
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Student()
    {
        return $this->belongsTo(Student::class, 'students_id', 'id');
    }

    /**
     * Get the Service associated with the Monitoring
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Service()
    {
        return $this->hasOne(Service::class, 'id', 'services_id');
    }
}
