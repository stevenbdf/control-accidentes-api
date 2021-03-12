<?php

namespace App\Http\Controllers;

use App\Http\Requests\Config\UpdateConfigRequest;
use App\Http\Resources\ConfigResource;
use App\Models\Config;

class ConfigController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show(Config $config)
    {
        return new ConfigResource($config);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateConfigRequest  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConfigRequest $request, Config $config)
    {
        $config->update($request->all());

        return new ConfigResource($config);
    }
}
