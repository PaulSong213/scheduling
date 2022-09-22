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
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->string('purpose');
            $table->bigInteger('user_id');
            $table->string('payment_proof_filename')->nullable();
            $table->string('decline_reason')->nullable();
            $table->date('scheduled_date')->nullable();
            $table->enum('status', ['pending', 'scheduled','declined'])->default('pending');
            $table->enum('credential_type', ['Barangay Clearance', 'Barangay ID','Barangay Certificate'])->default('Barangay Clearance');
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
        Schema::dropIfExists('credentials');
    }
};
