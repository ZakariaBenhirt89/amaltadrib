<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    /**
     * Get the Chef that owns the Video
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Chef()
    {
        return $this->belongsTo(Chef::class, 'chefs_id', 'id');
    }

    /**
     * Get all of the Watched for the Video
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Watched()
    {
        return $this->hasMany(WatchedVideo::class, 'videos_id', 'id');
    }
}
