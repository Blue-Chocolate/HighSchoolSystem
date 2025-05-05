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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('grade', ['10', '11', '12'])->nullable();
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
        Schema::dropIfExists('students'); 
    }
};
