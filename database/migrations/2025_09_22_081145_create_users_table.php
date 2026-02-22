<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id('user_id');
        $table->string('first_name', 100);
        $table->string('last_name', 100);
        $table->string('email', 150)->unique();
        $table->string('password');
        $table->string('phone_number', 20)->nullable();
        $table->enum('gender', ['Male','Female','Other'])->nullable();
        $table->date('dob')->nullable();
        $table->text('address')->nullable();
        $table->string('profile_photo')->nullable();
        $table->unsignedBigInteger('role_id')->nullable();

        $table->foreign('role_id')->references('role_id')->on('user_roles')->onDelete('set null');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};