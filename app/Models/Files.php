<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The medias that belong to the file.
     */
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'media_files', 'file_id', 'media_id')->withTimestamps();
    }
}
