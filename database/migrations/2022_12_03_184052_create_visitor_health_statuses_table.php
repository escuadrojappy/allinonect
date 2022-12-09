<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_health_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('visitor_id');
            $table->tinyInteger('covid_result');
            $table->datetime('date_result');
            $table->text('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_health_statuses');
    }
};
