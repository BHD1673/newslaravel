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
        Schema::create('post_histories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->foreignId('user_id');
            $table->foreignId('post_id');
            $table->string('action');  // Hành động: tạo, cập nhật, xóa
            $table->boolean('status')->default(true);
            $table->text('note')->nullable();
            $table->date('date_action')->nullable();
            $table->string('time_action')->nullable();
            $table->string('user_action')->nullable();
            $table->boolean("is_delete_post")->default(false);
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
        Schema::dropIfExists('post_histories');
    }
};
