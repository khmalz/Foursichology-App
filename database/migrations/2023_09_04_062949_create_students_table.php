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
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('nis')->unique();
            $table->enum('jurusan', ['akl 1', 'akl 2', 'bdp 1', 'bdp 2', 'otkp 1', 'otkp 2', 'dkv', 'rpl']);
            $table->enum('kelas',  ['10', '11', '12']);
            $table->enum('gender',  ['P', 'L']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
