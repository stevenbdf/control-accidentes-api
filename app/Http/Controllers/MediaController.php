<?php

namespace App\Http\Controllers;

use App\Http\Requests\Media\AttachFilesRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;

class MediaController extends Controller
{
    public function attach(Media $media, AttachFilesRequest $request)
    {
        $media->files()->detach();
        $media->files()->attach($request['files']);

        $media->refresh();

        return new MediaResource($media);
    }
}
