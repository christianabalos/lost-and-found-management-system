<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('item_matches', function (Blueprint $table) {

            $table->unsignedBigInteger('lost_report_id')->nullable();
            $table->unsignedBigInteger('found_report_id')->nullable();
            $table->integer('match_score')->default(0);
            $table->string('status')->default('pending');

        });
    }

    public function down(): void
    {
        Schema::table('item_matches', function (Blueprint $table) {

            $table->dropColumn([
                'lost_report_id',
                'found_report_id',
                'match_score',
                'status'
            ]);

        });
    }
};