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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('summery');
            $table->text('body');
            $table->text('image');
            $table->foreignId('cat_id')->constrained('categories');
            $table->foreignId('user_id')->constrained('users');
            $table->tinyInteger('status')->default(0)->comment('0=>desable, 1=>enabli');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
