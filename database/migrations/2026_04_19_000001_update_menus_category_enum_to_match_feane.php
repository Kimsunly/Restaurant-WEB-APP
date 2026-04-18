<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE menus MODIFY category ENUM('burger', 'pizza', 'pasta', 'fries') NOT NULL DEFAULT 'burger'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE menus MODIFY category ENUM('starter', 'main', 'dessert', 'drink') NOT NULL DEFAULT 'main'");
    }
};
