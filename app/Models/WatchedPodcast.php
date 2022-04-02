<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedPodcast extends Model
{
    use HasFactory;

    protected $table = "watched_podcasts";

    /**
     * Get the Podcast associated with the WatchedPodcast
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Podcast()
    {
        return $this->hasOne(Podcast::class, 'id', 'podcasts_id');
    }

    protected $fillable = [
        "podcasts_id",
        "students_id"
    ];
}
