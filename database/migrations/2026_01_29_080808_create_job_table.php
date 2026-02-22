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
    Schema::create('job', function (Blueprint $table) {
        $table->id('job_id');
        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('category_id');
        $table->string('title');
        $table->string('company_name');
        $table->text('description');
        $table->string('location');
        $table->string('job_type'); // Full-time, Internship etc.
        $table->string('salary_range')->nullable();
        $table->string('status')->default('Active');

        // Foreign Keys
        $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        $table->foreign('category_id')->references('category_id')->on('job_categories')->onDelete('cascade');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};