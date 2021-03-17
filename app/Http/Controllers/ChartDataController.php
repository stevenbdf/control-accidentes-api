<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChartData\StoreChartDataRequest;
use App\Http\Requests\ChartData\UpdateChartDataRequest;
use App\Http\Resources\ChartDataResource;
use App\Models\Chart;
use App\Models\ChartData;

class ChartDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Chart $chart)
    {
        return ChartDataResource::collection($chart->chartData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChartDataRequest $request, Chart $chart)
    {
        $chartData = $chart->chartData()->create($request->all());

        return new ChartDataResource($chartData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChartData  $chartData
     * @return \Illuminate\Http\Response
     */
    public function show(ChartData $chartData)
    {
        return new ChartDataResource($chartData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChartData  $chartData
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChartDataRequest $request, ChartData $chartData)
    {
        $chartData->update($request->all());

        return new ChartDataResource($chartData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChartData  $chartData
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChartData $chartData)
    {
        $chartData->delete();

        return response('', 205);
    }
}
