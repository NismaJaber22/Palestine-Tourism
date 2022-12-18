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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->boolean('book')->default(true);
            $table->tinyInteger('peoplenum');
            // $table->time('start');
            // $table->time('end');
            $table->Integer('phone');
            $table->decimal('total',8,2);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('place_id')->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('reserves');
    }
};
