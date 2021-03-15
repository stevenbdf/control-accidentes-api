<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chart_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chart_id')->constrained()->cascadeOnDelete();
            $table->string('x_value');
            $table->string('y_value');
            $table->char('color', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chart_data');
    }
}
