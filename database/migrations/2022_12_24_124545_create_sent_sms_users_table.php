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
        Schema::create('sent_sms_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('batch_no');
            $table->bigInteger('establishment_id');
            $table->bigInteger('visitor_id');
            $table->datetime('entrance_timestamp');
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
        Schema::dropIfExists('sent_sms_users');
    }
};
