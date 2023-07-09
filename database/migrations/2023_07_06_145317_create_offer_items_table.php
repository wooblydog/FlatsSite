<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_items', function (Blueprint $table) {
            $table->id();
            $table->integer('offer_id')->default(666);
            $table->string('cid')->default('11111111-1111-1111-1111-111111111111');
            $table->string('type');
            $table->string('square');
            $table->string('complex');
            $table->string('house');
            $table->text('description');
            $table->string('images');
            $table->boolean('like')->default(false);
            $table->string('price');
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
        Schema::dropIfExists('offer_items');
    }
}
