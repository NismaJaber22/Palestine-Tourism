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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userfname');
            $table->string('userlname');
<<<<<<< HEAD
=======
            $table->string('image')->nullable();
            $table->boolean('is_admin');
>>>>>>> d2af0258d7f47faa004d5267dd22f3d8999a4cde
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->boolean('is_admin');
            $table->text('liveIn')->default("1");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
