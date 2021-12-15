<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedVideo extends Model
{
    use HasFactory;

    protected $table = "students_has_videos";

    /**
     * Get the Video associated with the WatchedVideo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Video()
    {
        return $this->hasOne(Video::class, 'id', 'videos_id');
    }
    
    protected $fillable = [
        "videos_id",
        "students_id"
    ];
}
