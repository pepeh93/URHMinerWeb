<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('algorithm')->nullable();
            $table->string('country')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->unsignedInteger('block_amount')->nullable();
            $table->string('unit')->nullable();
            $table->unsignedDecimal('maximum_value')->nullable();
            $table->text('description');
            $table->string('video_id', 15)->nullable();
            $table->string('image');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('content_type_id');
            $table->foreign('content_type_id')->references('id')->on('content_types');
            $table->string('extra_button_link')->nullable();
            $table->string('extra_button_name')->nullable();
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
        Schema::dropIfExists('content');
    }
}
