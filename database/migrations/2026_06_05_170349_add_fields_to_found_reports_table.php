<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('found_reports', function (Blueprint $table) {

            $table->string('item_name')->nullable()->after('user_id');

            $table->string('category')
                  ->default('Others')
                  ->after('item_name');

            $table->text('description')
                  ->nullable()
                  ->after('category');

            $table->string('item_image')
                  ->nullable()
                  ->after('description');

        });
    }

    public function down(): void
    {
        Schema::table('found_reports', function (Blueprint $table) {

            $table->dropColumn([
                'item_name',
                'category',
                'description',
                'item_image',
            ]);

        });
    }
};
