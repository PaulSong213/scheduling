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
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_filename');
            $table->date('birthdate');
            $table->string('position');
            $table->integer('position_level');
            $table->string('department');
            $table->string('civilStatus');
            $table->string('cellphone_number');
            $table->enum('userType',['admin', 'user'])->default('admin');
            $table->string('email');
            $table->string('address');
            $table->string('password');
            $table->timestamps();
            $table->rememberToken();

        
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officials');
    }
};
