<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the config of the media
     */
    public function config()
    {
        return $this->hasOne(Config::class);
    }

    /**
     * The files that belong to the media.
     */
    public function files()
    {
        return $this->belongsToMany(Files::class, 'media_files', 'media_id', 'file_id')->withTimestamps();
    }
}
