<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartData extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the chart for the chart data
     */
    public function chart()
    {
        return $this->belongsTo(Chart::class);
    }
}
