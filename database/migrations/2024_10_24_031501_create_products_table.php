<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Tên sản phẩm
            $table->text('description');     // Mô tả sản phẩm
            $table->decimal('price', 10, 2); // Giá sản phẩm
            $table->decimal('old_price', 10, 2)->nullable(); // Giá cũ (nếu có)
            $table->string('image');         // Đường dẫn đến hình ảnh sản phẩm
            $table->timestamps();             // Các trường created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
