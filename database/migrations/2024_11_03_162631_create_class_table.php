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
        Schema::create('class', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 100);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_deleted')->default(0);
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class');
    }
};
