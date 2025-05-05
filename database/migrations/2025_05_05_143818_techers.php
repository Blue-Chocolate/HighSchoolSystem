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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('Department', ['Mathematics', 'Science', 'English', 'History'])->nullable();
            $table->string('status')->default('Active');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->softDeletes();
        }); 
    }

    
    public function down(): void
    {
        Schema::dropIfExists('teachers'); 
    }
};
