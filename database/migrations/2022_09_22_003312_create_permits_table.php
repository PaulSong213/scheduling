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
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('business_location');
            $table->string('business_type');
            $table->string('business_name');
            $table->string('payment_proof_filename');
            $table->string('decline_reason')->nullable();
            $table->date('scheduled_date')->nullable();
            $table->enum('status', ['pending', 'scheduled','declined'])->default('pending');
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
        Schema::dropIfExists('permits');
    }
};
