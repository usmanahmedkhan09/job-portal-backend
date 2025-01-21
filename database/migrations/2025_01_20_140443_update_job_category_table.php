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
        // We don't need this anymore since skills table has category_id
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
