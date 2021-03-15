<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chart\StoreChartRequest;
use App\Http\Requests\Chart\UpdateChartRequest;
use App\Http\Resources\ChartResource;
use App\Models\Chart;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ChartResource::collection(Chart::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChartRequest $request)
    {
        $chart = Chart::create($request->all());

        return new ChartResource($chart);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        return new ChartResource($chart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChartRequest $request, Chart $chart)
    {
        $chart->update($request->all());

        return new ChartResource($chart);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        $chart->delete();

        return response('', 205);
    }
}
