<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id('alumni_id');
            $table->unsignedBigInteger('user_id');
            $table->year('graduation_year')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('current_job', 150)->nullable();
            $table->string('company_name', 150)->nullable();
            $table->string('designation', 100)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('department_id')->references('department_id')->on('departments');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
