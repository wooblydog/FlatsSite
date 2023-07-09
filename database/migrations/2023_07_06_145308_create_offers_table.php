<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $guid = Uuid::uuid4()->toString();
        Schema::create('offers', function (Blueprint $table) use ($guid) {
            $table->id();
            $table->uuid('guid')->default(1);
            $table->integer('b24_contact_id')->nullable();
            $table->integer('b24_deal_id')->nullable();
            $table->integer('b24_manager_id');
            $table->string('manager_fio');
            $table->string('phone');
            $table->string('position');
            $table->string('avatar');
            $table->timestamp('date_end')->nullable();
            $table->string('status')->default('N'); //статус подборки
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
