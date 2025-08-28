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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title');
            $table->string('home_description');
            $table->string('Phone')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();

            $table->json('social_media')->nullable();
            $table->json('about_experience')->nullable();
            $table->json('about_education')->nullable();

            $table->text('footer_title')->nullable();
            $table->text('footer_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
