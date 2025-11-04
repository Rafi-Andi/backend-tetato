<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            DB::statement("ALTER TABLE pesanans MODIFY status ENUM('baru', 'proses', 'dikirim', 'selesai') NOT NULL");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pesanans', function (Blueprint $table) {
            DB::statement("ALTER TABLE pesanans MODIFY status ENUM('baru', 'proses', 'selesai') NOT NULL");
        });
    }
};
