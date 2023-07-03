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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('lot_number');
            $table->unsignedBigInteger('auction_id');
            $table->foreign('auction_id')->references('id')->on('auctions')->onDelete('cascade');
            $table->string('artist');
            $table->string('year_produced');
            $table->string('subject_classification');
            $table->string('description_summary');
            $table->longText('description');
            $table->date('date')->nullable();
            $table->string('estimated_price');
            $table->string('image')->nullable();
            $table->string('medium')->nullable();
            $table->string('is_framed')->nullable();
            $table->string('dimension')->nullable();
            $table->string('image_type')->nullable();
            $table->string('material_used')->nullable();
            $table->string('weight')->nullable();
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
        Schema::dropIfExists('items');
    }
};
