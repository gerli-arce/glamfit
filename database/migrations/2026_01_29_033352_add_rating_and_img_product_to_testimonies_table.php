<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('testimonies', function (Blueprint $table) {
            $table->integer('rating')->default(5)->after('testimonie');
            $table->string('img_product')->nullable()->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('testimonies', function (Blueprint $table) {
            $table->dropColumn(['rating', 'img_product']);
        });
    }
};
