<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add image_url column to blogs table (after featured_image)
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('featured_image');
        });

        // Add image_url column to services table (after image)
        Schema::table('services', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('image');
        });

        // Add image_url column to tours table (after image)
        Schema::table('tours', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('image');
        });

        // Add image_url column to galleries table (after image)
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('image_url')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        // Drop image_url column from all tables
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('image_url');
        });
    }
};