<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên sự kiện
            $table->text('description'); // Mô tả sự kiện
            $table->dateTime('start_time'); // Thời gian bắt đầu sự kiện
            $table->dateTime('end_time'); // Thời gian kết thúc sự kiện
            $table->string('location'); // Địa điểm tổ chức sự kiện
            $table->timestamps(); // Tự động thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
