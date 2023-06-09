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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('num_pages');
            $table->string('abstract');
            $table->timestamps();
            $table->unsignedBigInteger('editor_id');
            $table->foreign('editor_id')->references('id')->on ('editors');
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on ('authors');
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
