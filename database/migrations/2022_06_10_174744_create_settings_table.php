<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('about_first_text');
            $table->text('about_second_text');
            $table->string('about_first_image');
            $table->string('about_second_image');
            $table->text('about_our_mission');
            $table->text('about_our_vision');
            $table->text('about_services');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
