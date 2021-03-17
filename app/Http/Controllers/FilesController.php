<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\StoreFileRequest;
use App\Http\Resources\FileResource;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FileResource::collection(Files::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileRequest $request)
    {
        $client_name = $request->file('file')->getClientOriginalName();

        $path = $request->file('file')->store('images');

        $content_type = mime_content_type(Storage::path($path));

        $file = Files::create([
            'name' => $client_name,
            'path' => $path,
            'content_type' => $content_type
        ]);

        return new FileResource($file);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function show(Files $file)
    {
        return response(Storage::get($file->path), 200, [
            'Content-Type' => $file->content_type
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Files  $files
     * @return \Illuminate\Http\Response
     */
    public function destroy(Files $file)
    {
        Storage::delete($file->path);

        $file->delete();

        return response('', 205);
    }
}
