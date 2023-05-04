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
        Schema::table('hotels', function (Blueprint $table) {
            $table->boolean('all_year')->default(false);//mettere il default percè nei campi già creati dà null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //da riempire in questo caso
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn('all_year');
        });
    }
};
