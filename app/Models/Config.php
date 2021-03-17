<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the media of the config
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
