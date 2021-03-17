<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the config for the media
     */
    public function config()
    {
        return $this->belongsTo(Config::class);
    }
}
