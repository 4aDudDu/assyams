<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_group_id')->constrained('class_groups')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->enum('assessment_type', ['tahsin', 'tahfidz', 'tajwid']);
            // data JSON menyimpan: surah, ayat, dan nilai L/C/TL plus nama santri
            // Contoh: [{"surah": 1, "ayat": 1, "nilai": "L", "nama": "Abdullah", "nilai_penyetoran": 85}, {...}]
            $table->json('data')->nullable();
            $table->integer('month')->default(1); // Bulan 1-12
            $table->integer('year')->default(2025); // Tahun
            $table->timestamps();

            $table->index(['class_group_id', 'user_id', 'assessment_type', 'month', 'year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
