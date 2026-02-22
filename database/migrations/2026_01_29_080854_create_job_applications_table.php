<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('job_applications', function (Blueprint $table) {
        $table->id('application_id');
        $table->unsignedBigInteger('job_id');
        $table->unsignedBigInteger('user_id');
        // Foreign Keys
        $table->foreign('job_id')->references('job_id')->on('job')->onDelete('cascade');
        $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

        $table->timestamp('applied_at')->useCurrent();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};